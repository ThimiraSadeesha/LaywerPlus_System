<div id="main-wrapper">
<?php include 'sidebar.php'; ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Administrator</a></li>
                <li class="breadcrumb-item"><a>Case Status</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Projects</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Project Categories</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="doughnut_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Administrator</a></li>
                <li class="breadcrumb-item"><a>Financial Status</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Income Of the Months</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Income by Case Type</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to the database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $TodayDate = date("Y-m-d"); // Today's date
    $submit_date = '2023-06-01 00:00:00';

    // Function to get the count based on the SQL query
    function getCount($conn, $query)
    {
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            return 0;
        }
    }

    // Get case counts for different case types
    $familyCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-06-01 00:00:00' AND submit_date <= '2023-07-26 23:59:59' AND C_type = 'Family'");
    $businessCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-06-01 00:00:00' AND submit_date <= '2023-07-26 23:59:59' AND C_type = 'Business'");
    $immigrationCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-06-01 00:00:00' AND submit_date <= '2023-07-26 23:59:59' AND C_type = 'Immigration'");
    $civilCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-06-01 00:00:00' AND submit_date <= '2023-07-26 23:59:59' AND C_type = 'Civil Litigation'");
    $labourCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-06-01 00:00:00' AND submit_date <= '2023-07-26 23:59:59' AND C_type = 'Labor'");

    // Close the database connection
    $conn->close();

    // Now you can use the retrieved case counts for further processing or displaying on the page.
    ?>

<script>
    (function($) {
        "use strict"
        /* function draw() {

        } */
        var dlabSparkLine = function(){
            let draw = Chart.controllers.line.__super__.draw; //draw shadow
            var screenWidth = $(window).width();
            var barChart1 = function(){
                if(jQuery('#barChart_1').length > 0 ){
                    const barChart_1 = document.getElementById("barChart_1").getContext('2d');

                    barChart_1.height = 100;

                    new Chart(barChart_1, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                            datasets: [
                                {
                                    label: "My First dataset",
                                    data: [65, 59, 80, 81, 56, 55, 40],
                                    borderColor: 'rgba(136,108,192, 1)',
                                    borderWidth: "0",
                                    backgroundColor: 'rgba(136,108,192, 1)'
                                }
                            ]
                        },
                        options: {
                            legend: false,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    // Change here
                                    barPercentage: 0.5
                                }]
                            }
                        }
                    });
                }
            }
            var barChart2 = function(){
                if(jQuery('#barChart_2').length > 0 ){
                    //gradient bar chart
                    const barChart_2 = document.getElementById("barChart_2").getContext('2d');
                    //generate gradient
                    const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
                    barChart_2gradientStroke.addColorStop(0, "rgba(136,108,192, 1)");
                    barChart_2gradientStroke.addColorStop(1, "rgba(136,108,192, 0.5)");
                    barChart_2.height = 100;
                    new Chart(barChart_2, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                            datasets: [
                                {
                                    label: "My First dataset",
                                    data: [65, 59, 80, 81, 56, 55, 40],
                                    borderColor: barChart_2gradientStroke,
                                    borderWidth: "0",
                                    backgroundColor: barChart_2gradientStroke,
                                    hoverBackgroundColor: barChart_2gradientStroke
                                }
                            ]
                        },
                        options: {
                            legend: false,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    // Change here
                                    barPercentage: 0.5
                                }]
                            }
                        }
                    });
                }
            }

            var lineChart1 = function(){
                if(jQuery('#lineChart_1').length > 0 ){
                    //basic line chart
                    const lineChart_1 = document.getElementById("lineChart_1").getContext('2d');

                    Chart.controllers.line = Chart.controllers.line.extend({
                        draw: function () {
                            draw.apply(this, arguments);
                            let nk = this.chart.chart.ctx;
                            let _stroke = nk.stroke;
                            nk.stroke = function () {
                                nk.save();
                                nk.shadowColor = 'rgba(255, 0, 0, .2)';
                                nk.shadowBlur = 10;
                                nk.shadowOffsetX = 0;
                                nk.shadowOffsetY = 10;
                                _stroke.apply(this, arguments)
                                nk.restore();
                            }
                        }
                    });
                    lineChart_1.height = 100;

                    new Chart(lineChart_1, {
                        type: 'line',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
                            datasets: [
                                {
                                    label: "My First dataset",
                                    data: [25, 20, 60, 41, 66, 45, 80],
                                    borderColor: 'rgba(136,108,192, 1)',
                                    borderWidth: "2",
                                    backgroundColor: 'transparent',
                                    pointBackgroundColor: 'rgba(136,108,192, 1)'
                                }
                            ]
                        },
                        options: {
                            legend: false,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        max: 100,
                                        min: 0,
                                        stepSize: 20,
                                        padding: 10
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5
                                    }
                                }]
                            }
                        }
                    });
                }
            }
            var doughnutChart = function(){

            	if(jQuery('#doughnut_chart').length > 0 ){
            		//doughut chart
            		const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
            		// doughnut_chart.height = 100;
                    var Fam_Value = <?php echo json_encode($familyCases); ?>;
                    var Busi_Value = <?php echo json_encode($businessCases); ?>;
                    var Immi_Value = <?php echo json_encode($immigrationCases); ?>;
                    var Civil_Value = <?php echo json_encode($civilCases); ?>;
                    var Labour_Value = <?php echo json_encode($labourCases); ?>;
            		new Chart(doughnut_chart, {


            			type: 'doughnut',
            			data: {
            				weight: 5,
            				defaultFontFamily: 'Poppins',
                            labels: ["Family",
                                "Business",
                                "Immigration",
                                "Civil",
                                "Labour"],
            				datasets: [{

            					data: [Fam_Value,Busi_Value,Immi_Value,Civil_Value,Labour_Value],
            					borderWidth: 3,
            					borderColor: "rgb(255,255,255)",
            					backgroundColor: [
            						"rgba(136,108,192, 1)",
            						"rgba(98, 126, 234, 1)",
            						"rgba(238, 60, 60, 1)",
            						"rgb(248,245,5)",
            						"rgb(72,255,1)"


            					],
            					hoverBackgroundColor: [
            						"rgba(136,108,192, 0.9)",
            						"rgba(98, 126, 234, .9)",
            						"rgba(238, 60, 60, .9)"

            					]

            				}],

            			},
            			options: {
            				weight: 1,
            				 cutoutPercentage: 70,
            				responsive: true,
            				maintainAspectRatio: false
            			}
            		});
            	}
            }

            /* Function ============ */
            return {
                init:function(){
                },

                load:function(){
                    barChart1();
                    barChart2();
                    lineChart1();
                    doughnutChart();
                },
            }
        }();
        jQuery(document).ready(function(){
        });
        jQuery(window).on('load',function(){
            dlabSparkLine.load();
        });
        jQuery(window).on('resize',function(){
            //dlabSparkLine.resize();
            setTimeout(function(){ dlabSparkLine.resize(); }, 1000);
        });
    })(jQuery);
</script>
