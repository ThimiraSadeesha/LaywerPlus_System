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

                                            echo '<td class="py-2">
                                                        <div class="dropdown text-sans-serif">
                                                            <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                                <div class="py-2">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                                    <div class="dropdown-divider"></div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>';
                                            echo '</tr>';
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

<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/apexchart/apexchart.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/peity/jquery.peity.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>


