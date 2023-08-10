<div id="main-wrapper">
    <?php
    session_start();
    include '../Lawyer/Sidebar.php'; ?>

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


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <div class="col-xl-6 col-lg-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Project Status </h4>
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
        //fixed
    {
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            return 0;
        }
    }


    $Pending = getCount($conn, "SELECT COUNT(*) AS count FROM `cases` WHERE `lawyer_id`='LW13' AND `satuts`='Pending'");
    $Processing = getCount($conn, "SELECT COUNT(*) AS count FROM `cases` WHERE `lawyer_id`='LW13' AND `satuts`='Processing'");
    $Completed = getCount($conn, "SELECT COUNT(*) AS count FROM `cases` WHERE `lawyer_id`='LW13' AND `satuts`='Completed'");



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

                }
                var barChart2 = function(){
                    if(jQuery('#barChart_2').length > 0 ){
                        //gradient bar chart
                        const barChart_2 = document.getElementById("barChart_2").getContext('2d');
                        var Pending = <?php echo json_encode($Pending); ?>;
                        var Processing = <?php echo json_encode($Processing); ?>;
                        var Completed = <?php echo json_encode($Completed); ?>;





                        //generate gradient
                        const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
                        barChart_2gradientStroke.addColorStop(0, "rgb(14,71,215)");
                        barChart_2gradientStroke.addColorStop(1, "rgba(18,82,190,0.5)");
                        barChart_2.height = 10000;
                        new Chart(barChart_2, {
                            type: 'bar',
                            data: {
                                defaultFontFamily: 'Poppins',
                                labels: ["Pending", "Processing", "Completed"],
                                datasets: [
                                    {
                                        label: "Case Income ",
                                        data: [Pending, Processing,  Completed],
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

                }
                var doughnutChart = function(){


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
    //All okay