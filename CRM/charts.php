<?php
// Establish a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "fichier";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get the historical data of number of sellers
function getHistoricalSellerData($conn) {
    $historicalData = array();

    // Select the date and count of sellers for each time interval (minute, hour, day)
    $sql = "SELECT DATE_FORMAT(date_creation, '%Y-%m-%d %H:%i') as date, COUNT(*) as count FROM vendeur GROUP BY DATE_FORMAT(date_creation, '%Y-%m-%d %H:%i')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch each row and store it in an array
        while ($row = $result->fetch_assoc()) {
            $historicalData[] = array(
                'date' => $row['date'],
                'count' => $row['count']
            );
        }
    }

    return json_encode($historicalData);
}

// Call the function to get the historical data
$historicalSellerData = getHistoricalSellerData($conn);

// Close the database connection
$conn->close();
?>

<script>
    // Parse JSON data returned by PHP script
    var historicalSellerData = <?php echo $historicalSellerData; ?>;

    // Extract dates and counts from JSON data
    var dates = historicalSellerData.map(data => data.date);
    var counts = historicalSellerData.map(data => data.count);

    // Get canvas element
    var ctx = document.getElementById('seller-chart').getContext('2d');

    // Create chart
    var sellerChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Number of Sellers Over Time',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'minute' // Change unit to minute
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Number of Sellers'
                    }
                }]
            }
        }
    });
</script>
