<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lawyerPlus';

// Connect to database
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

session_start(); // Initialize the session

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page after logout
header('Location: ../Login/Login.php');
exit();
?>

