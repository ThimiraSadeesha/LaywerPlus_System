<div id="main-wrapper">

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

$currentDateTime = date("Y-m-d"); // Get the current date and time in the appropriate format
$submit_date = '2023-06-01 00:00:00';
$sql = "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-06-01 00:00:00' AND submit_date <= '2023-07-26 23:59:59' AND satuts = 'Completed'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $value = $row['count'];

} else {
    echo "0";
}

$ongoingProjects = $CountAllCase + $newCountCase;
$CompleteCase = $CountAllCases - $stoppedCount;
$ProgressOfCases = ($CompleteCase / $CountAllCases) * 100;
$format_progress = intval($ProgressOfCases, 2);
?>


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
<!--<script src="../../js/dashboard/dashboard-1.js"></script>-->


<!--<script src="../../js/custom.min.js"></script>-->
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
<script>



    (function($) {
        /* "use strict" */

        var dlabChartlist = function(){

            var screenWidth = $(window).width();
            let draw = Chart.controllers.line.__super__.draw; //draw shadow
            var donutChart1 = function(){
                $("span.donut1").peity("donut", {
                    width: "70",
                    height: "70"
                });
            }
            var chartBar = function(){

                var phpValue = <?php echo json_encode($value); ?>;
                var options = {
                    series: [
                        { //dashboard eka hadanna
                            name: 'New Projects',
                            data: [phpValue, phpValue, phpValue, phpValue, phpValue, phpValue, 20],
                            //radius: 12,
                        },
                        {
                            name: 'Completed Projects',
                            data: [100, 40, 55, 20, 45, 30, 80]
                        },

                    ],
                    chart: {
                        type: 'bar',
                        height: 400,

                        toolbar: {
                            show: false,
                        },

                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '57%',
                            endingShape: "rounded",
                            borderRadius: 12,
                        },

                    },
                    states: {
                        hover: {
                            filter: 'none',
                        }
                    },
                    colors:['#FFA26D', '#FF5ED2'],
                    dataLabels: {
                        enabled: false,
                    },
                    markers: {
                        shape: "circle",
                    },


                    legend: {
                        show: false,
                        fontSize: '12px',
                        labels: {
                            colors: '#000000',

                        },
                        markers: {
                            width: 18,
                            height: 18,
                            strokeWidth: 10,
                            strokeColor: '#fff',
                            fillColors: undefined,
                            radius: 12,
                        }
                    },
                    stroke: {
                        show: true,
                        width: 4,
                        curve: 'smooth',
                        lineCap: 'round',
                        colors: ['transparent']
                    },
                    grid: {
                        borderColor: '#eee',
                    },
                    xaxis: {
                        position: 'bottom',
                        categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                        labels: {
                            style: {
                                colors: '#787878',
                                fontSize: '13px',
                                fontFamily: 'poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                        crosshairs: {
                            show: false,
                        }
                    },
                    yaxis: {
                        labels: {
                            offsetX:-16,
                            style: {
                                colors: '#787878',
                                fontSize: '13px',
                                fontFamily: 'poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'white',
                            type: "vertical",
                            shadeIntensity: 0.2,
                            gradientToColors: undefined,
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 50],
                            colorStops: []
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return  val + " projects" //database eken data ganna

                            }
                        }
                    },
                };

                var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
                chartBar1.render();
            }
            var chartBar1 = function(){

                var options = {
                    series: [
                        {
                            name: 'Running',
                            data: [50, 18, 70, 40, 90, 70, 20],
                            //radius: 12,
                        },
                        {
                            name: 'Cycling',
                            data: [80, 40, 55, 20, 45, 30, 80]
                        },

                    ],
                    chart: {
                        type: 'bar',
                        height: 370,

                        toolbar: {
                            show: false,
                        },

                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '57%',
                            endingShape: "rounded",
                            borderRadius: 12,
                        },

                    },
                    states: {
                        hover: {
                            filter: 'none',
                        }
                    },
                    colors:['#FFA26D', '#FF5ED2'],
                    dataLabels: {
                        enabled: false,
                    },
                    markers: {
                        shape: "circle",
                    },


                    legend: {
                        show: false,
                        fontSize: '12px',
                        labels: {
                            colors: '#000000',

                        },
                        markers: {
                            width: 18,
                            height: 18,
                            strokeWidth: 10,
                            strokeColor: '#fff',
                            fillColors: undefined,
                            radius: 12,
                        }
                    },
                    stroke: {
                        show: true,
                        width: 4,
                        curve: 'smooth',
                        lineCap: 'round',
                        colors: ['transparent']
                    },
                    grid: {
                        borderColor: '#eee',
                    },
                    xaxis: {
                        position: 'bottom',
                        categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                        labels: {
                            style: {
                                colors: '#787878',
                                fontSize: '13px',
                                fontFamily: 'poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                        crosshairs: {
                            show: false,
                        }
                    },
                    yaxis: {
                        labels: {
                            offsetX:-16,
                            style: {
                                colors: '#787878',
                                fontSize: '13px',
                                fontFamily: 'poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'white',
                            type: "vertical",
                            shadeIntensity: 0.2,
                            gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 50],
                            colorStops: []
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return "$ " + val + " thousands"
                            }
                        }
                    },
                };

                var chartBar1 = new ApexCharts(document.querySelector("#chartBar1"), options);
                chartBar1.render();
            }

            var revenueMap = function(){
                var options = {
                    series: [
                        {
                            name: 'Net Profit',
                            data: [20, 40, 20, 30, 50, 40, 60,],
                            //radius: 12,
                        },
                    ],
                    chart: {
                        type: 'line',
                        height: 300,
                        toolbar: {
                            show: false,
                        },

                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '70%',
                            endingShape: 'rounded'
                        },
                    },
                    colors:['#886CC0'],
                    dataLabels: {
                        enabled: false,
                    },
                    markers: {
                        shape: "circle",
                    },

                    legend: {
                        show: false,
                    },
                    stroke: {
                        show: true,
                        width: 10,
                        curve:'smooth',
                        colors:['var(--primary)'],
                    },

                    grid: {
                        borderColor: '#eee',
                        show: true,
                        xaxis: {
                            lines: {
                                show: true,
                            }
                        },
                        yaxis: {
                            lines: {
                                show: false,
                            }
                        },
                    },
                    xaxis: {

                        categories: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                        labels: {
                            style: {
                                colors: '#7E7F80',
                                fontSize: '13px',
                                fontFamily: 'Poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                        crosshairs: {
                            show: false,
                        }
                    },
                    yaxis: {
                        show:true,
                        labels: {
                            offsetX: -15,
                            style: {
                                colors: '#7E7F80',
                                fontSize: '14px',
                                fontFamily: 'Poppins',
                                fontWeight: 100,

                            },
                            formatter: function (y) {
                                return y.toFixed(0) + "k";
                            }
                        },
                    },
                    fill: {
                        opacity: 1,
                        colors:'#FAC7B6'
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return "$ " + val + " hundred"
                            }
                        }
                    }
                };

                var chartBar1 = new ApexCharts(document.querySelector("#revenueMap"), options);
                chartBar1.render();


            }
            var columnChart = function(){
                var options = {
                    series: [{
                        name: 'Aplication Sent',
                        data: [40, 55, 15,55]
                    }, {
                        name: 'Appllication Answered',
                        data: [40, 55, 35,55]
                    }, {
                        name: 'Hired',
                        data: [40, 17, 55, 55]
                    }],
                    chart: {
                        type: 'bar',
                        height: 150,
                        stacked: true,
                        toolbar: {
                            show: false,
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '20%',

                            endingShape: "rounded",
                            startingShape: "rounded",
                            backgroundRadius: 20,
                            colors: {
                                backgroundBarColors: ['#ECECEC', '#ECECEC', '#ECECEC', '#ECECEC'],
                                backgroundBarOpacity: 1,
                                backgroundBarRadius: 10,
                            },
                        },

                    },
                    colors:['#ECECEC', '#886CC0', '#886CC0'],
                    xaxis: {
                        show: false,
                        axisBorder: {
                            show: false,
                        },
                        axisTicks:{
                            show: false,
                        },
                        labels: {
                            show: false,
                            style: {
                                colors: '#828282',
                                fontSize: '14px',
                                fontFamily: 'Poppins',
                                fontWeight: 'light',
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },

                        crosshairs: {
                            show: false,
                        },

                        categories: ['Sun', 'Mon', 'Tue'],
                    },
                    yaxis: {
                        show: false
                    },
                    grid: {
                        show: false,
                    },
                    toolbar: {
                        enabled: false,
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show:false
                    },
                    fill: {
                        opacity: 1
                    }
                };

                var chart = new ApexCharts(document.querySelector("#columnChart"), options);
                chart.render();
            }

            var NewCustomers = function(){
                var options = {
                    series: [
                        {
                            name: 'Net Profit',
                            data: [100,300, 100, 400, 200, 400],
                            /* radius: 30,	 */
                        },
                    ],
                    chart: {
                        type: 'line',
                        height: 50,
                        width: 100,
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false
                        },
                        sparkline: {
                            enabled: true
                        }

                    },

                    colors:['var(--primary)'],
                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    stroke: {
                        show: true,
                        width: 6,
                        curve:'smooth',
                        colors:['var(--primary)'],
                    },

                    grid: {
                        show:false,
                        borderColor: '#eee',
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0

                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    xaxis: {
                        categories: ['Jan', 'feb', 'Mar', 'Apr', 'May'],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            show: false,
                            style: {
                                fontSize: '12px',
                            }
                        },
                        crosshairs: {
                            show: false,
                            position: 'front',
                            stroke: {
                                width: 1,
                                dashArray: 3
                            }
                        },
                        tooltip: {
                            enabled: true,
                            formatter: undefined,
                            offsetY: 0,
                            style: {
                                fontSize: '12px',
                            }
                        }
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                        colors:'#FB3E7A'
                    },
                    tooltip: {
                        enabled:false,
                        style: {
                            fontSize: '12px',
                        },
                        y: {
                            formatter: function(val) {
                                return "$" + val + " thousands"
                            }
                        }
                    }
                };

                var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers"), options);
                chartBar1.render();

            }
            var NewCustomers1 = function(){
                var options = {
                    series: [
                        {
                            name: 'Net Profit',
                            data: [100,300, 200, 400, 100, 400],
                            /* radius: 30,	 */
                        },
                    ],
                    chart: {
                        type: 'line',
                        height: 50,
                        width: 80,
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false
                        },
                        sparkline: {
                            enabled: true
                        }

                    },

                    colors:['#0E8A74'],
                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    stroke: {
                        show: true,
                        width: 6,
                        curve:'smooth',
                        colors:['var(--primary)'],
                    },

                    grid: {
                        show:false,
                        borderColor: '#eee',
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0

                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    xaxis: {
                        categories: ['Jan', 'feb', 'Mar', 'Apr', 'May'],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            show: false,
                            style: {
                                fontSize: '12px',
                            }
                        },
                        crosshairs: {
                            show: false,
                            position: 'front',
                            stroke: {
                                width: 1,
                                dashArray: 3
                            }
                        },
                        tooltip: {
                            enabled: true,
                            formatter: undefined,
                            offsetY: 0,
                            style: {
                                fontSize: '12px',
                            }
                        }
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                        colors:'#FB3E7A'
                    },
                    tooltip: {
                        enabled:false,
                        style: {
                            fontSize: '12px',
                        },
                        y: {
                            formatter: function(val) {
                                return "$" + val + " thousands"
                            }
                        }
                    }
                };

                var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers1"), options);
                chartBar1.render();

            }
            var ProG_val = <?php echo json_encode($format_progress); ?>;
            var redial = function(){
                var options = {
                    //bigcircle

                    series: [ProG_val],
                    chart: {
                        type: 'radialBar',
                        offsetY: 0,
                        height:350,
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -130,
                            endAngle: 130,
                            track: {
                                background: "#F1EAFF",
                                strokeWidth: '100%',
                                margin: 5,
                            },

                            hollow: {
                                margin: 30,
                                size: '45%',
                                background: '#F1EAFF',
                                image: undefined,
                                imageOffsetX: 0,
                                imageOffsetY: 0,
                                position: 'front',
                            },

                            dataLabels: {
                                name: {
                                    show: false
                                },
                                value: {
                                    offsetY: 5,
                                    fontSize: '22px',
                                    color:'#886CC0',
                                    fontWeight:700,
                                }
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 1600,
                        options: {
                            chart: {
                                height:250
                            },
                        }
                    }

                    ],
                    grid: {
                        padding: {
                            top: -10
                        }
                    },
                    /* stroke: {
                      dashArray: 4,
                      colors:'#6EC51E'
                    }, */
                    fill: {
                        type: 'gradient',
                        colors:'#FF63E6',
                        gradient: {
                            shade: 'white',
                            shadeIntensity: 0.15,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        },
                    },
                    labels: ['Average Results'],
                };

                var chart = new ApexCharts(document.querySelector("#redial"), options);
                chart.render();


            }

            /* Function ============ */
            return {
                init:function(){
                },


                load:function(){
                    donutChart1();
                    chartBar();
                    chartBar1();
                    revenueMap();
                    columnChart();
                    NewCustomers();
                    NewCustomers1();
                    redial();

                },

                resize:function(){
                }
            }

        }();
        jQuery(window).on('load',function(){
            setTimeout(function(){
                dlabChartlist.load();
            }, 1000);

        });

    })(jQuery);
</script>

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

