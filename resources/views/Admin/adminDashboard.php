<?php global $conn, $CountAllCase, $clientsCount, $newCountCase, $lawyerCount, $CountAllCase, $stoppedCount, $ProjectCount;
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

// Helper function to get count from query
function getCount($conn, $query)
{
    $result = $conn->query($query);
    if ($result && $result->num_rows === 1) {
        return $result->fetch_assoc()['completed_count'];
    }
    return 0;
}

// Get counts
$CountAllCase = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `case` WHERE `satuts` = 'Completed'");
$clientsCount = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `client`");
$newCountCase = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `case` WHERE `satuts` = 'Pending'");
$lawyerCount = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `lawyer`");
$CountAllCase = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `case` WHERE `satuts` = 'Ongoing'");
$stoppedCount = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `case` WHERE `satuts` = 'Cancelled'");
$CountAllCases = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `case`");
$ongoingProjects = $CountAllCase + $newCountCase;
$CompleteCase = $CountAllCases - $stoppedCount;
$ProgressOfCases = ($CompleteCase / $CountAllCases) * 100;
$format_progress = number_format($ProgressOfCases, 2);
?>

<div id="main-wrapper">
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
                                                                    <?php
                                                                    // Calculate % completed cases
                                                                    $percentageCompleted = ($CountAllCase / $CountAllCases) * 100;
                                                                    // Calculate % remaining cases
                                                                    $percentageRemaining = 100 - $percentageCompleted;
                                                                    ?>
                                                            data-peity='{ "fill": ["rgba(136,108,192,1)", "rgba(241, 234, 255, 1)"]}'><?php echo $percentageCompleted; ?>/<?php echo $percentageRemaining; ?></span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h4 class="fs-24 font-w700 "> <?php echo $CountAllCase ?></h4>
                                                        <span class="fs-16 font-w400 d-block">Completed Cases</span>
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
                                                            <h4 class="fs-24 font-w700 "><?php echo $ongoingProjects; ?></h4>
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
                                                            <h4 class="fs-24 font-w700 "><?php echo $stoppedCount; ?></h4>
                                                            <span class="fs-16 font-w400 d-block">Hold</span>
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
                                            <div class="card clickable-card" onclick="redirectToCaseList()">
                                                <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Completed
                                                            Cases</h4>
                                                        <div class="d-flex align-items-center">
                                                            <h2 class="fs-32 font-w700 mb-0"> <?php echo $CountAllCase; ?> </h2>
                                                            <span class="d-block ms-4">
																	<svg width="21" height="11" viewbox="0 0 21 11"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.80878 
																		0.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.
																		8506 9.9006 20.4095 11 19.5078 11H1.49217Z"
                                                                              fill="#09BD3C"></path>
																	</svg>
																	<small class="d-block fs-16 font-w400 text-success">+0,5%</small>
																</span>
                                                            <script>
                                                                // navigate to "ClientList.php"
                                                                function redirectToCaseList() {
                                                                    window.location.href = 'caseList.php';
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div id="columnChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body px-4 pb-0">
                                                    <h4 class="fs-18 font-w600 mb-5 text-nowrap">Monthly Target</h4>
                                                    <div class="progress default-progress">
                                                        <div id="progress-bar"
                                                             class="progress-bar bg-gradient1 progress-animated"
                                                             role="progressbar">
                                                            <span class="sr-only">0% Complete</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                        <span id="progress-label">target</span>
                                                        <h4 class="mb-0" id="progress-value">100</h4>

                                                    </div>
                                                </div>

                                                <script>
                                                    // Get the progress bar element
                                                    const progressBar = document.getElementById("progress-bar");
                                                    const progressLabel = document.getElementById("progress-label");
                                                    const progressValue = document.getElementById("progress-value");

                                                    // Set the initial progress value
                                                    const lawyerCountElement = '<?= $lawyerCount?>';

                                                    // var currentValue =17;
                                                    // var currentValue =17;
                                                    // Update the progress bar width and label
                                                    progressBar.style.width = lawyerCountElement + "%";
                                                    progressLabel.textContent = (100 - lawyerCountElement) + " left from target";
                                                    progressValue.textContent = lawyerCountElement;
                                                </script>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card clickable-card" onclick="redirectToClientList()">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Clients</h4>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700"><?php echo $clientsCount; ?></h2>

                                                            <span class="d-block fs-16 font-w400">
                                                                <small class="text-danger">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers"></div>
                                                </div>
                                            </div>
                                            <script>
                                                // navigate to "ClientList.php"
                                                function redirectToClientList() {
                                                    window.location.href = 'ClientList.php';
                                                }
                                            </script>
                                        </div>

                                        <div class="col-xl-6 col-sm-6">
                                            <div class="card clickable-card" onclick="redirectToLawyerList()">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Lawyers</h4>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700"><?php echo $lawyerCount; ?></h2>

                                                            <span class="d-block fs-16 font-w400">
                                                                <small class="text-danger">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers1"></div>
                                                </div>
                                            </div>
                                            <script>
                                                // navigate to "ClientList.php"
                                                function redirectToLawyerList() {
                                                    window.location.href = 'LawyerList.php';
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="items">
                                                        <h4 class="fs-20 font-w700 mb-4">Fillow Company Profile
                                                            Website Project</h4>
                                                        <span class="fs-14 font-w400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 redial col-sm-6">
                                                    <div id="redial"></div>
                                                    <span class="text-center d-block fs-18 font-w600">On Progress <small
                                                                class="text-success"><?php echo $format_progress . "%"; ?></small></span>
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

</div>


<!--<script src="../../vendor/global/global.min.js"></script>-->
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/apexchart/apexchart.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../vendor/peity/jquery.peity.min.js"></script>
<script src="../../js/dashboard/dashboard-1.js"></script>
<!--<script src="../../js/custom.min.js"></script>-->
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
<script>
    function cardsCenter() {
        jQuery('.card-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            slideSpeed: 3000,
            paginationSpeed: 3000,
            dots: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                800: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1600: {
                    items: 1
                }
            }
        })
    }

    jQuery(window).on('load', function () {
        setTimeout(function () {
            cardsCenter();
        }, 1000);
    });
</script>

