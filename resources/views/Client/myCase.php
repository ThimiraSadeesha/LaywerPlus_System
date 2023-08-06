<div id="main-wrapper">
    <?php global $conn, $lawyerCount;
    include 'sidebar.php';
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $query2 = "SELECT c.`case_id`, c.`lawyer_id`, c.`submit_date`, c.`C_type`, c.`satuts`, c.`Amount`, l.`title`, l.`name`, l.`category`
          FROM `case` c
          LEFT JOIN `lawyer` l ON c.`lawyer_id` = l.`lawyer_id`
          WHERE c.`client_id` = 'CLT-0003'
          ORDER BY c.`case_id`";

    $result_case_lawyer = $conn->query($query2);

    ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                if ($result_case_lawyer && $result_case_lawyer->num_rows > 0) {
                    // Display the first row
                    // ... (existing code)

                    // Display the rest of the rows
                    while ($row = $result_case_lawyer->fetch_assoc()) {
                        // Removed the redundant nested while loop
                        $Case_ID= $row['case_id'] ;
                        $law_id= $row['lawyer_id'] ;
                        $date= $row['submit_date'] ;
                        $status= $row['satuts'] ;
                        $l_type= $row['category'] ;
                        $c_type= $row['C_type'] ;
                        $amount= $row['Amount'] ;
                        $title= $row['title'] ;
                        $name= $row['name'];
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-3  col-lg-6 col-sm-12 align-items-center customers">
                                        <div class="media-body">
                                            <span class="text-primary d-block fs-18 font-w500 mb-1"><?php echo "Case ID: ".$Case_ID ?></span>
                                            <h3 class="fs-18 text-black font-w600"><?php echo "Case Type:".$c_type ?></h3>
                                            <span class="d-block mb-lg-0 mb-0 fs-16"><i class="fas fa-calendar me-3"></i>Created on: <?php echo $date ?></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2  col-lg-3 col-sm-4  col-6 mb-3 text-lg-right">
                                        <div class="d-flex project-image">
                                            <img src="../../images/user.png" alt="">
                                            <div>
                                                <h3 class="fs-18 text-black font-w600"><?php echo $title.$name ?></h3>
                                                <small class="d-block fs-16 font-w400">
                                                    <span class="fs-18 font-w500"><?php echo $l_type ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-right">
                                        <div class="d-flex project-image">
                                            <img src="../../images/user.png" alt="">
                                            <div>
                                                <small class="d-block fs-16 font-w400">Assistant</small>
                                                <span class="fs-18 font-w500">Marley Dokidis</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3  col-lg-6 col-sm-6 mb-sm-4 mb-0">
                                        <div class="d-flex project-image">


                                        <div class="d-flex project-image">
                                            <div>
                                                <small class="d-block fs-16 font-w400"></small>
                                                <h3 class="fs-18 text-black font-w600">Amount: <?php echo" Rs.".$amount ?></h3>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2  col-lg-6 col-sm-4 mb-sm-3 mb-3 text-end">

                                        <div class="d-flex justify-content-end project-btn">
                                            <a class="btn bg-progress fs-18 font-w600 text-nowrap text-bg-progress"><?php echo $status ?></a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../../vendor/apexchart/apexchart.js"></script>
    <script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="../../vendor/peity/jquery.peity.min.js"></script>
    <script src="../../js/dlabnav-init.js"></script>
    <script src="../../js/styleSwitcher.js"></script>


