<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lawyer Plus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Oldstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="container mt-5 card-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow d-flex flex-row">
                <div class="card-body w-60">
                    <h3 class="text-center mb-4">Reset Password</h3>
                    <?php

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\SMTP;
                    use PHPMailer\PHPMailer\Exception;

                    require '../../../vendor/autoload.php';

                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $dbname = 'lawyerPlus';

                    // Connect to the database
                    $conn = new mysqli($host, $user, $password, $dbname);

                    // Check for errors
                    if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }

                    include 'LoginFunctions.php';
                    function isOTPValid($email, $otp)
                    {
                        global $conn;
                        $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `otp` = '$otp' AND `otp_expiration` < NOW()";
                        $result = $conn->query($sql);
                        return $result->num_rows === 1;
                    }
                    
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (!empty($_POST['otp'])) {
                            // OTP validation form submission
                            $email = $_POST['email'];
                            $otp = $_POST['otp'];

                            if (isOTPValid($email, $otp)) {

                                // Display new password text field
                                echo '<form id="resetPasswordForm" method="post">';
                                echo '<div class="form-group">';
                                echo '<input type="hidden" name="email" value="' . $email . '">';
                                echo '<input type="password" class="form-control mx-auto" id="new_password" name="new_password" placeholder="Enter new password" required>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<button type="submit" class="btn btn-primary btn-block mx-auto">Reset Password</button>';
                                echo '</div>';
                                echo '</form>';
                            } else {

                                // Display the OTP validation form again with the error message
                                echo '<div class="alert alert-danger text-center" role="alert">Wrong Reset Code. Please try again.</div>';
                                echo '<form id="validateOTPForm" method="post">';
                                echo '<div class="form-group">';
                                echo '<input type="hidden" name="email" value="' . $email . '">';
                                echo '<input type="text" class="form-control mx-auto" id="otp" name="otp" placeholder="Enter OTP" required>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<button type="submit" class="btn btn-primary btn-block mx-auto">Enter Reset Code</button>';
                                echo '</div>';
                                echo '</form>';
                            }
                        } elseif (!empty($_POST['new_password'])) {
                            // New password form submission
                            $email = $_POST['email'];
                            $new_password = $_POST['new_password'];

                            // Update the user's password in the database and reset OTP fields
                            $sql = "UPDATE `user` SET `password` = '$new_password', `otp` = NULL, `otp_expiration` = NULL WHERE `email` = '$email'";

                            if ($conn->query($sql) === TRUE) {
                                // Display success message after resetting the password
                                echo '<div class="alert alert-success text-center" role="alert">Password has been successfully reset!</div>';
                                echo '<button type="submit" class="btn btn-primary btn-block mx-auto" onclick="redirectToLoginPage()">SignIn Now</button>';
                            } else {
                                echo '<div class="alert alert-danger text-center" role="alert">Error updating password: ' . $conn->error . '</div>';
                            }
                        } else {
                            // Email form submission for generating OTP
                            $email = $_POST['email'];

                            // Check if email exists in the database
                            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
                            $result = $conn->query($sql);

                            if ($result->num_rows === 1) {
                                // Generate OTP and store it in the database along with the email and expiration time
                                $otp = generateOTP();
                                $expirationTime = date('Y-m-d H:i:s', strtotime('+15 minutes')); // OTP expiration time (adjust as needed)
                                $sql = "UPDATE `user` SET `otp` = '$otp', `otp_expiration` = '$expirationTime' WHERE `email` = '$email'";
                                $conn->query($sql);

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

                                    //Sender and recipient settings
                                    $mail->setFrom('lawyerplusproject@gmail.com', 'LawyerPlus');
                                    $mail->addAddress($email);

                                    // Content
                                    $mail->isHTML(true);
                                    $mail->Subject = 'Reset Your Password - Lawyer Plus';
                                    $mail->Body = 'Your OTP for password reset is: ' . $otp;


                                    $mail->send();
                                    echo '<div class="alert alert-success text-center" style="word-wrap: break-word;" role="alert">Reset code has been sent to your email.</div>';
                                } catch (Exception $e) {
                                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                }

                                // Display success message and OTP validation form
                                echo '<form id="validateOTPForm" method="post">';
                                echo '<div class="form-group">';
                                echo '<input type="hidden" name="email" value="' . $email . '">';
                                echo '<input type="text" class="form-control mx-auto" id="otp" name="otp" placeholder="Enter OTP" required>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<button type="submit" class="btn btn-primary btn-block mx-auto">Enter Reset Code</button>';
                                echo '</div>';
                                echo '</form>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Email address not found.</div>';
                            }
                        }
                    } else {
                        // Display initial email form
                        echo '<form action="" method="post">';
                        echo '<div class="form-group">';
                        echo '<input type="email" class="form-control mx-auto" id="email" name="email" placeholder="Enter your email address" required>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<button type="submit" class="btn btn-primary btn-block mx-auto">Reset Password</button>';
                        echo '</div>';
                        echo '</form>';
                    }
                    ?>
                </div>
                <div class="card-body bg-image w-40"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function redirectToLoginPage() {
        window.location.href = "login.php";
    }
</script>
</body>
</html>
