<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number of Sellers Over Time</title>
    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* CSS for chart container */
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #f9f9f9;
        }

        /* CSS for chart canvas */
        #seller-chart {
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="chart-container">
        <canvas id="seller-chart"></canvas>
    </div>

    <?php include 'charts.php'; ?>
</body>
</html>
