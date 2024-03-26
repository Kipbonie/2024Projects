<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a function to validate and sanitize input
    function sanitizeInput($data) {
        return htmlspecialchars(trim($data));
    }

    // Initialize an array to store responses
    $responses = array();

    // Iterate through posted data
    foreach ($_POST as $key => $value) {
        // Extract question ID from the input name
        if (preg_match('/^question_(\d+)$/', $key, $matches)) {
            $questionId = $matches[1];

            // Sanitize and store the response
            $responses[$questionId] = sanitizeInput($value);
        }
    }

    // Calculate and display totals for each value
    $totals = array_count_values($responses);

    // Calculate the overall total by multiplying all the values
    $overallTotal = array_product($totals);

    // Start a session if not already started
    session_start();

    // Store responses and totals in session variables
    $_SESSION['responses'] = $responses;
    $_SESSION['totals'] = $totals;
    $_SESSION['overallTotal'] = $overallTotal;
    
} else {
    // Redirect to the questionnaire page if accessed directly without form submission
    header("Location: select.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Submitted Responses</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      /*background-color: #f8f9fa;*/
      background-image: url('p.jpg');
      background: linear-gradient(to bottom right, #3498db, #ffffff);
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-top: 30px;
      color: #007bff;
    }
    ul {
      list-style-type: none;
      padding: 0;
    }
    li {
      margin-bottom: 10px;
    }
    .total {
      font-weight: bold;
    }
    .overall-total {
      margin-top: 20px;
      font-weight: bold;
      font-size: 18px;
    }
    .report-link {
      display: block;
      margin-top: 20px;
      text-align: center;
      text-decoration: none;
      color: #007bff;
    }
    .report-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Submitted Responses</h2>
    <ul>
      <?php foreach ($responses as $questionId => $response): ?>
        <li>Question <?= $questionId ?>: <?= $response ?></li>
      <?php endforeach; ?>
    </ul>

    <h2>Totals</h2>
    <?php foreach ($totals as $value => $count): ?>
      <p class="total">Total <?= $value ?>: <?= $count ?></p>
    <?php endforeach; ?>

    <div class="overall-total">
      <p>Overall Total: <?= $overallTotal ?></p>
    </div>

    <!--<a href="select.php" class="report-link">Next</a>-->
    <a href="COBIT.php?framework=COBIT 5">Continue</a>
  </div>
</body>
</html>