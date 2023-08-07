<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lawyerPlus';

// Connect to the database
$conn = new mysqli($host, $user, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch lawyer names from the database based on the selected category
$category = $_GET['category'];
$query = "SELECT name FROM lawyer WHERE category = '$category'";
$result = $conn->query($query);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    // Generate the lawyer dropdown options
    $lawyerOptions = "";
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $lawyerOptions .= "<option value='$name'>$name</option>";
    }
} else {
    // Handle the case when no lawyers are found for the selected category
    $lawyerOptions = "<option value='' disabled selected>No lawyers found</option>";
}

$conn->close();

echo $lawyerOptions;
?>
