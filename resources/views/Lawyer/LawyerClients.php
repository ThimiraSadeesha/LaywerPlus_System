<div id="main-wrapper">
    <?php global $conn, $lawyerCount;
    include '../Admin/sidebar.php';
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    ?>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Lawyer</a></li>
                    <li class="breadcrumb-item"><a>Active Clients</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="deleteDeletedLawyerForm" method="post" action="">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th class="align-middle">Case ID</th>
                                            <th class="align-middle">Client Name</th>
                                            <th class="align-middle">NIC</th>
                                            <th class="align-middle">Email</th>
                                            <th class="align-middle">Address</th>
                                            <th class="align-middle">Contact</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT `case_id`,`client_id` FROM `cases` WHERE `lawyer_id` = 'LW01'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $caseId = $row['case_id'];
                                                $clientId = $row['client_id'];

                                                // Query to fetch client information
                                                $clientQuery = "SELECT `name`, `nic`, `email`, `contact_number`, `address` FROM `client` WHERE `client_id` = '$clientId'";
                                                $clientResult = $conn->query($clientQuery);

                                                if ($clientResult->num_rows > 0) {
                                                    while ($clientRow = $clientResult->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $caseId . "</td>";
//                                                        echo "<td>" . $clientId . "</td>";
                                                        echo "<td>" . $clientRow['name'] . "</td>";
                                                        echo "<td>" . $clientRow['nic'] . "</td>";
                                                        echo "<td>" . $clientRow['email'] . "</td>";
                                                        echo "<td>" . $clientRow['address'] . "</td>";
                                                        echo "<td>" . $clientRow['contact_number'] . "</td>";
                                                        echo '</tr>';
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7'>No client data found</td></tr>";
                                                }
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No case data found</td></tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="deleted_lawyer_id" id="deletedLawyerId" value="">
                                    <input type="hidden" name="delete_deleted_lawyer" value="true">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
