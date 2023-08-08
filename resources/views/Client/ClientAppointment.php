<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div id="main-wrapper">
    <?php
    global $conn, $lawyerCount;
    include 'Sidebar.php';


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lawyerplus";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
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

            // Check if the appointment ID already exists
            $checkQuery = "SELECT * FROM `appointment` WHERE `Appointment_id` = '$appointmentId'";
            $checkResult = $conn->query($checkQuery);
            if ($checkResult->num_rows === 0) {
                break;
            }
            $last_numeric_id++;

        } while (true);

        // Insert appointment data into the appointment table
        $insertQuery = "INSERT INTO `appointment` (`Appointment_id`, `Case_Type`, `Lawyer_Id`, `Description`, `client_id`, `time`)
                    VALUES ('$appointmentId', '$caseType', '$lawyerId', '$description', NULL, '$dateTime')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "Appointment created successfully.";
        } else {
            echo "Error creating appointment: " . $conn->error;
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
                                        <select name="category" class="form-control" id="caseType" required="" onchange="updateLawyerOptions(this.value)">
                                            <option value="" disabled selected>Select a category</option>
                                            <?php echo $CatogeryOptions; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <select name="lawyer" class="form-control" id="lawyerDropdown" required="" onchange="updateTimeOptions(this.value)">
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
                                    <textarea name="description" id="textarea" class="form-control input-default fixed-textarea"
                                              placeholder="Type your notice here."></textarea>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Send
                                            Statement
                                        </button>
                                </div>
                              
                                <style>
                                    .fixed-textarea {
                                        resize: none;
                                        height: 120px;
                                        border: 1px solid #6c4bae;
                                    }
                                </style>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function updateLawyerOptions(category) {
        if (category !== "") {
            $.ajax({
                url: "GetLawyerData.php",
                method: "GET",
                data: { category: category },
                dataType: "json",
                success: function(data) {
                    var options = '<option value="" disabled selected>Select Your Lawyer</option>';
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i].lawyer_id + '">' + data[i].name + '</option>';
                    }
                    $("#lawyerDropdown").html(options);
                },
                error: function(xhr, status, error) {
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
                data: { lawyerId: lawyerId },
                dataType: "json",
                success: function(data) {
                    var timeOptions = '<option value="" disabled selected>Select Date & Time</option>';
                    for (var i = 0; i < data.length; i++) {
                        timeOptions += '<option value="' + data[i] + '">' + data[i] + '</option>';
                    }
                    $("#dateAndTimeDropdown").html(timeOptions);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            $("#dateAndTimeDropdown").html('<option value="" disabled selected>Select Date & Time</option>');
        }
    }
</script>
//