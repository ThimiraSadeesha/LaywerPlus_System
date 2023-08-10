<?php
//database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lawyerPlus';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


// Generate the OTP code
function generateOTP() //generate a otp code
{
    $otpLength = 6;
    $otp = '';
    for ($i = 0; $i < $otpLength; $i++) {
        $otp .= mt_rand(0, 9);
    }
    return $otp;
}
