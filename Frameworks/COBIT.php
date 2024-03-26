<?php

// Define frameworks and their questionnaires (replace with your actual data)
$frameworks = array(
  "COBIT 5" => array(
    "questions" => array(
      1 => array(
        "text" => "Is there a documented IT governance framework aligned with business goals and objectives?",
        "options" => array(1 => "Strongly Disagree", 2 => "Disagree", 3 => "Neutral", 4 => "Agree", 5 => "Strongly Agree"),
      ),
      2 => array(
        "text" => "Do you perform regular risk assessments to identify and evaluate IT-related risks?",
        "options" => array(1 => "Strongly Disagree", 2 => "Disagree", 3 => "Neutral", 4 => "Agree", 5 => "Strongly Agree"),
      ),
      // **New Questions with 1-5 Scale for Monitoring**
      3 => array(
        "text" => "Is there a documented process for defining and maintaining the IT strategy in alignment with business strategy (EDM01)?",
        "options" => array(1 => "No documented process", 2 => "Undocumented process exists but not consistently followed", 3 => "Documented process exists and followed to some extent", 4 => "Documented process exists and consistently followed", 5 => "Documented process with strong enforcement mechanisms"),
      ),
      4 => array(
        "text" => "How frequently are IT-related risks assessed and updated based on changes in the business environment (APO12.02)?",
        "options" => array(1 => "Never", 2 => "Less than once a year", 3 => "Annually", 4 => "Semi-annually", 5 => "More frequently based on business changes"),
      ),
      5 => array(
        "text" => "What is the maturity level of your IT-related incident response and management process (DSS05.03)?",
        "options" => array(1 => "No documented process", 2 => "Basic process exists but lacks details", 3 => "Process outlines steps but may not be tested", 4 => "Process outlines steps and is tested periodically", 5 => "Mature process with well-defined roles and procedures"),
      ),
      6 => array(
        "text" => "How frequently do employees receive IT governance and compliance training (APO07.02)?",
        "options" => array(1 => "Never", 2 => "Ad-hoc training sessions", 3 => "Annual training", 4 => "Training provided at least twice a year", 5 => "Regular training based on roles and responsibilities"),
      ),
      7 => array(
        "text" => "Is there a documented process for defining and monitoring IT-related goals and metrics aligned with business objectives (EDM03.02)?",
        "options" => array(1 => "No process", 2 => "Process exists but not consistently followed", 3 => "Process exists and followed to some extent", 4 => "Process exists and consistently followed", 5 => "Well-defined process with continuous improvement mechanisms"),
      ),
      8 => array(
        "text" => "How often is the IT strategy reviewed and updated to ensure alignment with changing business needs (EDM01.02)?",
        "options" => array(1 => "Never", 2 => "Less than once a year", 3 => "Annually", 4 => "Semi-annually", 5 => "Quarterly or more frequently based on business changes"),
      ),
      9 => array(
        "text" => "Is there a documented process for managing and resolving IT-related incidents, including reporting and communication (APO13.02)?",
        "options" => array(1 => "No documented process", 2 => "Process exists but lacks details", 3 => "Process outlines steps but may not be tested", 4 => "Process outlines steps and is tested periodically", 5 => "Well-documented process with regular testing and improvement"),
      ),
      10 => array(
        "text" => "Is there a process for regularly monitoring and evaluating the performance and effectiveness of IT governance and management processes (MEA01.01)?",
        "options" => array(1 => "No process", 2 => "Process exists but not consistently followed", 3 => "Process exists and followed to some extent", 4 => "Process exists and consistently followed", 5 => "Well-established process with continuous improvement mechanisms"),
      ),
      11 => array(
        "text" => "How are IT-related roles and responsibilities defined and communicated within the organization (APO07.01)?",
        "options" => array(1 => "Not defined", 2 => "Partially defined", 3 => "Clearly defined but not communicated", 4 => "Clearly defined and communicated to some extent", 5 => "Clearly defined and effectively communicated throughout the organization"),
      ),
      12 => array(
        "text" => "Is there a documented process for managing and resolving IT-related incidents, including communication and resolution (APO13.03)?",
        "options" => array(1 => "No documented process", 2 => "Process exists but lacks details", 3 => "Process outlines steps but may not be tested", 4 => "Process outlines steps and is tested periodically", 5 => "Well-documented process with regular testing, improvement, and communication mechanisms"),
      ),
      13 => array(
        "text" => "How do you ensure the confidentiality, integrity, and availability of IT information during its transfer within the organization or with external parties (DSS05.04)?",
        "options" => array(1 => "Not ensured", 2 => "Partially ensured", 3 => "Ensured to some extent", 4 => "Ensured in most cases", 5 => "Consistently ensured with strong protective measures"),
      ),
      // ... add more questions for other COBIT 5 control objectives
    ),
  ),
  // ... other frameworks (if applicable)
);

// Get selected framework from URL parameter
$framework = isset($_GET["framework"]) ? $_GET["framework"] : null;

// Check if framework exists
if (!array_key_exists($framework, $frameworks)) {
  die("Invalid framework selected.");
}

// Retrieve questionnaire for the selected framework
$questionnaire = $frameworks[$framework]["questions"];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Compliance Framework Questionnaire - <?= $framework ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body { 
      padding: 20px;
  background-image: url('Q.jpg');
  background-color: solid beige;

    }


    h1 {
      color: #007bff;
      text-align: center;
    }

    .question {
      margin-bottom: 20px;
    }

    .options {
      list-style-type: none;
      padding-left: 0;
    }

    .options li {
      margin-bottom: 10px;
    }

    input[type="submit"] {
      margin-top: 20px;
    }
  </style>
  <script>
    function validateForm() {
      var questions = document.querySelectorAll('input[type="radio"]:checked');
      if (questions.length !== <?= count($questionnaire) ?>) {
        alert('Please answer all questions before submitting.');
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
<div class="bg-overlay"></div>
  <div class="container">
    <h1><?= $framework ?> Compliance Questionnaire</h1>
    <form method="post" action="assess4.php" onsubmit="return validateForm();">
      <?php foreach ($questionnaire as $id => $question): ?>
        <div class="question">
          <p><?= $id . ". " . $question["text"] ?></p>
          <ul class="options">
            <?php foreach ($question["options"] as $value => $option): ?>
              <li><input type="radio" name="question_<?= $id ?>" value="<?= $value ?>"> <?= $value ?> - <?= $option ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
      <input type="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>
</body>
</html>
