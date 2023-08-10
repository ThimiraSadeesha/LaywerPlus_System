<div id="main-wrapper">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <?php
    session_start();
    include "Sidebar.php";

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';
    $conn = new mysqli($host, $user, $password, $dbname);

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

    $query = "SELECT category FROM lawyer";
    $result = $conn->query($query);

    if ($result) {
        $caseOptions = "";
        while ($row = $result->fetch_assoc()) {
            $category = $row['category'];
            $caseOptions .= "<option value='$category'>$category</option>";
        }
    } else {
        $caseOptions = "<option value='' disabled selected>No case categories found</option>";
    }
    $last_numeric_id = null;
    do {
        $middleNumber = str_pad($last_numeric_id + 1, 4, '0', STR_PAD_LEFT);
        $caseID_id = "CSE-" . $middleNumber;

        // Check if the client_id is already taken by an active client or a deleted client
        $check_query = "(SELECT case_id FROM cases WHERE case_id = '$caseID_id')
                UNION
                (SELECT case_id FROM cases WHERE client_id = '$caseID_id')";

        $check_result = $conn->query($check_query);

        if ($check_result->num_rows === 0) {
            break;
        }
        $last_numeric_id++;

    }while(true);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["category"])) {
            $selectedCategory = $_POST["category"];
            $selectedLawyer = $_POST["lawyer"];
            $description = $_POST["description"];
            $date = $_POST["dates"];
            $formattedDate = date("Y-m-d", strtotime($date));
            $phoneNumber = $_POST["phoneNumber"];
            $email = $_POST["email"];

        }
        $qury="SELECT `lawyer_id` FROM `lawyer` WHERE `category`='$selectedCategory' AND `name`='$selectedLawyer'";
        $result = $conn->query($qury);
        $row = $result->fetch_assoc();
        $Lawyerid=$row['lawyer_id'];


        $sql="INSERT INTO `cases`(`case_id`, `lawyer_id`, `client_id`, `description`, `C_type`, `submit_date`, `satuts`,`Amount`) VALUES ('$caseID_id','$Lawyerid','$user_id','$description','$selectedCategory','$formattedDate','Pending','8970')";
        $result = $conn->query($sql);
        if ($result) {
            echo "<script>alert('Case Submitted Successfully')</script>";
        } else {
            echo "<script>alert('Case Submission Failed')</script>";
        }

    }

    $conn->close();

    ?>
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Client</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Submit New Case</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Case Category</label>
                                            <select name="category" class="form-control" id="categorySelect" required=""
                                                    onchange="updateLawyerOptions(this.value)">
                                                <?php echo $caseOptions; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Description</label>
                                            <input type="text" name="description" class="form-control"
                                                   placeholder="Briefly describe the case nature" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Select Lawyer</label>
                                            <select name="lawyer" class="form-control" id="lawyerSelect" required="">
                                                <!-- Lawyer options will be dynamically updated here -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Next Court date</label>
                                            <input type="date" class="form-control" id="dates" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Contact Number*</label>
                                            <input type="text" name="phoneNumber" class="form-control"
                                                   placeholder="(+94)77 123 4567" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Email*</label>
                                            <input type="text" name="place" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12" align="center">
                                        <label>
                                            <div class="alert alert-danger text-center" role="alert"> By clicking the
                                                "Submit Case" button, I confirm that I have reviewed the
                                                provided details and affirm their accuracy for the purpose of submitting
                                                this case.
                                            </div>
                                        </label>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Submit Case
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function updateLawyerOptions(category) {
        $.ajax({
            url: 'GetLawyers.php',
            type: 'GET',
            data: {category: category}, // Data to be sent along with the request
            success: function (response) {
                $('#lawyerSelect').html(response);  // Update the HTML element with id
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/select2/js/select2.full.min.js"></script>
<script src="../../js/plugins-init/select2-init.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/demo.js"></script>
<script src="../../js/styleSwitcher.js"></script>
<script src="../../vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
