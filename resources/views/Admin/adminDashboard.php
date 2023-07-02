<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    
    <title>Admin Dashboard</title>
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../../vendor/nouislider/nouislider.min.css">
    <link href="../../css/style.css" rel="stylesheet">

</head>
<body>

<div id="preloader">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>

<div id="main-wrapper">

    <div class="nav-header">
        <a class="brand-logo">
            <svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z"
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
                <h2 class="">Welcome.</h2>

                <span class="brand-sub-title">
        <?php
        foreach ($usernames as $username) {
            echo $username . "<br>";
        }
        ?>
    </span>
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
                            <img src="../../images/user.jpg" width="56" alt="">
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
                            <a href="login.php" class=" icon-logout">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18"
                                     height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span class="ms-2">Inbox </span>
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
                <li><a class="" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                <li>
                    <a class="" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-info-circle"></i>
                        <span class="nav-text">Calender</span>
                    </a>
                </li>
                <li><a class="" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-chart-area"></i>
                        <span class="nav-text">Charts</span>
                    </a>
                </li>
                <li><a class=" " href="javascript:void()" aria-expanded="false">
                        <i class="fab fa-bootstrap"></i>
                        <span class="nav-text">Bootstrap</span>
                    </a>

                </li>
                <li><a class="" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-heart"></i>
                        <span class="nav-text">Plugins</span>
                    </a>

                </li>
                <li><a class="" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-file-alt"></i>
                        <span class="nav-text">Forms</span>
                    </a>
                </li>
                <li><a class="" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Table</span>
                    </a>

                </li>
                <li><a class=" " href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-clone"></i>
                        <span class="nav-text">Pages</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header border-0 flex-wrap">
                                            <h4 class="fs-20 font-w700 mb-2">Project Statistics</h4>
                                            <div class="d-flex align-items-center project-tab mb-2">
                                                <div class="card-tabs mt-3 mt-sm-0 mb-3 ">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab"
                                                               href="#monthly" role="tab">Monthly</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#Weekly"
                                                               role="tab">Weekly</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#Today"
                                                               role="tab">Today</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="d-flex">
                                                    <div class="d-inline-block position-relative donut-chart-sale mb-3">
                                                        <span class="donut1"
                                                              data-peity='{ "fill": ["rgba(136,108,192,1)", "rgba(241, 234, 255, 1)"],   "innerRadius": 20, "radius": 15}'>5/8</span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h4 class="fs-24 font-w700 ">246</h4>
                                                        <span class="fs-16 font-w400 d-block">Total Projects</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="d-flex me-5">
                                                        <div class="mt-2">
                                                            <svg width="13" height="13" viewbox="0 0 13 13" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="6.5" cy="6.5" r="6.5"
                                                                        fill="#FFCF6D"></circle>
                                                            </svg>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h4 class="fs-24 font-w700 ">246</h4>
                                                            <span class="fs-16 font-w400 d-block">On Going</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="mt-2">
                                                            <svg width="13" height="13" viewbox="0 0 13 13" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="6.5" cy="6.5" r="6.5"
                                                                        fill="#FFA7D7"></circle>
                                                            </svg>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h4 class="fs-24 font-w700 ">28</h4>
                                                            <span class="fs-16 font-w400 d-block">Unfinished</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="monthly">
                                                    <div id="chartBar" class="chartBar"></div>
                                                </div>
                                                <div class="tab-pane fade" id="Weekly">
                                                    <div id="chartBar1" class="chartBar"></div>
                                                </div>
                                                <div class="tab-pane fade" id="Today">
                                                    <div id="chartBar2" class="chartBar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Cases</h4>
                                                        <div class="d-flex align-items-center">
                                                            <h2 class="fs-32 font-w700 mb-0">88</h2>
                                                            <span class="d-block ms-4">
																	<svg width="21" height="11" viewbox="0 0 21 11"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.80878 0.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.8506 9.9006 20.4095 11 19.5078 11H1.49217Z"
                                                                              fill="#09BD3C"></path>
																	</svg>
																	<small class="d-block fs-16 font-w400 text-success">+0,5%</small>
																</span>
                                                        </div>
                                                    </div>
                                                    <div id="columnChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body px-4 pb-0">
                                                    <h4 class="fs-18 font-w600 mb-5 text-nowrap">Ongoing Projects</h4>
                                                    <div class="progress default-progress">
                                                        <div class="progress-bar bg-gradient1 progress-animated"
                                                             style="width: 40%; height:10px;" role="progressbar">
                                                            <span class="sr-only">45% Complete</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                        <span>80 left from target</span>
                                                        <h4 class="mb-0">20</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700">562</h2>
                                                            <span class="fs-18 font-w500 d-block">Total Clients</span>
                                                            <span class="d-block fs-16 font-w400"><small
                                                                        class="text-danger">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700">892</h2>
                                                            <span class="fs-18 font-w500 d-block">New Projects</span>
                                                            <span class="d-block fs-16 font-w400"><small
                                                                        class="text-success">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class=" owl-carousel card-slider">
                                                        <div class="items">
                                                            <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile
                                                                Website Project</h4>
                                                            <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                                                        </div>
                                                        <div class="items">
                                                            <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile
                                                                Website Project</h4>
                                                            <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                                                        </div>
                                                        <div class="items">
                                                            <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile
                                                                Website Project</h4>
                                                            <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 redial col-sm-6">
                                                    <div id="redial"></div>
                                                    <span class="text-center d-block fs-18 font-w600">On Progress <small
                                                                class="text-success">90%</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/apexchart/apexchart.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/peity/jquery.peity.min.js"></script>
<script src="../../js/dashboard/dashboard-1.js"></script>
<script src="../../vendor/owl-carousel/owl.carousel.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
</body>
</html>
