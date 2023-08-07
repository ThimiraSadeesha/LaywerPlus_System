<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<?php

$conn = new mysqli('localhost', 'root', '', 'lawyerPlus');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store messages
$verificationMessage = '';
$Completed = '';
$hideForm = false;

if (isset($_POST['submit_otp'])) {
    // Get the entered username and OTP from the form
    $enteredUsername = $_POST['username'];
    $enteredOTP = $_POST['otp'];

    // Query the database to retrieve the username, OTP, and OTP expiration from inactive_users table
    $query = "SELECT client_id, otp, otp_expiration FROM inactive_users WHERE client_id = '$enteredUsername' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User exists in the inactive_users table
        $row = $result->fetch_assoc();
        $storedUserID = $row['client_id'];
        $storedOTP = $row['otp'];
        $storedOTPExpiration = $row['otp_expiration'];

        // Compare the entered OTP with the stored OTP
        if ($enteredOTP === $storedOTP) {
            // Correct OTP, show congratulation message
            $verificationMessage = '<div class="alert alert-success text-center" role="alert">Your account has been successfully activated. You will now be automatically redirected to the login page.</div>';
            $Completed = 'Congratulations!';
            header("refresh:3;url=../Login/Login.php"); // Redirect to login page after

            // Set otp and otp_expiration to NULL for the entered user ID
            $updateQuery = "UPDATE inactive_users SET otp = NULL, otp_expiration = NULL WHERE client_id = '$storedUserID'";
            $conn->query($updateQuery);

            // Hide the form
            $hideForm = true;
        } else {
            // Incorrect OTP, show sorry message
            $verificationMessage = '<div class="alert alert-danger text-center" role="alert">Sorry, the entered verification code is incorrect. Please try again.</div>';
        }
    } else {
        // User does not exist in the inactive_users table
        $verificationMessage = '<div class="alert alert-danger text-center" role="alert">Sorry, the entered username is not found in our records.</div>';
    }
}
?>

<body>
<div class="authincation d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-center mb-4"><?php echo $Completed; ?></p>
                        <?php if (!$hideForm) { ?>
                            <h4 class="card-title text-center mb-4">Enter Username & Verification Code</h4>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="User Name">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="otp" class="form-control" placeholder="Verification Code">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" name="submit_otp" class="btn btn-primary btn-block">Verify</button>
                                </div>
                            </form>
                        <?php } ?>
                        <p class="text-center mt-3"><?php echo $verificationMessage; ?></p>
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

