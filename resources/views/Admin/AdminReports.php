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

    // Get case counts for different case types
    $familyCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-01-01 00:00:00' AND submit_date <= '2023-12-31 23:59:59' AND C_type = 'Family'");
    $businessCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-01-01 00:00:00' AND submit_date <= '2023-12-31 23:59:59' AND C_type = 'Business'");
    $immigrationCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-01-01 00:00:00' AND submit_date <= '2023-12-31 23:59:59' AND C_type = 'Immigration '");
    $civilCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-01-01 00:00:00' AND submit_date <= '2023-12-31 23:59:59' AND C_type = 'Civil Litigation'");
    $labourCases = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-01-01 00:00:00' AND submit_date <= '2023-12-31 23:59:59' AND C_type = 'Labor'");
    $criminalCase = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE submit_date >= '2023-01-01 00:00:00' AND submit_date <= '2023-12-31 23:59:59' AND C_type = 'criminal'");

    //get count of cases for the months
    $jan = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-01-01' AND '2023-01-31'");
    $feb = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-02-01' AND '2023-02-29'");
    $march = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-03-01' AND '2023-03-31'");
    $april = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-04-01' AND '2023-04-30'");
    $may = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-05-01' AND '2023-05-31'");
    $june = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-06-01' AND '2023-06-31'");
    $july = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-07-01' AND '2023-07-31'");
    $aug = getCount($conn, "SELECT COUNT(*) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-08-01' AND '2023-08-31'");

    //get profit of cases for the case types
    $criminal_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `C_type` = 'criminal'");
    $Business_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `C_type` = 'Business'");
    $immigration_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `C_type` = 'Immigration '");
    $Civil_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `C_type` = 'Civil Litigation'");
    $labour_Prof = getCount($conn, "SELECT SUM(`Amount`)  AS count FROM `case` WHERE `C_type` = 'Labor'");
    $family_Prof = getCount($conn, "SELECT SUM(`Amount`)  AS count FROM `case` WHERE `C_type` = 'Family'");

    //5% present of the profit
    $crimal5 = $criminal_Prof * 0.05;
    $Business5 = $Business_Prof * 0.05;
    $immigration5 = $immigration_Prof * 0.05;
    $Civil5 = $Civil_Prof * 0.05;
    $labour5 = $labour_Prof * 0.05;
    $family5 = $family_Prof * 0.05;

    //get profit of cases for the months
    $jan_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-01-01' AND '2023-01-31'");
    $feb_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-02-01' AND '2023-02-29'");
    $march_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-03-01' AND '2023-03-31'");
    $april_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-04-01' AND '2023-04-30'");
    $may_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-05-01' AND '2023-05-31'");
    $june_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-06-01' AND '2023-06-31'");
    $july_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-07-01' AND '2023-07-31'");
    $aug_Prof = getCount($conn, "SELECT SUM(`Amount`) AS count FROM `case` WHERE `submit_date` BETWEEN '2023-08-01' AND '2023-08-31'");

    //get profit of cases for the months
    $jan5= $jan_Prof * 0.05;
    $feb5= $feb_Prof * 0.05;
    $march5= $march_Prof * 0.05;
    $april5= $april_Prof * 0.05;
    $may5= $may_Prof * 0.05;
    $june5= $june_Prof * 0.05;
    $july5= $july_Prof * 0.05;
    $aug5= $aug_Prof * 0.05;




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
                        var jan = <?php echo json_encode($jan); ?>;
                        var feb = <?php echo json_encode($feb); ?>;
                        var march = <?php echo json_encode($march); ?>;
                        var april = <?php echo json_encode($april); ?>;
                        var may = <?php echo json_encode($may); ?>;
                        var june = <?php echo json_encode($june); ?>;
                        var july = <?php echo json_encode($july); ?>;
                        var aug = <?php echo json_encode($aug); ?>;

                        barChart_1.height = 100;

                        new Chart(barChart_1, {


                            type: 'bar',
                            data: {
                                defaultFontFamily: 'Poppins',
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug"],
                                datasets: [
                                    {
                                        label: ["Number of Cases"],
                                        data: [jan, feb, march, april, may, june, july,aug],
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
                        var crim = <?php echo json_encode($crimal5); ?>;
                        var bus = <?php echo json_encode($Business5); ?>;
                        var imi = <?php echo json_encode($immigration5); ?>;
                        var civl = <?php echo json_encode($Civil5); ?>;
                        var labour = <?php echo json_encode($labour5); ?>;
                        var family = <?php echo json_encode($family5); ?>;




                        //generate gradient
                        const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
                        barChart_2gradientStroke.addColorStop(0, "rgb(108,132,192)");
                        barChart_2gradientStroke.addColorStop(1, "rgba(108,142,192,0.5)");
                        barChart_2.height = 10000;
                        new Chart(barChart_2, {
                            type: 'bar',
                            data: {
                                defaultFontFamily: 'Poppins',
                                labels: ["Criminal", "Business", "Civil", "Labour", "Immigration","Family"],
                                datasets: [
                                    {
                                        label: "Case Income ",
                                        data: [crim, bus,  civl, labour,imi,family],
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
                        var jan5 = <?php echo json_encode($jan5); ?>;
                        var feb5 = <?php echo json_encode($feb5); ?>;
                        var march5 = <?php echo json_encode($march5); ?>;
                        var april5 = <?php echo json_encode($april5); ?>;
                        var may5 = <?php echo json_encode($may5); ?>;
                        var june5 = <?php echo json_encode($june5); ?>;
                        var july5 = <?php echo json_encode($july5); ?>;
                        var aug5 = <?php echo json_encode($aug5); ?>;



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
                        lineChart_1.height = 1000;

                        new Chart(lineChart_1, {
                            type: 'line',
                            data: {
                                defaultFontFamily: 'Poppins',
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug"],
                                datasets: [
                                    {
                                        label: "Monthly Case Income",
                                        data: [jan5, feb5, march5, april5, may5, june5, july5,aug5],
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
                                            max: 10000,
                                            min: 0,
                                            stepSize: 1000,
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
                        var Fam_Value = <?php echo json_encode($familyCases); ?>;
                        var Busi_Value = <?php echo json_encode($businessCases); ?>;
                        var Immi_Value = <?php echo json_encode($immigrationCases); ?>;
                        var Civil_Value = <?php echo json_encode($civilCases); ?>;
                        var Labour_Value = <?php echo json_encode($labourCases); ?>;
                        var criminal_Value = <?php echo json_encode($criminalCase); ?>;

                        new Chart(doughnut_chart, {


                            type: 'doughnut',
                            data: {
                                weight: 5,
                                defaultFontFamily: 'Poppins',
                                labels: ["Family",
                                    "Business",
                                    "Immigration",
                                    "Civil",
                                    "Labour","Criminal"],
                                datasets: [{

                                    data: [Fam_Value,Busi_Value,Immi_Value,Civil_Value,Labour_Value,criminal_Value],
                                    borderWidth: 3,
                                    borderColor: "rgb(255,255,255)",
                                    backgroundColor: [
                                        "rgb(255, 198, 110)",
                                        "rgba(98, 126, 234, 1)",
                                        "rgb(115,197,104)",
                                        "rgb(136, 108, 192)",
                                        "rgb(255, 94, 210)",
                                        "rgb(211,76,76)"


                                    ],
                                    hoverBackgroundColor: [

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
//All okay