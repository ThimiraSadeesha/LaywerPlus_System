<div id="main-wrapper">
    <?php global $conn, $lawyerCount;
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
    function getCount($conn, $query)
    {
        $result = $conn->query($query);
        if ($result && $result->num_rows === 1) {
            return $result->fetch_assoc()['completed_count'];
        }
        return 0;
    }

    $lawyerCount = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `lawyer`");

    function generate_statement_id() {
        include '../Admin/DB_Connection.php';
        global $conn;
        $sql = "SELECT MAX(SUBSTRING(statement_id, 5)) as max_id FROM client_statement";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $max_id = intval($row["max_id"]);
            $next_id = $max_id + 1;
            $statement_id = 'SMT-' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
            return $statement_id;
        } else {
            return "SMT-001";
        }
    }

    if (isset($_POST['submit'])) {
        $topic = $_POST['topic'];
        $message = $_POST['message'];

        insert_statement($topic, $message);
    }
    function encryptMessage($message, $key): string
    {
        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($message, "AES-256-CBC", $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
    function insert_statement($topic, $message) {
        include '../Admin/DB_Connection.php';
        global $conn;
        $secretKey = "Lawyer_Plus_System";
        $encryptedMessage = encryptMessage($message, $secretKey);
        $topic = $conn->real_escape_string($topic);
        $message = $conn->real_escape_string($message);
        $statement_id = generate_statement_id();
        $sql = "INSERT INTO client_statement (statement_id, client_id, lawyer_id, message, Topic, Case_id) VALUES ('$statement_id', '', '', '$encryptedMessage', '$topic', 16)";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function getLatestStatements($conn)
    {
        $query = "SELECT `Topic`, `message` FROM client_statement ORDER BY `statement_id` DESC LIMIT 3";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            return $rows;
        }
        return [];
    }

    $latestStatements = getLatestStatements($conn);
    function decryptMessage($latestStatements, $key) {
        $data = base64_decode($latestStatements);
        $iv = substr($data, 0, 16);
        $encrypted = substr($data, 16);
        return openssl_decrypt($encrypted, "AES-256-CBC", $key, 0, $iv);
    }

    if (!empty($latestStatements)) {
        $secretKey = "Lawyer_Plus_System";
        // Decrypt and process the first statement
        $firstTopic = $latestStatements[0]['Topic'];
        $firstEncryptedMessage = $latestStatements[0]['message'];
        $firstMessage = decryptMessage($firstEncryptedMessage, $secretKey);

        // Decrypt and process the second statement
        $secondTopic = $latestStatements[1]['Topic'];
        $secondEncryptedMessage = $latestStatements[1]['message'];
        $secondMessage = decryptMessage($secondEncryptedMessage, $secretKey);

        // Decrypt and process the third statement
        $thirdTopic = $latestStatements[2]['Topic'];
        $thirdEncryptedMessage = $latestStatements[2]['message'];
        $thirdMessage = decryptMessage($thirdEncryptedMessage, $secretKey);
    } else {
        echo "No statements found.";
    }

    $query2 = "SELECT c.`case_id`, c.`lawyer_id`, c.`submit_date`, c.`C_type`, c.`satuts`, c.`Amount`, l.`title`, l.`name`, l.`category`
          FROM `cases` c
          LEFT JOIN `lawyer` l ON c.`lawyer_id` = l.`lawyer_id`
          WHERE c.`client_id` = 'CLT-0003'
          ORDER BY c.`case_id` DESC
          LIMIT 1";

    // Execute the query and store the result in $result_case_lawyer
    $result_case_lawyer = $conn->query($query2);

    // Display the results
    if ($result_case_lawyer && $result_case_lawyer->num_rows > 0) {
        $row = $result_case_lawyer->fetch_assoc();
        $Case_ID= $row['case_id'];
        $law_id= $row['lawyer_id'] ;
        $date= $row['submit_date'] ;
        $status= $row['satuts'] ;
        $l_type= $row['category'] ;
        $c_type= $row['C_type'] ;
        $amount= $row['Amount'] ;
        $title= $row['title'] ;
        $name= $row['name'] ;
    }

    ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xl-3  col-lg-6 col-sm-12 align-items-center customers">
                                <div class="media-body">
                                    <span class="text-primary d-block fs-18 font-w500 mb-1"><?php echo $Case_ID?></span>
                                    <h3 class="fs-18 text-black font-w600"><?php echo $c_type?></h3>
                                    <span class="d-block mb-lg-0 mb-0 fs-16"><i
                                                class="fas fa-calendar me-3"></i>Created on <?php echo $date?></span>
                                </div>
                            </div>
                            <div class="col-xl-2  col-lg-3 col-sm-4  col-6 mb-3 text-lg-right">
                                <div class="d-flex project-image">
                                    <img src="../../images/user.png" alt="">
                                    <div>
                                        <h3 class="fs-18 text-black font-w600"><?php echo $l_type?></h3>
                                        <!--<small class="d-block fs-16 font-w400">--><?php //echo $l_type?><!--</small>-->
                                        <span class="fs-18 font-w500"><?php echo $title." ".$name?></span>
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
                                    <svg class="me-3" width="55" height="55" viewbox="0 0 55 55" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="27.5" cy="27.5" r="27.5" fill="#886CC0"></circle>
                                        <g clip-path="url(#clip0)">
                                            <path d="M37.2961 23.6858C37.1797 23.4406 36.9325 23.2843 36.661 23.2843H29.6088L33.8773 16.0608C34.0057 15.8435 34.0077 15.5738 33.8826 15.3546C33.7574 15.1354 33.5244 14.9999 33.2719 15L27.2468 15.0007C26.9968 15.0008 26.7656 15.1335 26.6396 15.3495L18.7318 28.905C18.6049 29.1224 18.604 29.3911 18.7294 29.6094C18.8548 29.8277 19.0873 29.9624 19.3391 29.9624H26.3464L24.3054 38.1263C24.2255 38.4457 24.3781 38.7779 24.6725 38.9255C24.7729 38.9757 24.8806 39 24.9872 39C25.1933 39 25.3952 38.9094 25.5324 38.7413L37.2058 24.4319C37.3774 24.2215 37.4126 23.931 37.2961 23.6858Z"
                                                  fill="white"></path>
                                        </g>
                                        <defs>
                                            <clippath>
                                                <rect width="24" height="24" fill="white"
                                                      transform="translate(16 15)"></rect>
                                            </clippath>
                                        </defs>
                                    </svg>
                                    <div>
                                        <small class="d-block fs-16 font-w400">Last Update</small>
                                        <span class="fs-18 font-w500">Tuesday,  Sep 29th 2020</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2  col-lg-6 col-sm-4 mb-sm-3 mb-3 text-end">
                                <div class="d-flex justify-content-end project-btn">
                                    <a class=" btn bg-progress fs-18 font-w600 text-nowrap text-bg-progress"><?php echo $status?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class=" widget-stat card bg-primary card clickable-card" onclick="redirectToPayment()">
                                <div class="card-body p-4 d-flex align-items-center">
                                    <div class="media">
                                          <span class="me-3">
                                              <i class="flaticon-381-user-7"></i>
                                          </span>
                                        <div class="media-body text-white align-left">
                                            <p class="mb-1">Total Due Payment</p>
                                            <h3 class="text-white"><?php echo "RS ".$amount?></h3>
                                        </div>
                                        <script>
                                            function redirectToPayment() {
                                                window.location.href = 'ClientPayment.php';
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card clickable-card" onclick="redirectToClientList()">
                                <div class="card-body d-flex px-4 justify-content-between">
                                    <div>
                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Find A Lawyer</h4>
                                        <div class="">
                                            <h2 class="text-success fs-32 font-w700"><?php echo "+ " . $lawyerCount; ?></h2>
                                            <span class="d-block fs-16 font-w400">
                                                <small class="text-success">Available lawyers</small></span>
                                        </div>
                                    </div>
                                    <div id="NewCustomers"></div>
                                    <script>
                                        // navigate to "ClientList.php"
                                        function redirectToClientList() {
                                            window.location.href = 'findLawyer.php';
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body px-4 pb-0"  >
                                    <h4 class="fs-18 font-w600 mb-4 text-nowrap">Next Appointment</h4>
                                    <div class="d-flex align-items-center mb-3"> <!-- Added mb-3 class here -->
                                        <div class="progress default-progress flex-grow-1">
                                            <div id="progress-bar" class="progress-bar bg-gradient1 progress-animated"
                                                 role="progressbar">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="mb-2">Sep 8th, 2023</span>
                                    <p class="fs-14 text-muted mb-0">Don't forget to prepare for the meeting.</p>
                                </div>
                                <script>
                                    // navigate to "ClientList.php"
                                    function redirectToClientList() {
                                        window.location.href = 'clientAppointment.php';
                                    }
                                </script>
                            </div>
                        </div>
                        <script>
                            // Get the progress bar element
                            const progressBar = document.getElementById("progress-bar");
                            const progressLabel = document.getElementById("progress-label");
                            const progressValue = document.getElementById("progress-value");

                            const lawyerCountElement = '<?= $lawyerCount?>';

                            progressBar.style.width = lawyerCountElement + "%";
                            progressLabel.textContent = (100 - lawyerCountElement) + " left from target";
                            progressValue.textContent = lawyerCountElement;
                        </script>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card clickable-card" onclick="redirectToLawyerList()">
                                <div class="card-body d-flex px-4 justify-content-between">
                                    <div>
                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">New Case</h4>
                                        <div class="">
                                            <div class="mb-4">
                                                <a href="CaseSubmit.php" class="btn btn-primary">Submit New Case</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="card-title">Latest Updates</h4>
                                    <p class="m-0 subtitle">Latest updates of the case <code><?php echo $Case_ID?></code></p>
                                </div>
                                <div class="card-body">

                                    <div class="accordion accordion-primary-solid" id="accordion-two">
                                        <div class="accordion-item">
                                            <div class="accordion-header  rounded-lg" id="accord-2One"
                                                 data-bs-toggle="collapse" data-bs-target="#collapse2One"
                                                 aria-controls="collapse2One" aria-expanded="true" role="button">
                                                <span class="accordion-header-text"> <?php echo $firstTopic; ?></span>
                                            </div>
                                            <div id="collapse2One" class="collapse accordion__body show"
                                                 aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
                                                <div class="accordion-body-text">
                                                    <?php echo $firstMessage; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header collapsed rounded-lg" id="accord-2Two"
                                                 data-bs-toggle="collapse" data-bs-target="#collapse2Two"
                                                 aria-controls="collapse2Two" aria-expanded="true" role="button">
                                                <span class="accordion-header-text">  <?php echo $secondTopic; ?></span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="collapse2Two" class="collapse accordion__body"
                                                 aria-labelledby="accord-2Two" data-bs-parent="#accordion-two">
                                                <div class="accordion-body-text">
                                                    <?php echo $secondMessage; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header collapsed rounded-lg" id="accord-2Three"
                                                 data-bs-toggle="collapse" data-bs-target="#collapse2Three"
                                                 aria-controls="collapse2Three" aria-expanded="true" role="button">
                                                <span class="accordion-header-text">  <?php echo $thirdTopic; ?></span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="collapse2Three" class="collapse accordion__body"
                                                 aria-labelledby="accord-2Three" data-bs-parent="#accordion-two">
                                                <div class="accordion-body-text">
                                                    <?php echo $thirdMessage; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="card-title">Send a Statement</h4>
                                    <p class="m-0 subtitle">Select the case <code><?php echo $Case_ID?></code></p>
                                </div>
                                <div class="card-body">
                                    <div class="accordion">
                                        <div class="basic-form">
                                            <form method="post">
                                                <div class="input-group mb-3 input-primary">
                                                    <input type="text"  name="topic" class="form-control input-default "
                                                           placeholder="Statement Heading Here">
                                                </div>
                                        </div>
                                        <textarea name="message" class="form-control input-default fixed-textarea"
                                                  placeholder=""></textarea>
                                        <style>
                                            .fixed-textarea {
                                                resize: none;
                                                height: 60%;
                                                border: 1px solid #6c4bae;
                                            }</style>
                                        <br>
                                        <button type="submit"  name="submit" class="btn btn-primary btn-sm">Send Statement</button>
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
</div>

<!--<script src="../../vendor/global/global.min.js"></script>-->
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/apexchart/apexchart.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/peity/jquery.peity.min.js"></script>
<!--<script src="../../js/dashboard/dashboard-1.js"></script>-->
<!--<script src="../../js/custom.min.js"></script>-->
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>



