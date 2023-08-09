
<html lang="">
<head>
    <script src="https://www.paypal.com/sdk/js?client-id=ASqJsZpigthEn9d45s51cpwgiJER-sjMjSdfGx5tomC-GE-tj8JgnWtDUJT-kHwxg2LKwzMpeyZMi8Xv&currency=USD"></script>
    
    <title></title>
</head>

<div id="main-wrapper" xmlns="http://www.w3.org/1999/html">
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
      WHERE c.`client_id` = '$client_id' AND c.`satuts` = 'Pending'";
    
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
                                        <form id="paypal-button" method="post">
                                            <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script>
        // Load the PayPal JavaScript SDK asynchronously
        paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo $totalAmount; ?>' // Use the PHP variable to set the total amount
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Payment completed successfully!');
                    });
                },
                onError: function(err) {
                    alert('An error occurred while processing the payment. Please try again.');
                }
            })
            .render('#paypal-button');
    </script>

