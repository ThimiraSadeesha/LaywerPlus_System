<?php
global $conn;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../login/LoginFunctions.php';


session_start();
$showForm = true;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['name'];
    $nic = $_POST['nic'];
    $contactNumber = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $last_numeric_id = null;
    do {
        $middleNumber = str_pad($last_numeric_id + 1, 4, '0', STR_PAD_LEFT);
        $client_id = "CLT-" . $middleNumber;

        // Check if the client_id is already taken by an active client or a deleted client
        $check_query = "(SELECT client_id FROM client WHERE client_id = '$client_id')
                UNION
                (SELECT client_id FROM deleted_client WHERE client_id = '$client_id')
                UNION
                (SELECT user_id FROM inactive_users WHERE user_id = '$client_id')";

        $check_result = $conn->query($check_query);

        if ($check_result->num_rows === 0) {
            break;
        }
        $last_numeric_id++;

    } while (true);

    // Insert the data into the database
    $sql = "INSERT INTO inactive_users (user_id, name, nic, email, contact_number, address, Password, role, status) 
            VALUES ('$client_id', '$fullName', '$nic', '$email', '$contactNumber', '$address', '$password','client', 'inactive')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['account_created'] = true;

        // Generate OTP and store it i
        $otp = generateOTP();
        $expirationTime = date('Y-m-d H:i:s', strtotime('+15 minutes')); 

        // Update the OTP and OTP expiration only for the registered user
        $update_otp_sql = "UPDATE inactive_users SET otp = '$otp', otp_expiration = '$expirationTime' WHERE email = '$email' AND user_id = LAST_INSERT_ID()";
        $conn->query($update_otp_sql);
        $showForm = false;
        $mail = new PHPMailer(true);

        // Send the OTP to the user's email
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();  // Send using SMTP
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lawyerplusproject@gmail.com';
            $mail->Password = 'shbymrsvcavpqujk';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Sender and recipient settings
            $mail->setFrom('lawyerplusproject@gmail.com', 'LawyerPlus');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Lawyer Plus';
            $mail->Body = 'Your Account Verification code is: ' . $otp;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Redirect to Verification.php
        header("Location: Verification.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
<div class="authincation d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php if ($showForm) { ?>
                            <h4 class="card-title text-center mb-4">Sign up your account</h4>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Full Name</strong></label>
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>National ID</strong></label>
                                    <input type="text" name="nic" class="form-control" placeholder="National ID">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Contact Number</strong></label>
                                    <input type="text" name="phone" class="form-control" placeholder="Contact Number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Address</strong></label>
                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Password</strong></label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <p>Already have an account? <a class="text-primary" href="Login.php">Sign
                                        in</a></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="../../vendor/global/global.min.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
</body>
</html>
