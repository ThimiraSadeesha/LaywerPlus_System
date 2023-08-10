<head>
    <title>Welcome - LawyerPlus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Oldstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lawyerPlus';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function encryptMessage($password, $key): string
{
    $iv = random_bytes(16);
    $encrypted = openssl_encrypt($password, "AES-256-CBC", $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

// Verify login credentials
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $secretKey = "Lawyer_Plus_System";
    $decryptedPassword = encryptMessage($password, $secretKey);


    // Check Email or Username
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM `user` WHERE `Email` = '$username' AND `password` = '$password'";
    } else {
        $sql = "SELECT * FROM `user` WHERE `user_id` = '$username' AND `password` = '$password'";
    }


    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows === 1) {
            // Login successful

            $user = $result->fetch_assoc();
            $user_id = $user['user_id'];



            $_SESSION['user_id'] = $user_id;

            // Redirect the user to the appropriate dashboard
            switch ($user['role']) {
                case 'lawyer':
                    header('Location: ../Lawyer/lawyerDashboard.php');
                    break;
                case 'admin':
                    header('Location: ../Admin/AdminDashboard.php');
                    break;
                case 'client':
                    header('Location: ../Client/ClientDashboard.php');
                    break;
                default:
                    break;
            }

            // Send the email alert
            try {
                $userEmail = $user['Email'];

                // Server settings
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
                $mail->addAddress($userEmail, $user['username']);

                // Email content
                $login_time = date('Y-m-d H:i:s');
                $user_ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
                //Email Subject
                $mail->isHTML(true);
                $mail->Subject = 'Login Alert - LawyerPlus';
                //Email Body
                $mail->Body = '<h1>Login Alert</h1> 
                <p>Hello ' . $user['username'] . ',</p> 
                <p>This is to inform you that there has been a login to your Lawyer Management System account.</p>
                <p>Login Details:</p>
                <ul>
                <li><strong>Date and Time:</strong> ' . $login_time . '</li>
                <li><strong>IP Address:</strong> ' . $user_ip . '</li>
                <li><strong>Location:</strong> [Location, if available]</li>
                </ul>
                <p>If you did not perform this login, please contact our support team immediately to secure your account.</p>
                <p>Best regards,</p>
                <p>Your Lawyer Management System Team</p>';

                $mail->AltBody = 'Login Alert - Lawyer Management System\n
                Hello ' . $user['username'] . ',\n
                This is to inform you that there has been a login to your Lawyer Management System account.\n
                Login Details:\n
                - Date and Time: ' . $login_time . '\n
                - IP Address: ' . $user_ip . '\n
                - Location: [Location, if available]\n
                If you did not perform this login, please contact our support team immediately to secure your account.\n
                Best regards,\n
                Your LawyerPlus Team';

                $mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            exit;
        } else {
            $borderColor = 'border-color: red;';
        }
    }
}
?>

<body>
<div class="container mt-5 card-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow d-flex flex-row">
                <div class="card-body w-60">
                    <form action="" method="post">
                        <div class="form-group">
                            <h3 class="text-center mb-4"></h3>
                            <input type="text" class="form-control mx-auto" id="username" name="username"
                                   placeholder="Email or Username" required style="<?php echo $borderColor ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control mx-auto" id="password" name="password"
                                   placeholder="Password" required style="<?php echo $borderColor ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <a href="../Login/ResetPassowrd.php" class="text-muted embed-responsive">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mx-auto">Login</button>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group text-center">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="../Admin/AdminRegistration.php" class="ml-2">
                            <button type="submit" class="btn btn-link">Signup</button>
                        </a>
                    </div>
                </div>
                <div class="card-body bg-image w-40"></div>
            </div>
        </div>
    </div>
</div>
</body>
