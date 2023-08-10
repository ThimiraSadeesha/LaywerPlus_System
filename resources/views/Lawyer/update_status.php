<?php

session_start();

$response = array();

if (!empty($_SESSION['user_id'])) {

    // Get input data
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['caseId']) && isset($data['status']) && in_array($data['status'], ['Pending', 'Processing', 'Completed'])) {

        $caseId = $data['caseId'];
        $newStatus = $data['status'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'lawyerPlus');

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Prepare statement
        if (!$stmt = $conn->prepare('UPDATE cases SET satuts = ? WHERE case_id = ? AND lawyer_id = ?')) {
            die('Prepare failed: ' . $conn->error);
        }

        // Get the user ID from the session
        $user_id = $_SESSION['user_id'];

        // Bind parameters
        if (!$stmt->bind_param('sis', $newStatus, $caseId, $user_id)) {
            die('Binding parameters failed: ' . $stmt->error);
        }

        // Execute statement
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        $stmt->close();
        $conn->close();

    }
}

header('Content-Type: application/json');
echo json_encode($response);

?>
