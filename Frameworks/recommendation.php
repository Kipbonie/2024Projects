<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compliance Framework Recommendation</title>
</head>
<body>
<div style="position: absolute; top: 10px; right: 10px;">  <a href='/kip/Login/login.php'>Log Out</a>
  </div>
  <h1>Compliance Framework Recommendation</h1>

  <?php
  // Assuming you have a function to get the highest scoring framework
  function getHighestScoringFramework($scores) {
    $maxScore = max(array_values($scores));
    $highestFrameworks = array_keys($scores, $maxScore);
    return implode(', ', $highestFrameworks);
  }

  // Replace with actual data retrieval logic
  $complianceScores = array(
    "PCI DSS" => 85,
    "HIPAA" => 56,
    "COBIT 5" => 72,
    "SOC" => 49,
    "ISO 27001" => 90,
    "NIST" => 78,
  );

  $highestScoringFramework = getHighestScoringFramework($complianceScores);
  ?>

  <p>Based on the report, the framework(s) with the highest score(s) is/are: <b><?php echo $highestScoringFramework; ?></b>.</p>

  <p>However, the most suitable framework for your organization depends on various factors beyond just the raw score. These factors may include:</p>

  <ul>
    <li>Industry regulations</li>
    <li>Data sensitivity</li>
    <li>Organizational size and complexity</li>
    <li>Budget and resource constraints</li>
  </ul>

  <p>We recommend that you carefully consider these factors in conjunction with the report findings to make an informed decision about the most suitable compliance framework for your organization. Consulting with a security professional can also provide valuable guidance in this process.</p>
</body>
</html>
