<div id="main-wrapper">
<?php
session_start();
include "Sidebar.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lawyerplus";

//variables
$verificationMessage = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


} else {
    header("Location: ../Lawyer/login.php");
}
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Appointment</a></li>
                <li class="breadcrumb-item"><a>New Appointment</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="col-xl-6">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="datepicker">Select Date</label>
                                    <input type="date" class="form-control" id="datepicker">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Left Placement</label>
                                    <div class="input-group clockpicker" data-placement="left" data-align="top"
                                         data-autobtn-close="true">
                                        <input type="text" class="form-control" value="13:14:PM">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                </div>
                                <div>
                            </form>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-6">

                    <div class="card text-white bg-primary text-white">
                        <div class="card-header d-block">
                            <h4 align="center" class="card-title text-white">Booked Appointments</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="col-md-3"><strong>Appointment ID</strong></span>
                                    <span class="col-md-3"><strong>Client ID</strong></span>

                                    <span class="col-md-3"><strong>Booked Date</strong></span>
                                </li>
                                <?php
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                // Get booked appointments data
                                $bookedAppointmentsQuery = "SELECT  la.`available_time`, a.`Appointment_id`, a.`client_id`, a.`Description` FROM `lawyer_availablility` la LEFT JOIN `appointment` a ON la.`lawyer_id` = a.`Lawyer_Id` WHERE la.`lawyer_id` = '$user_id'";
                                $bookedAppointmentsResult = $conn->query($bookedAppointmentsQuery);

                                if ($bookedAppointmentsResult->num_rows > 0) {
                                    while ($row = $bookedAppointmentsResult->fetch_assoc()) {
                                        $Appointment_id = $row['Appointment_id'];
                                        $client_id = $row['client_id'];
                                        $Description = $row['Description'];
                                        $available_time = $row['available_time'];


                                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                        echo '<span class="col-md-3">' . $Appointment_id . '</span>';
                                        echo '<span class="col-md-3">' . $client_id . '</span>';

                                        echo '<span class="col-md-3">' . $available_time . '</span>';

                                        echo '</li>';
                                    }
                                } else {
                                    echo '<li class="list-group-item">No booked appointments yet.</li>';
                                }
                                $conn->close();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>