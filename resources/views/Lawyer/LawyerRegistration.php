<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lawyer Registration</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
<div class="authincation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Sign up your account</h4>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label"><strong>Full Name</strong></label>
                                <input type="text" name="lname" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Username</strong></label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                <div id="uname_response" ></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Title</strong></label>
                                <input type="text" name="title" class="form-control" placeholder="National ID">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Contact Number</strong></label>
                                <input type="text" name="mobile" class="form-control" placeholder="Contact Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Category</strong></label>
                                <input type="text" name="cate" class="form-control" placeholder="Address">
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
                                <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>Already have an account? <a class="text-primary" href="Admin/login.php">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullName = $_POST['lname'];
    $username = $_POST['username'];
    $title = $_POST['title'];
    $contactNumber = $_POST['mobile'];
    $Category = $_POST['cate'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    //If you Cannot insert data uncomment this code
//    $fullName = mysqli_real_escape_string($conn, $fullName);
//    $username = mysqli_real_escape_string($conn, $username);
//    $nationalID = mysqli_real_escape_string($conn, $nationalID);
//    $contactNumber = mysqli_real_escape_string($conn, $contactNumber);
//    $address = mysqli_real_escape_string($conn, $address);
//    $email = mysqli_real_escape_string($conn, $email);
//    $password = mysqli_real_escape_string($conn, $password);

    $sql = "INSERT INTO lawyer (lawyer_id ,title,name,  email, 	category, contact_number, Password) VALUES ('$username', '$title','$fullName', '$email', '$Category','$contactNumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!-- Bootstrap JS and jQuery CDN -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="../../vendor/global/global.min.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
</body>

</html>
