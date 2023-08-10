
<body>
<div id="main-wrapper">
    <?php
    global $conn,$selectedCategory,$date;
    include 'Sidebar.php';

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    function generate_statement_id() {
        include '../Admin/DB_Connection.php';
        global $conn;
        $sqls = "SELECT MAX(SUBSTRING(Appoinmnet_id, 8)) as max_id FROM appointment";
        $results = $conn->query($sqls);
        if ($results->num_rows > 0) {
            $row = $results->fetch_assoc();
            $max_id = intval($row["max_id"]);
            $next_id = $max_id + 1;
            $statement_id = 'APMT-' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
            return $statement_id;
        } else {
            return "APMT-001";
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedCategory = $_POST['selected_category'];
    }

    $sql2 = "SELECT `lawyer_id`,`title`,`name` FROM `lawyer` WHERE `category` = '$selectedCategory';";
    $result2 = $conn->query($sql2);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedLawyerID = $_POST['selected_lawyer_id'];

    }
    $sql3 = "SELECT  `Avilable_date` FROM `lawyer` where CONCAT(`title`, ' ', `name`)='$selectedLawyerID'";
    $result3 = $conn->query($sql3);

    $sql4 = "SELECT  `lawyer_id` FROM `lawyer` where CONCAT(`title`, ' ', `name`)='$selectedLawyerID'";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
        $row = $result4->fetch_assoc();
        $LawyerID = $row['lawyer_id'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $message = $_POST['message'];
            $Appointmentid = generate_statement_id();
            $insertAPMT = "INSERT INTO `appointment` (`Appoinmnet_id`, `Case_Type`, `Lawyer_id`, `Description`, `client_id`) VALUES ('$Appointmentid', '$selectedCategory', '$LawyerID', 'Your_Description_Here', '')";

            if ($conn->query($insertAPMT) === TRUE) {
                echo "Appointment booked successfully!";
            } else {
                echo "Error: " . $insertAPMT . "<br>" . $conn->error;
            }
        }
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
                        <div class="card-body">
                            <div class="row">

                                <div class="col-auto">
                                    <div class="dropdown custom-dropdown">
                                        <button type="button" class="btn btn-sm btn-primary"
                                                data-bs-toggle="dropdown">Select Case Type
                                            <i class="fa fa-angle-down ms-3"></i>
                                        </button>

                                        <?php
                                        $sql="SELECT DISTINCT`category` FROM `lawyer`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            echo '<div class="dropdown-menu dropdown-menu-end">';
                                            while ($row = $result->fetch_assoc()) {
                                                $category = $row['category'];
                                                echo '<form method="POST"  >';
                                                echo '<input type="hidden" name="selected_category" value="' . $category . '">';
                                                echo '<button type="submit" class="dropdown-item category-link">' . $category . '</button>';
                                                echo '</form>';
                                            }
                                            echo '</div>';
                                        } else {
                                            echo '<div class="dropdown-menu dropdown-menu-end">';
                                            echo '<a class="dropdown-item" href="#">No cases found</a>';
                                            echo '</div>';
                                            echo '</form>>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown custom-dropdown">
                                        <button type="button" class="btn btn-sm btn-primary"
                                                data-bs-toggle="dropdown">Select Lawyer
                                            <i class="fa fa-angle-down ms-3"></i>
                                        </button>
                                        <?php
                                        if ($result2->num_rows > 0) {
                                            echo '<div class="dropdown-menu dropdown-menu-end">';
                                            while ($row = $result2->fetch_assoc()) {
                                                $lawyer_id = $row['lawyer_id'];
                                                $name = $row['name'];
                                                $title = $row['title'];
                                                echo '<form method="POST" >'; // Replace "process_selected_lawyer.php" with your processing script
                                                echo '<input type="hidden" name="selected_lawyer_id" value="' . $title . ' ' . $name . '">';
                                                echo '<button type="submit" class="dropdown-item category-link">' . $title . ' ' . $name . '</button>';
                                                echo '</form>';
                                            }
                                            echo '</div>';
                                        } else {
                                            echo '<div class="dropdown-menu dropdown-menu-end">';
                                            echo '<a class="dropdown-item" href="#">No Lawyer found</a>';
                                            echo '</div>';
                                        }

                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown custom-dropdown">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="dropdown">
                                            <i class="ti-calendar m-r-5"></i> &nbsp;&nbsp;&nbsp;Select Time
                                            <i class="fa fa-angle-down ms-3"></i>
                                        </button>
                                        <?php
                                        if ($result3->num_rows > 0) {
                                        echo '<div class="dropdown-menu dropdown-menu-end">';
                                            while ($row = $result3->fetch_assoc()) {
                                            $date = $row['Avilable_date'];
                                            echo '<form method="POST" >';
                                                echo '<input type="hidden" name="selected_date" value="' . $date . '">';
                                                echo '<button type="submit" class="dropdown-item date-link">' . $date . '</button>';
                                                echo '</form>';
                                            }
                                            echo '</div>';
                                        } else {
                                        echo '<div class="dropdown-menu dropdown-menu-end">';
                                            echo '<a class="dropdown-item" href="#">No Time Found </a>';
                                            echo '</div>';
                                        echo '</form>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="basic-form">
                                    <form method="post">
                                             <textarea name="message" class="form-control input-default fixed-textarea" placeholder="Type your notice here."></textarea>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Book Appointment</button>
                                    </form>
                                </div>
                                <style>
                                    .fixed-textarea {
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
                    <div class="card">
                        <div class="card-body">
                            <!-- Duplicated card content here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
