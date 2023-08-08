<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lawyerplus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lawyerId = $_GET['lawyerId'];

$timeQuery = "SELECT DISTINCT `Available_Date` FROM `lawyer` WHERE `lawyer_id` = '$lawyerId'";
$timeResult = $conn->query($timeQuery);

$timeOptions = array();
if ($timeResult->num_rows > 0) {
    while ($row = $timeResult->fetch_assoc()) {
        $timeOptions[] = $row['Available_Date'];
    }
}

echo json_encode($timeOptions);

$conn->close();
?>
