<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compliance Frameworks Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="position: absolute; top: 10px; right: 10px;">  <a href="recommendation.php">View Recommendations</a>
  </div>
    <?php
    // Sample data for demonstration purposes
    $frameworks = array("PCI DSS", "HIPAA", "ISO 27001", "NIST","COBIT 5","SOC","GDPR");
    
    // Sample compliance scores (replace with actual scores)
    $complianceScores = array(
        "PCI DSS" => 85,
        "HIPAA" => 56,
        "COBIT 5" => 72,
        "SOC" => 32,
        "ISO 27001" => 90,
        "NIST" => 18,
        "GDPR" => 45
    );

    // Retrieve submitted responses from session
    session_start();
    $responses = isset($_SESSION['responses']) ? $_SESSION['responses'] : array();

    // Calculate compliance scores based on submitted responses (replace with actual calculation logic)
    // This is just a sample calculation based on the number of responses
    $complianceScoresFromResponses = array();
    foreach ($frameworks as $framework) {
        $numResponses = isset($responses[$framework]) ? count($responses[$framework]) : 0;
        // Assign a compliance score based on the number of responses
        // You should replace this with your actual calculation logic
        $complianceScoresFromResponses[$framework] = $numResponses * 10;
    }
    ?>

    <h2>Compliance Frameworks Report</h2>
    <canvas id="complianceChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('complianceChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($frameworks); ?>,
                datasets: [{
                    label: 'Compliance Score (From Submitted Responses)',
                    data: <?php echo json_encode(array_values($complianceScoresFromResponses)); ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                        // Add more colors as needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
