<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lawyer Plus</title>
    <!-- Linking Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Linking custom CSS file -->
    <link rel="stylesheet" href="../../css/Oldstyle.css">
    <!-- Linking font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Adding background image -->

</head>
<body>
<div class="container mt-5 card-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow d-flex flex-row">
                <div class="card-body w-60">
                    <h3 class="text-center mb-4">Forgot Password</h3>
                    <?php
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

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $email = $_POST['email'];

                        // Check if email exists in database
                        $sql = "SELECT * FROM `admin` WHERE `email` = '$email'";
                        $result = $conn->query($sql);

                        if ($result->num_rows === 1) {
                            $reset_link = "https://www.geowise.lk=$email";
                            $subject = "Reset Your Password";
                            $message = "Click the following link to reset your password: $reset_link";
                            $headers = "From: Lawyer Plus <info@geowise.lk>";
                            mail($email, $subject, $message, $headers);

                            echo '<div class="alert alert-success" role="alert">A password reset link has been sent to your email.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Email address not found.</div>';
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control mx-auto" id="email" name="email"
                                   placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mx-auto">Reset Password</button>
                        </div>
                    </form>
                </div>
                <div class="card-body bg-image w-40"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

