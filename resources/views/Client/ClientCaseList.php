<div id="main-wrapper">
    <?php
    session_start();
    include "Sidebar.php";
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

    $query = "SELECT c.`case_id`, c.`lawyer_id`, c.`C_type`, c.`submit_date`, c.`satuts`, c.`Amount`, l.`title`, l.`name`, l.`category`
          FROM `cases` c
          LEFT JOIN `lawyer` l ON c.`lawyer_id` = l.`lawyer_id`
          WHERE c.`client_id` = '$user_id'";

    ?>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Client</a></li>
                    <li class="breadcrumb-item"><a>All Cases</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                    <tr>
                                        <th class="align-middle"><strong>Case ID</strong></th>
                                        <th class="align-middle"><strong>Lawyer Name</strong></th>
                                        <th class="align-middle"><strong>Case Type</strong></th>
                                        <th class="align-middle"><strong>Submit Date</strong></th>
                                        <th class="align-middle"><strong>Status</strong></th>
                                        <th class="align-middle"><strong>Amount</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody id="orders">
                                    <?php
                                    $client_CaseList = $conn->query($query);
                                    if ($client_CaseList && $client_CaseList->num_rows > 0) {
                                        while ($row = $client_CaseList->fetch_assoc()) {
                                            $Case_ID = $row['case_id'];
                                            $law_id = $row['lawyer_id'];
                                            $date = $row['submit_date'];
                                            $status = $row['satuts'];
                                            $l_type = $row['category'];
                                            $c_type = $row['C_type'];
                                            $amount = $row['Amount'];
                                            $title = $row['title'];
                                            $name = $row['name'];
                                            ?>
                                            <tr>
                                                <td class="align-middle"><?php echo $Case_ID; ?></td>
                                                <td class="align-middle"><?php echo $title . " " . $name; ?></td>
                                                <td class="align-middle"><?php echo $c_type; ?></td>
                                                <td class="align-middle"><?php echo $date; ?></td>
                                                <td class="align-middle"><?php echo $status; ?></td>
                                                <td class="align-middle"><?php echo $amount; ?></td>
                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        echo "No case or lawyer found for the specified client_id.";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>