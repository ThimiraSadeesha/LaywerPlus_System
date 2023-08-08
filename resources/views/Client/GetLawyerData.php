<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lawyerplus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = $_GET['category'];

$lawyerQuery = "SELECT `lawyer_id`, `name` FROM `lawyer` WHERE `category` = '$category'";
$lawyerResult = $conn->query($lawyerQuery);

$lawyerOptions = array();
if ($lawyerResult->num_rows > 0) {
    while ($row = $lawyerResult->fetch_assoc()) {
        $lawyerOptions[] = $row;
    }
}
echo json_encode($lawyerOptions);
$conn->close();
?>
