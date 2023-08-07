<!DOCTYPE html>
<html lang="en">
<head>

    <title>LawyerPlus - Client Area</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../../vendor/nouislider/nouislider.min.css">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
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
        <svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55
                   55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 
                   14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.
                   5803H36V34.9784H28.0092V46Z"
                  fill="url(#paint0_linear)"></path>
            <defs>
            </defs>
        </svg>

        <?php
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire');

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'lawyerPlus';

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

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
        foreach ($usernames as $username) {
            echo $username . "<br>";
        }
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
                        <a href="app-profile.html" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                                 height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="ms-2">Profile </span>
                        </a>
                        <a href="logout.php" class="dropdown-item ai-icon">
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
                <a href="ClientDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <li>
                <a href="ClientCaseList.php">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span class="nav-text">My Cases</span>
                </a>
            </li>
            <li>
                <a href="FindLawyer.php">
                    <i class="fas fa-user-tie"></i>
                    <span class="nav-text">Lawyers</span>
                </a>
            </li>
            <li>
                <a href="ClientAppointment.php">
                    <i class="fas fa-calendar"></i>
                    <span class="nav-text">Appointment</span>
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
<script src="../../js/plugins-init/chartjs-init.js"></script>

</body>
</html>
