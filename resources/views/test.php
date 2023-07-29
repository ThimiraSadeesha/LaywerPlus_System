<!DOCTYPE html>
<html>
<head>
    <!-- Include necessary CSS and JavaScript files for ApexCharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<!-- Your chart HTML -->
<div class="col-xl-6 redial col-sm-6">
    <div id="redial"></div>
</div>

<script>
    // Wait for the DOM to be ready
    $(document).ready(function() {
        // Assuming you have initialized the chart already
        var chartOptions = {
            // Your chart options here
            // Example: type: 'radialBar', data, etc.
        };

        // Initialize the chart
        var chart = new ApexCharts(document.querySelector("#redial"), chartOptions);
        chart.render();

        // Function to change the fill percentage of the chart
        function changeFillPercentage(percentage) {
            // Assuming your chart is a radialBar type
            chart.updateOptions({
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: percentage + "%"
                        }
                    }
                }
            });
        }

        // Call the function with your desired fill percentage (for example, 75%)
        changeFillPercentage(75);
    });
</script>
</body>
</html>
