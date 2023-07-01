<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lawyer Plus</title>
    <!-- Linking Bootstrap -->
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
                    <h3 class="text-center mb-4"></h3>
                    <?php
                    header('Cache-Control: no cache');
                    session_cache_limiter('private_no_expire');

                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $dbname = 'lawyerPlus';

                    $conn = new mysqli($host, $user, $password, $dbname);

                    if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }
                    // Verify login credentials
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
                        $result = $conn->query($sql);

                        if ($result->num_rows === 1) {
                            // Login successful
                            header('Location: adminDashboard.php');
                            exit;
                        } else {
                            // Login failed
                            $borderColor = 'border-color: red;';
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <h3 class="text-center mb-4"></h3>
                            <form action="" method="post">
                                <input type="text" class="form-control mx-auto" id="username" name="username"
                                       placeholder="Username" required style="<?php echo $borderColor; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control mx-auto" id="password" name="password"
                                   placeholder="Password" required style="<?php echo $borderColor; ?>">
                            <div class="hamburger">
                                <span class="line"></span><span class="line"></span><span class="line"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <a href="forgot_password.php" class="text-muted embed-responsive">Forget Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mx-auto">Login</button>
                        </div>
                        <hr>
                            <div class="form-group text-center">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="#" class="ml-2">
                                    <button type="submit" class="btn btn-link">Signup</button>
                                </a>
                            </div>
                    </form>
                </div>
                <div class="card-body bg-image w-40"></div>
            </div>
        </div>
    </div>
</div>
