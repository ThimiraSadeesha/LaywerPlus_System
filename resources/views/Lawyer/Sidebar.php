<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>LawyerPlus - Lawyer Area</title>
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../../vendor/nouislider/nouislider.min.css">
    <link href="../../css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/51900a2fdc.js" crossorigin="anonymous"></script>

</head>

<body>
<div id="preloader">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>


<div class="nav-header">
    <a class="brand-logo">

        <?php


        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'lawyerPlus';

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT username FROM admin";


        $result = $conn->query($sql);

        $usernames = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usernames[] = $row["username"];
            }
        } else {
            echo "No results found";
        }

        $conn->close();
        ?>
        <div class="brand-title">
            <h2 class="">
                <?php
                echo $_SESSION['user_id'];
                //        foreach ($usernames as $username) {
                //            echo $username . "<br>";
                //        }
                ?>
            </h2>
            <span class="brand-sub-title">Welcome Back</span>
        </div>


    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="header border-bottom">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Dashboard
                    </div>

                </div>
                <li class="nav-item dropdown  header-profile">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                        <img src="../../images/user.png" width="56" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">

                        <a href="../Client/logout.php" class="dropdown-item ai-icon">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18"
                                 viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span class="ms-2">Logout
                            </span>

                        </a>
                    </div>
                </li>
            </div>
        </nav>
    </div>
</div>

<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="active">
                <a href="LawyerDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="LawyerCases.php">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span class="nav-text">Cases</span>
                </a>
            </li>
            <li>
                <a href="LawyerAvailableDate.php">
                    <i class="fas fa-pager"></i>
                    <span class="nav-text">Appointments</span>
                </a>
            </li>
            <li>
                <a href="LawyerClients.php">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Clients</span>
                </a>
            </li>
            <li>
                <a href="LawyerReports.php">
                    <i class="fas fa-receipt"></i>
                    <span class="nav-text">Clients</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Required vendors -->
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/moment/moment.min.js"></script>
<script src="../../vendor/fullcalendar/js/main.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/demo.js"></script>
<script src="../../js/styleSwitcher.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/apexchart/apexchart.js"></script>
<!--<script src="../../js/plugins-init/chartjs-init.js"></script>-->

</body>
</html>
