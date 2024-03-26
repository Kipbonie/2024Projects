<?php

// Define frameworks and their questionnaires (replace with your actual data)
$frameworks = array(
  "PCI DSS" => array(
    "questions" => array(
      1 => array(
        "text" => "Is there a documented process for securing cardholder data and sensitive authentication data?",
        "options" => array(1 => "No documented process", 2 => "Basic process exists but lacks details", 3 => "Documented process with some implementation", 4 => "Well-defined process consistently followed", 5 => "Mature process with continuous improvement"),
      ),
      2 => array(
        "text" => "Are strong access control measures in place to restrict access to cardholder data based on job roles and responsibilities?",
        "options" => array(1 => "Access control measures not implemented", 2 => "Partial access control measures", 3 => "Access control measures exist but not consistently followed", 4 => "Consistently implemented access control measures", 5 => "Consistently implemented access control measures with strong enforcement mechanisms"),
      ),
      3 => array(
        "text" => "How is the organization protecting stored cardholder data, including encryption and key management?",
        "options" => array(1 => "No protection measures in place", 2 => "Basic protection measures but lacks details", 3 => "Protection measures exist but not consistently followed", 4 => "Consistently implemented protection measures", 5 => "Consistently implemented protection measures with strong encryption and key management"),
      ),
      4 => array(
        "text" => "Is there a process to encrypt transmission of cardholder data across open, public networks?",
        "options" => array(1 => "No encryption process", 2 => "Partial encryption measures", 3 => "Encryption process exists but not consistently followed", 4 => "Consistently implemented encryption process", 5 => "Consistently implemented encryption process with strong protective measures"),
      ),
      5 => array(
        "text" => "How are anti-virus programs implemented and regularly updated to protect systems and cardholder data?",
        "options" => array(1 => "No anti-virus programs", 2 => "Partial anti-virus measures", 3 => "Anti-virus programs exist but not consistently followed", 4 => "Consistently implemented anti-virus programs", 5 => "Consistently implemented anti-virus programs with strong enforcement mechanisms"),
      ),
      6 => array(
        "text" => "Is there a process to develop and maintain secure systems and applications, including regular security testing?",
        "options" => array(1 => "No process for secure systems and applications", 2 => "Partial process with some implementation", 3 => "Process exists but not consistently followed", 4 => "Consistently implemented process for secure systems and applications", 5 => "Mature process with continuous improvement and regular security testing"),
      ),
      7 => array(
        "text" => "Are access restrictions in place to limit physical access to cardholder data and systems?",
        "options" => array(1 => "No physical access restrictions", 2 => "Partial access restrictions", 3 => "Access restrictions exist but not consistently followed", 4 => "Consistently implemented access restrictions", 5 => "Consistently implemented access restrictions with strong enforcement mechanisms"),
      ),
      8 => array(
        "text" => "How is the organization monitoring and regularly testing security systems and processes?",
        "options" => array(1 => "No monitoring or testing", 2 => "Partial monitoring and testing practices", 3 => "Monitoring and testing exist but not consistently followed", 4 => "Consistently implemented monitoring and testing", 5 => "Mature monitoring and testing with continuous improvement mechanisms"),
      ),
      9 => array(
        "text" => "Is there an information security policy in place, and how is it communicated to all relevant personnel?",
        "options" => array(1 => "No security policy", 2 => "Partial security policy exists", 3 => "Security policy exists but not consistently followed", 4 => "Consistently implemented security policy", 5 => "Mature security policy with continuous improvement mechanisms"),
      ),
      10 => array(
        "text" => "How is the organization protecting against unauthorized access to cardholder data, including physical and logical measures?",
        "options" => array(1 => "No protection measures", 2 => "Partial protection measures", 3 => "Protection measures exist but not consistently followed", 4 => "Consistently implemented protection measures", 5 => "Consistently implemented protection measures with strong enforcement mechanisms"),
      ),
      11 => array(
        "text" => "Do you conduct regular security awareness training for employees, and does it cover PCI DSS requirements?",
        "options" => array(1 => "No training provided", 2 => "Training provided irregularly", 3 => "Annual training", 4 => "Training provided at least twice a year", 5 => "Regular training based on roles and responsibilities"),
      ),
      12 => array(
        "text" => "How is the organization's compliance with PCI DSS assessed, and what metrics are used to measure its effectiveness?",
        "options" => array(1 => "No PCI DSS compliance assessment", 2 => "Partial assessment practices", 3 => "Assessment exists but not consistently followed", 4 => "Consistently implemented compliance assessment", 5 => "Mature compliance assessment with continuous improvement mechanisms"),
      ),
      13 => array(
        "text" => "Is there a process to regularly assess and manage risks associated with third-party service providers and their access to cardholder data?",
        "options" => array(1 => "No process in place", 2 => "Partial risk assessment for third-party providers", 3 => "Risk assessment process exists but not consistently followed", 4 => "Consistently implemented risk assessment process", 5 => "Mature risk assessment process with continuous improvement mechanisms"),
      ),
      14 => array(
        "text" => "How is the organization's capability to respond to and recover from security incidents communicated to relevant stakeholders?",
        "options" => array(1 => "No communication plan in place", 2 => "Partial communication plan exists", 3 => "Communication plan exists but not consistently followed", 4 => "Consistently implemented communication plan", 5 => "Mature communication plan with continuous improvement mechanisms"),
      ),
      15 => array(
        "text" => "Do you have a process to review and update incident response plans based on lessons learned from previous incidents?",
        "options" => array(1 => "No review process", 2 => "Partial review process exists", 3 => "Review process exists but not consistently followed", 4 => "Consistently implemented review process", 5 => "Mature review process with continuous improvement mechanisms"),
      ),
      // ... add more questions for other PCI DSS Compliance areas
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
    <form method="post" action="assess5.php" onsubmit="return validateForm();">
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
