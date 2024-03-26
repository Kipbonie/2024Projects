<?php

$frameworks = array(
  "ISO 27001" => array(
    "name" => "Information Security Management",
    "description" => "Provides a framework for managing information security risks",
    "questions" => array(
      "q1" => "Do you have a documented information security policy?",
      "q2" => "Have you identified and classified your information assets?",
      // ... Add more questions
    ),
    "page" => "iso.php"
  ),
  "SOC 2" => array(
    "name" => "Security and Control Framework for Service Providers",
    "description" => "Provides a framework for managing security risks for service providers",
    "questions" => array(
      "q1" => "Do you have a risk management process?",
      "q2" => "Have you implemented controls to mitigate security risks?",
      "q2" => "Have you implemented controls to mitigate security risks?",
      // ... Add more questions
    ),
    "page" => "soc.php" // Optional, if you have a dedicated page for SOC 2
  ),
  // ... other frameworks

  // ... Add other frameworks
);

$selectedFramework = "";
$assessmentResults = array();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["framework"])) {
  $selectedFramework = $_GET["framework"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["framework"])) {
  $selectedFramework = $_POST["framework"];
  $framework = $frameworks[$selectedFramework];
  foreach ($framework["questions"] as $question => $text) {
    $answer = $_POST[$question];
    $assessmentResults[$question] = array(
      "text" => $text,
      "answer" => $answer,
    );
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compliance Framework Dashboard</title>
  <style>
    /* CSS styles for the dashboard layout */
    /* Overall styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

/* Header */
h1 {
  text-align: center;
  font-size: 2em;
  margin-bottom: 20px;
}

/* Framework list */
.frameworks {
  list-style: none;
  padding: 0;
  margin: 0;
}

.frameworks li {
  margin-bottom: 10px;
}

.frameworks a {
  text-decoration: none;
  color: #000;
}

/* Selected framework section */
.selected-framework {
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 20px;
}

.selected-framework h2 {
  margin-bottom: 5px;
}

/* Assessment form (Optional) */
form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  background: url('t.jpg');
}

label {
  display: flex;
  align-items: center;
  gap: 5px;
}

input[type="radio"] {
  margin-right: 10px;
}

/* Customize these styles further based on your preferences */

  </style>
</head>
<body>
  <h1>Compliance Framework Dashboard</h1>
  <ul class="frameworks">
    <?php foreach ($frameworks as $framework => $data): ?>
      <li>
        <a href="?framework=<?php echo $framework; ?>">
          <?php echo $data["name"]; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php if ($selectedFramework): ?>
    <h2>Selected Framework: <?php echo $frameworks[$selectedFramework]["name"]; ?></h2>
    <?php if (empty($assessmentResults)): ?>
      <form action="" method="post">
        <input type="hidden" name="framework" value="<?php echo $selectedFramework; ?>">
        <?php foreach ($frameworks[$selectedFramework]["questions"] as $question => $text): ?>
          <p><?php echo $text; ?></p>
          <input type="radio" name="<?php echo $question; ?>" value="yes"> Yes
          <input type="radio" name="<?php echo $question; ?>" value="no"> No
          <br>
        <?php endforeach; ?>
        <br>
        <input type="submit" value="Submit Answers">
      </form>
    <?php else: ?>
      <h2>Assessment Results:</h2>
      <ul>
        <?php foreach ($assessmentResults as $question => $result): ?>
          <li>
            <?php echo $result["text"]; ?> - Answer: <?php echo $result["answer"]; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>
