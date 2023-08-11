<div id="main-wrapper">
    <?php
    session_start();
    global $conn, $lawyerCount;
    include 'sidebar.php';
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM client WHERE client_id = '$user_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $client_id = $row['client_id'];

    } else {
        header("Location: ../Client/login.php");
    }
    $query2 = "SELECT c.`case_id`, c.`client_id`, c.`description`, c.`C_type`, c.`submit_date`, c.`satuts`, c.`Amount`, cl.`name`, cl.`nic`, cl.`email`, cl.`contact_number`, cl.`address` FROM `cases` c LEFT JOIN `client` cl ON c.`client_id` = cl.`client_id` WHERE c.`lawyer_id` = '$user_id';";

    $result_case_lawyer = $conn->query($query2);


    ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" action="">
                                <table class="table table-sm mb-0">
                                    <thead>
                                    <tr>
                                        <th class="align-middle">
                                            <div class="form-check custom-checkbox checkbox-success">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                       onclick="checkAllCheckboxes()">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle"><strong>Case ID</strong></th>
                                        <th class="align-middle"><strong>Client Name</strong></th>
                                        <th class="align-middle"><strong>Email</strong></th>
                                        <th class="align-middle"><strong>Contact</strong></th>
                                        <th class="align-middle"><strong>Description</strong></th>
                                        <th class="align-middle"><strong>Amount</strong></th>
                                        <th class="align-middle"><strong>Status</strong></th>
                                        <th class="align-middle"><strong>Action</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while ($row = $result_case_lawyer->fetch_assoc()) {
                                            $case_id = $row['case_id'];
                                            $client_id = $row['client_id'];
                                            $description = $row['description'];
                                            $C_type = $row['C_type'];
                                            $submit_date = $row['submit_date'];
                                            $status = $row['satuts'];
                                            $Amount = $row['Amount'];
                                            $name = $row['name'];
                                            $nic = $row['nic'];
                                            $contact_number = $row['contact_number'];
                                            $address = $row['address'];
                                            $email = $row['email'];
                                            $statusIcon = "";
                                            switch ($status) {
                                                case "Pending":
                                                case "Processing":
                                                case "Completed":
                                                    break;
                                                default:
                                                    // Default case if status doesn't match any of the above

                                                    break;
                                            }
                                            echo '<tr class="btn-reveal-trigger">';
                                            echo '<td class="py-2">
                                                        <div class="form-check custom-checkbox checkbox-success">
                                                            <input type="checkbox" class="form-check-input delete-checkbox" data-lawyer-id="' . $case_id . '">
                                                        </div>
                                                    </td>';
                                            echo '<td class="py-2">
                                                        <a href="#">
                                                           ' . $case_id . '
                                                        </a>
                                                    </td>';
                                            echo '<td class="py-2">' . $name . '</td>';
                                            echo '<td class="py-2">' . $email . '</td>';
                                            echo '<td class="py-2">' . $contact_number . '</td>';
                                            echo '<td class="py-2">' . $description . '</td>';

                                            echo '<td class="py-2">' . $Amount . '</td>';

                                            echo '<td class="py-2">';
                                            if ($status == "Completed") {
                                                echo '<span class="badge badge-success">' . $status . $statusIcon . '</span></td>';
                                            } elseif ($status == "Processing") {
                                                echo '<span class="badge badge-primary"> ' . $status . $statusIcon . '</span></td>';
                                            } elseif ($status == "Pending") {
                                                echo '<span class="badge badge-warning"> ' . $status . $statusIcon . '</span></td>';
                                            }

                                            echo '<td class="py-2">';
                                            echo '<div class="btn-group" role="group">';
                                            echo '<button type="button" class="btn btn-success btn-sm btn-status" data-case-id="' . $case_id . '" data-status="Completed">Completed</button>';
                                            echo '<button type="button" class="btn btn-primary btn-sm btn-status" data-case-id="' . $case_id . '" data-status="Processing">Processing</button>';
                                            echo '</div>';
                                            echo '</td>';
                                        }

                                  

                                    ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnStatuses = document.querySelectorAll(".btn-status");

        btnStatuses.forEach(btn => {
            btn.addEventListener("click", function() {
                const caseId = this.getAttribute("data-case-id");
                const status = this.getAttribute("data-status");
                console.log("Clicked: caseId =", caseId, ", status =", status);
                updateCaseStatus(caseId, status);
            });
        });


        function updateCaseStatus(caseId, status) {
            fetch("update_status.php", {
                method: "POST",
                body: JSON.stringify({ caseId, status }),
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    });

</script>


<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/apexchart/apexchart.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/peity/jquery.peity.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>


