<?php

// Define frameworks and their questionnaires (replace with your actual data)
$frameworks = array(
  "HIPAA" => array(
    "questions" => array(
      1 => array(
        "text" => "Do you have documented policies and procedures in place to ensure the confidentiality, integrity, and availability of electronic protected health information (ePHI)?",
        "options" => array(1 => "Strongly Disagree", 2 => "Disagree", 3 => "Neutral", 4 => "Agree", 5 => "Strongly Agree"),
      ),
      2 => array(
        "text" => "Is there a process for regularly conducting risk assessments to identify and mitigate potential threats to ePHI?",
        "options" => array(1 => "Strongly Disagree", 2 => "Disagree", 3 => "Neutral", 4 => "Agree", 5 => "Strongly Agree"),
      ),
      // **New Questions with 1-5 Scale for Monitoring**
      3 => array(
        "text" => "How are access controls implemented to restrict unauthorized access to ePHI (45 CFR 164.312(a)(1))?",
        "options" => array(1 => "Not implemented", 2 => "Partially implemented", 3 => "Implemented but not consistently followed", 4 => "Consistently implemented", 5 => "Consistently implemented with strong enforcement mechanisms"),
      ),
      4 => array(
        "text" => "What measures are in place to encrypt and decrypt ePHI during transmission and at rest (45 CFR 164.312(a)(2)(iv))?",
        "options" => array(1 => "No encryption measures", 2 => "Partial encryption measures", 3 => "Encryption measures implemented but not consistently followed", 4 => "Consistent encryption measures in place", 5 => "Consistent encryption measures with strong protective measures"),
      ),
      5 => array(
        "text" => "How is the workforce trained to handle and protect ePHI, and how often is this training conducted?",
        "options" => array(1 => "No training provided", 2 => "Training provided irregularly", 3 => "Annual training", 4 => "Training provided at least twice a year", 5 => "Regular training based on roles and responsibilities"),
      ),
      6 => array(
        "text" => "Is there a documented process for responding to and mitigating security incidents and breaches involving ePHI?",
        "options" => array(1 => "No documented process", 2 => "Process exists but lacks details", 3 => "Process outlines steps but may not be tested", 4 => "Process outlines steps and is tested periodically", 5 => "Well-documented process with regular testing and improvement"),
      ),
      7 => array(
        "text" => "How are business associates assessed and monitored for compliance with HIPAA regulations (45 CFR 164.308(b)(1))?",
        "options" => array(1 => "No assessment or monitoring", 2 => "Partial assessment or monitoring", 3 => "Assessment or monitoring conducted but not consistently followed", 4 => "Consistent assessment or monitoring", 5 => "Consistent assessment or monitoring with strong enforcement mechanisms"),
      ),
      8 => array(
        "text" => "How often are audits conducted to evaluate the effectiveness of security measures and compliance with HIPAA regulations?",
        "options" => array(1 => "Never", 2 => "Less than once a year", 3 => "Annually", 4 => "Semi-annually", 5 => "Quarterly or more frequently"),
      ),
      9 => array(
        "text" => "Is there a process for notifying individuals and authorities in the event of a breach of unsecured ePHI (45 CFR 164.408)?",
        "options" => array(1 => "No documented process", 2 => "Process exists but lacks details", 3 => "Process outlines steps but may not be tested", 4 => "Process outlines steps and is tested periodically", 5 => "Well-documented process with regular testing, improvement, and communication mechanisms"),
      ),
      10 => array(
        "text" => "How is the disposal of ePHI handled, and are there secure methods for destroying or permanently deleting electronic media?",
        "options" => array(1 => "No secure disposal methods", 2 => "Partial secure disposal methods", 3 => "Secure disposal methods exist but not consistently followed", 4 => "Consistent use of secure disposal methods", 5 => "Consistent use of secure disposal methods with strong protective measures"),
      ),
      11 => array(
        "text" => "Is there a designated HIPAA privacy and security officer responsible for overseeing compliance efforts?",
        "options" => array(1 => "No designated officer", 2 => "Partially designated officer", 3 => "Designated officer but not consistently followed", 4 => "Consistently designated officer", 5 => "Consistently designated officer with strong enforcement mechanisms"),
      ),
      12 => array(
        "text" => "How are physical safeguards implemented to protect against unauthorized access to facilities containing ePHI (45 CFR 164.310(a)(1))?",
        "options" => array(1 => "Not implemented", 2 => "Partially implemented", 3 => "Implemented but not consistently followed", 4 => "Consistently implemented", 5 => "Consistently implemented with strong enforcement mechanisms"),
      ),
      13 => array(
        "text" => "Is there a process for regular review and updates of security measures in response to environmental or operational changes?",
        "options" => array(1 => "No documented process", 2 => "Process exists but lacks details", 3 => "Process outlines steps but may not be tested", 4 => "Process outlines steps and is tested periodically", 5 => "Well-documented process with regular testing, improvement, and adaptation to changes"),
      ),
      // ... add more questions for other HIPAA compliance aspects
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
    <form method="post" action="assess3.php" onsubmit="return validateForm();">
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