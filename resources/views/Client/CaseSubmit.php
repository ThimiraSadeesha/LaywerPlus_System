<div id="main-wrapper">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <?php
    include "Sidebar.php";

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';
    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
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
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Case Category</label>
                                            <select name="category" class="form-control" id="categorySelect" required="" onchange="updateLawyerOptions(this.value)">
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
                                            <input type="date" class="form-control" id="date" required="">
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
                                            <div class="alert alert-danger text-center" role="alert"> By clicking the "Submit Case" button, I confirm that I have reviewed the
                                                provided details and affirm their accuracy for the purpose of submitting this case.</div>
                                        </label>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Submit Case</button>
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
            data: { category: category }, // Data to be sent along with the request
            success: function(response) {
                $('#lawyerSelect').html(response);  // Update the HTML element with id 
            }
        });
    }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include JS -->
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
