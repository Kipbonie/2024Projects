<?php

// Define frameworks and their questionnaires (replace with your actual data)
$frameworks = array(
  "SOC" => array(
    "questions" => array(
      1 => array(
        "text" => "Is there a documented process for classifying and managing data based on its sensitivity and criticality?",
        "options" => array(1 => "No documented process", 2 => "Basic process exists but lacks details", 3 => "Documented process with some implementation", 4 => "Well-defined process consistently followed", 5 => "Mature process with continuous improvement"),
      ),
      2 => array(
        "text" => "Are access controls in place to restrict unauthorized personnel from accessing sensitive information?",
        "options" => array(1 => "Access control measures not implemented", 2 => "Partial access control measures", 3 => "Access control measures exist but not consistently followed", 4 => "Consistently implemented access control measures", 5 => "Consistently implemented access control measures with strong enforcement mechanisms"),
      ),
      3 => array(
        "text" => "How is the organization's capability to detect and respond to security events assessed, and what tools or processes are in place for continuous monitoring?",
        "options" => array(1 => "No detection capability", 2 => "Basic detection capability but lacks details", 3 => "Detection capability with some implementation", 4 => "Well-defined detection capability consistently followed", 5 => "Mature detection capability with continuous improvement and monitoring"),
      ),
      4 => array(
        "text" => "Is there an incident response plan in place, and how frequently is it tested and updated to address new threats?",
        "options" => array(1 => "No incident response plan", 2 => "Basic plan exists but lacks details", 3 => "Plan outlines steps but may not be tested", 4 => "Plan outlines steps and is tested periodically", 5 => "Well-documented plan with regular testing, improvement, and communication mechanisms"),
      ),
      5 => array(
        "text" => "What measures are implemented to ensure the timely recovery of critical systems and data following a security incident or disruption?",
        "options" => array(1 => "No recovery measures", 2 => "Partial recovery measures", 3 => "Recovery measures exist but not consistently followed", 4 => "Consistently implemented recovery measures", 5 => "Consistently implemented recovery measures with strong protective measures"),
      ),
      6 => array(
        "text" => "How are vulnerabilities in the organization's systems and software identified and addressed (e.g., patch management)?",
        "options" => array(1 => "No vulnerability management", 2 => "Partial vulnerability management", 3 => "Vulnerability management exists but not consistently followed", 4 => "Consistently implemented vulnerability management", 5 => "Consistently implemented vulnerability management with strong enforcement mechanisms"),
      ),
      7 => array(
        "text" => "Do you conduct regular cybersecurity awareness training for employees, and does it cover emerging threats and best practices?",
        "options" => array(1 => "No training provided", 2 => "Training provided irregularly", 3 => "Annual training", 4 => "Training provided at least twice a year", 5 => "Regular training based on roles and responsibilities"),
      ),
      8 => array(
        "text" => "How is the organization's cybersecurity program evaluated, and what metrics are used to measure its effectiveness?",
        "options" => array(1 => "No cybersecurity program evaluation", 2 => "Partial program evaluation", 3 => "Program evaluation exists but not consistently followed", 4 => "Consistently implemented program evaluation", 5 => "Consistently implemented program evaluation with continuous improvement mechanisms"),
      ),
      9 => array(
        "text" => "Is there a process to regularly assess and manage risks associated with third-party service providers and their access to sensitive information?",
        "options" => array(1 => "No process in place", 2 => "Partial risk assessment for third-party providers", 3 => "Risk assessment process exists but not consistently followed", 4 => "Consistently implemented risk assessment process", 5 => "Mature risk assessment process with continuous improvement mechanisms"),
      ),
      10 => array(
        "text" => "Are there measures in place to ensure the secure configuration of hardware, software, and network components?",
        "options" => array(1 => "No secure configuration measures", 2 => "Partial secure configuration measures", 3 => "Secure configuration measures exist but not consistently followed", 4 => "Consistently implemented secure configuration measures", 5 => "Consistently implemented secure configuration measures with strong enforcement mechanisms"),
      ),
      11 => array(
        "text" => "How is the organization's capability to respond to and recover from security incidents communicated to relevant stakeholders?",
        "options" => array(1 => "No communication plan in place", 2 => "Partial communication plan exists", 3 => "Communication plan exists but not consistently followed", 4 => "Consistently implemented communication plan", 5 => "Mature communication plan with continuous improvement mechanisms"),
      ),
      12 => array(
        "text" => "Do you have a process to review and update incident response plans based on lessons learned from previous incidents?",
        "options" => array(1 => "No review process", 2 => "Partial review process exists", 3 => "Review process exists but not consistently followed", 4 => "Consistently implemented review process", 5 => "Mature review process with continuous improvement mechanisms"),
      ),
      13 => array(
        "text" => "Is there a documented process for continuous monitoring of security controls and an assessment of their effectiveness?",
        "options" => array(1 => "No documented monitoring process", 2 => "Partial monitoring process exists", 3 => "Monitoring process exists but not consistently followed", 4 => "Consistently implemented monitoring process", 5 => "Mature monitoring process with continuous improvement mechanisms"),
      ),
      14 => array(
        "text" => "How is threat intelligence collected, analyzed, and incorporated into your cybersecurity strategy?",
        "options" => array(1 => "No threat intelligence process", 2 => "Partial threat intelligence process exists", 3 => "Threat intelligence process exists but not consistently followed", 4 => "Consistently implemented threat intelligence process", 5 => "Mature threat intelligence process with continuous improvement mechanisms"),
      ),
      15 => array(
        "text" => "Do you conduct regular tabletop exercises to test the organization's incident response and recovery capabilities?",
        "options" => array(1 => "No tabletop exercises conducted", 2 => "Tabletop exercises conducted irregularly", 3 => "Annual tabletop exercises", 4 => "Tabletop exercises conducted at least twice a year", 5 => "Regular tabletop exercises based on risk and role changes"),
      ),
      // ... add more questions for other SOC Compliance areas
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
    <form method="post" action="assess2.php" onsubmit="return validateForm();">
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
