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
    $CountAllCase_com = getCount($conn, "SELECT COUNT(*) AS completed_count FROM `case` WHERE `satuts` = 'Completed'");
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

                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-3  col-lg-6 col-sm-12 align-items-center customers">
                                        <div class="media-body">
                                            <span class="text-primary d-block fs-18 font-w500 mb-1">#P-000441425</span>
                                            <h3 class="fs-18 text-black font-w600">Redesign Owlio Landing Page
                                                Web..</h3>
                                            <span class="d-block mb-lg-0 mb-0 fs-16"><i
                                                        class="fas fa-calendar me-3"></i>Created on Sep 8th, 2020</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2  col-lg-3 col-sm-4  col-6 mb-3 text-lg-right">
                                        <div class="d-flex project-image">
                                            <img src="images/customers/11.jpg" alt="">
                                            <div>
                                                <small class="d-block fs-16 font-w400">Lawyer in charge</small>
                                                <span class="fs-18 font-w500">James Jr.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-right">
                                        <div class="d-flex project-image">
                                            <img src="images/customers/22.jpg" alt="">
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
                                            <a href="javascript:void(0);"
                                               class=" btn bg-progress fs-18 font-w600 text-nowrap text-bg-progress">ON
                                                PROGRESS</a>
                                            <div class="dropdown ms-4  mt-auto mb-auto">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                              stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                        <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                              stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                        <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                              stroke="#737B8B" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card clickable-card" onclick="redirectToCaseList()">
                                    <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                        <div>
                                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">Completed
                                                Cases</h4>
                                            <div class="d-flex align-items-center">
                                                <h2 class="fs-32 font-w700 mb-0"> <?php echo $CountAllCase_com; ?> </h2>
                                                <span class="d-block ms-4">
                                                        <svg width="21" height="11" viewbox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.808780.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.8506 9.9006 20.4095 11 19.5078 11H1.49217Z" fill="#09BD3C"></path>
                                                        </svg>
                                                        <small class="d-block fs-16 font-w400 text-success">+0,5%</small>
                                                    </span>
                                            </div>
                                        </div>
                                        <div id="columnChart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card clickable-card" onclick="redirectToClientList()">
                                    <div class="card-body d-flex px-4 justify-content-between">
                                        <div>
                                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Cases</h4>
                                            <div class="">
                                                <h2 class="fs-32 font-w700"><?php echo $clientsCount; ?></h2>
                                                <span class="d-block fs-16 font-w400">
                                                                <small class="text-danger">5 ~ </small> total cases all time</span>
                                            </div>
                                        </div>
                                        <div id="NewCustomers"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body px-4 pb-0">
                                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Next Appointment</h4>
                                        <div class="d-flex align-items-center mb-3"> <!-- Added mb-3 class here -->
                                            <div class="progress default-progress flex-grow-1">
                                                <div id="progress-bar" class="progress-bar bg-gradient1 progress-animated" role="progressbar">
                                                    <span class="sr-only">0% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="mb-2">Sep 8th, 2023</span>
                                        <p class="fs-14 text-muted mb-0">Don't forget to prepare for the meeting.</p>
                                    </div>
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

                            <div class="col-xl-3 col-sm-6">
                                <div class="card clickable-card" onclick="redirectToLawyerList()">
                                    <div class="card-body d-flex px-4 justify-content-between">
                                        <div>
                                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">New Case</h4>
                                            <div class="">
                                                <div class="mb-4">
                                                    <button  type="button" class="btn btn-outline-primary">Submit New Case</button>
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


    (function ($) {
        /* "use strict" */

        var dlabChartlist = function () {

            var screenWidth = $(window).width();
            let draw = Chart.controllers.line.__super__.draw; //draw shadow
            var donutChart1 = function () {
                $("span.donut1").peity("donut", {
                    width: "70",
                    height: "70"
                });
            }
            var chartBar = function () {

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
                    colors: ['#FFA26D', '#FF5ED2'],
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
                            offsetX: -16,
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
                                return val + " projects" //database eken data ganna

                            }
                        }
                    },
                };

                var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
                chartBar1.render();
            }
            var chartBar1 = function () {

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
                    colors: ['#FFA26D', '#FF5ED2'],
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
                            offsetX: -16,
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

            var revenueMap = function () {
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
                    colors: ['#886CC0'],
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
                        curve: 'smooth',
                        colors: ['var(--primary)'],
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
                        show: true,
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
                        colors: '#FAC7B6'
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
            var columnChart = function () {
                var options = {
                    series: [{
                        name: 'Aplication Sent',
                        data: [40, 55, 15, 55]
                    }, {
                        name: 'Appllication Answered',
                        data: [40, 55, 35, 55]
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
                    colors: ['#ECECEC', '#886CC0', '#886CC0'],
                    xaxis: {
                        show: false,
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
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
                        show: false
                    },
                    fill: {
                        opacity: 1
                    }
                };

                var chart = new ApexCharts(document.querySelector("#columnChart"), options);
                chart.render();
            }

            var NewCustomers = function () {
                var options = {
                    series: [
                        {
                            name: 'Net Profit',
                            data: [100, 300, 100, 400, 200, 400],
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

                    colors: ['var(--primary)'],
                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    stroke: {
                        show: true,
                        width: 6,
                        curve: 'smooth',
                        colors: ['var(--primary)'],
                    },

                    grid: {
                        show: false,
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
                        colors: '#FB3E7A'
                    },
                    tooltip: {
                        enabled: false,
                        style: {
                            fontSize: '12px',
                        },
                        y: {
                            formatter: function (val) {
                                return "$" + val + " thousands"
                            }
                        }
                    }
                };

                var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers"), options);
                chartBar1.render();

            }
            var NewCustomers1 = function () {
                var options = {
                    series: [
                        {
                            name: 'Net Profit',
                            data: [100, 300, 200, 400, 100, 400],
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

                    colors: ['#0E8A74'],
                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    stroke: {
                        show: true,
                        width: 6,
                        curve: 'smooth',
                        colors: ['var(--primary)'],
                    },

                    grid: {
                        show: false,
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
                        colors: '#FB3E7A'
                    },
                    tooltip: {
                        enabled: false,
                        style: {
                            fontSize: '12px',
                        },
                        y: {
                            formatter: function (val) {
                                return "$" + val + " thousands"
                            }
                        }
                    }
                };

                var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers1"), options);
                chartBar1.render();

            }
            var ProG_val = <?php echo json_encode($format_progress); ?>;
            var redial = function () {
                var options = {
                    //bigcircle

                    series: [ProG_val],
                    chart: {
                        type: 'radialBar',
                        offsetY: 0,
                        height: 350,
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
                                    color: '#886CC0',
                                    fontWeight: 700,
                                }
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 1600,
                        options: {
                            chart: {
                                height: 250
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
                        colors: '#FF63E6',
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
                init: function () {
                },


                load: function () {
                    donutChart1();
                    chartBar();
                    chartBar1();
                    revenueMap();
                    columnChart();
                    NewCustomers();
                    NewCustomers1();
                    redial();

                },

                resize: function () {
                }
            }

        }();
        jQuery(window).on('load', function () {
            setTimeout(function () {
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

