<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div id="main-wrapper">
    <?php
    session_start();
    global $conn, $lawyerCount;
    include 'Sidebar.php';


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
        $sql = "SELECT * FROM client WHERE client_id = '$user_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $client_id = $row['client_id'];

    } else {
        header("Location: ../Client/login.php");
    }
    // get data from the database
    $lawyerQuery = "SELECT `lawyer_id`, `name` FROM `lawyer`";
    $lawyerResult = $conn->query($lawyerQuery);

    // Initialize an array to store lawyer data
    $lawyerData = array();
    if ($lawyerResult->num_rows > 0) {
        while ($row = $lawyerResult->fetch_assoc()) {
            $lawyerData[] = $row;
        }
    }
    $categoryQuery = "SELECT DISTINCT `category` FROM `lawyer`";
    $categoryResult = $conn->query($categoryQuery);
    $CatogeryOptions = '';



    if ($categoryResult->num_rows > 0) {
        while ($row = $categoryResult->fetch_assoc()) {
            $category = $row['category'];
            $CatogeryOptions .= '<option value="' . $category . '">' . $category . '</option>';
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $caseType = $_POST['category'];
        $lawyerId = $_POST['lawyer'];
        $dateTime = $_POST['time'];
        $description = $_POST['description'];

        // Generate appointment ID
        $last_numeric_id = null;
        do {
            $middleNumber = str_pad($last_numeric_id + 1, 4, '0', STR_PAD_LEFT);
            $appointmentId = "APM-" . $middleNumber;

            // if the appointment ID already exists
            $checkQuery = "SELECT * FROM `appointment` WHERE `Appointment_id` = '$appointmentId'";
            $checkResult = $conn->query($checkQuery);
            if ($checkResult->num_rows === 0) {
                break;
            }
            $last_numeric_id++;

        } while (true);
        // Insert appointment data into the appointment table
        $insertQuery = "INSERT INTO `appointment` (`Appointment_id`, `Case_Type`, `Lawyer_Id`, `Description`, `client_id`, `time`)
                    VALUES ('$appointmentId', '$caseType', '$lawyerId', '$description', '$user_id', '$dateTime')";

        if ($conn->query($insertQuery) === TRUE) {
            //update the booking status
            $bookUpdateQuery = "UPDATE lawyer_availablility SET status = 'booked' WHERE lawyer_id = '$lawyerId'";

            if ($conn->query($bookUpdateQuery) === TRUE) {
                $verificationMessage = '<div class="alert alert-success text-center" role="alert">Great news! Your appointment is confirmed for ' . $dateTime . '.</div>';

            } else {
                $verificationMessage = '<div class="alert alert-danger text-center" role="alert"> We are sorry, but there was an issue processing your appointment. Please try again later. </div>';
            }

        } else {
            $verificationMessage = '<div class="alert alert-danger text-center" role="alert">Unfortunately, we could not confirm your appointment this time due to technical difficulties.</div>';

        }
    }

    $conn->close();
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="mb-3">
                                            <select name="category" class="form-control" id="caseType" required=""
                                                    onchange="updateLawyerOptions(this.value)">
                                                <option value="" disabled selected>Select a category</option>
                                                <?php echo $CatogeryOptions; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <select name="lawyer" class="form-control" id="lawyerDropdown" required=""
                                                onchange="updateTimeOptions(this.value)">
                                            <option value="" disabled selected>Select Your Lawyer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <select name="time" class="form-control" id="dateAndTimeDropdown" required="">
                                            onchange="updateLawyerOptions(this.value)">
                                            <option value="" disabled selected></i>Select Date & Time</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="basic-form">
                                    <textarea name="description" id="textarea"
                                              class="form-control input-default fixed-textarea"
                                              placeholder="Type your notice here."></textarea>
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Send
                                        Statement
                                    </button>
                                </div>
                                <p class="text-center mt-3"><?php echo $verificationMessage; ?></p>

                                <style>
                                    .form-control {
                                        border-color: #6c4bae;

                                    }

                                    .fixed-textarea {
                                        background-color: white;
                                        resize: none;
                                        height: 120px;
                                        border: 1px solid #6c4bae;
                                    }
                                </style>
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
                                    <span class="col-md-3"><strong>Lawyer Name</strong></span>
                                    <span class="col-md-3"><strong>Case Type</strong></span>
                                    <span class="col-md-3"><strong>Phone</strong></span>
                                    <span class="col-md-3"><strong>Booked Date</strong></span>
                                </li>
                                <?php
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                // Get booked appointments data
                                $bookedAppointmentsQuery = "SELECT a.`Case_Type`, a.`Lawyer_Id`, a.`time`, L.`name`, L.`contact_number` 
                                FROM `appointment` a 
                                INNER JOIN `lawyer` L ON L.`Lawyer_Id` = a.`lawyer_id` 
                                WHERE a.`client_id` = '$user_id'";
                                $bookedAppointmentsResult = $conn->query($bookedAppointmentsQuery);

                                if ($bookedAppointmentsResult->num_rows > 0) {
                                    while ($row = $bookedAppointmentsResult->fetch_assoc()) {
                                        $lawyerId = $row['Lawyer_Id'];
                                        $lawyerName = $row['name'];
                                        $CaseType = $row['Case_Type'];
                                        $phoneNumber = $row['contact_number'];

                                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                        echo '<span class="col-md-3">' . $lawyerName . '</span>';
                                        echo '<span class="col-md-3">' . $CaseType . '</span>';
                                        echo '<span class="col-md-3">' . $phoneNumber . '</span>';
                                        echo '<span class="col-md-3">' . $row['time'] . '</span>';
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
                <script>
                    function updateLawyerOptions(category) {
                        if (category !== "") {
                            $.ajax({
                                url: "GetLawyerData.php",
                                method: "GET",
                                data: {category: category},
                                dataType: "json",
                                success: function (data) {
                                    var options = '<option value="" disabled selected>Select Your Lawyer</option>';
                                    for (var i = 0; i < data.length; i++) {
                                        options += '<option value="' + data[i].lawyer_id + '">' + data[i].name + '</option>';
                                    }
                                    $("#lawyerDropdown").html(options);
                                },
                                error: function (xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        } else {
                            $("#lawyerDropdown").html('<option value="" disabled selected>Select Your Lawyer</option>');
                        }
                    }

                    function updateTimeOptions(lawyerId) {
                        if (lawyerId !== "") {
                            $.ajax({
                                url: "GetLawyerTimes.php",
                                method: "GET",
                                data: {lawyerId: lawyerId},
                                dataType: "json",
                                success: function (data) {
                                    var timeOptions = '<option value="" disabled selected>Select Date & Time</option>';
                                    for (var i = 0; i < data.length; i++) {
                                        timeOptions += '<option value="' + data[i] + '">' + data[i] + '</option>';
                                    }
                                    $("#dateAndTimeDropdown").html(timeOptions);
                                },
                                error: function (xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        } else {
                            $("#dateAndTimeDropdown").html('<option value="" disabled selected>Select Date & Time</option>');
                        }
                    }
                </script>