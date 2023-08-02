<div id="main-wrapper">
    <?php
    include "sidebar.php";
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $query = "SELECT c.`case_id`, c.`lawyer_id`, c.`C_type`, c.`submit_date`, c.`satuts`, c.`Amount`, l.`title`, l.`name`, l.`category`
      FROM `case` c
      LEFT JOIN `lawyer` l ON c.`lawyer_id` = l.`lawyer_id`
      WHERE c.`client_id` = 'E2046014' AND c.`satuts` = 'Pending'"; 
    
    ?>
    <?php
    $totalAmount = 0;
    $client_CaseList = $conn->query($query); // Execute the query again to get the data
    if ($client_CaseList && $client_CaseList->num_rows > 0) {
        while ($row = $client_CaseList->fetch_assoc()) {
            $totalAmount += $row['Amount']; // Add the amount to the total
        }
    }
    ?>
<div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-header"> <strong>Check Out</strong> <span class="float-end"></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="align-middle"><strong>Case ID</strong></th>
                                                <th class="align-middle"><strong>Lawyer Name</strong></th>
                                                <th class="align-middle"><strong>Case Type</strong></th>
                                                <th class="align-middle"><strong>Submit Date</strong></th>
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
                                                    <td class="align-middle"><?php echo $amount; ?></td>
                                                </tr>

                                                <?php
                                            }
                                        } else {
                                            echo "No case or lawyer found for the specified client_id.";
                                        }
                                        ?>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong>Total</strong></td>
                                                   
                                                    <td class="right"><strong><?php echo "$" . $totalAmount; ?></strong><br>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form action="ClientPayment.php" method="post">
                                            <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
                                            <input type="submit" name="pay" value="Pay Amount" class="btn btn-primary btn-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>