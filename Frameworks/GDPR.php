<?php

// Define frameworks and their questionnaires (replace with your actual data)
$frameworks = array(
  "GDPR" => array(
    "questions" => array(
      1 => array(
        "text" => "Is there a documented process for identifying and documenting personal data processing activities?",
        "options" => array(1 => "No documented process", 2 => "Basic process exists but lacks details", 3 => "Documented process with some implementation", 4 => "Well-defined process consistently followed", 5 => "Mature process with continuous improvement"),
      ),
      2 => array(
        "text" => "Are data protection impact assessments (DPIAs) conducted for high-risk processing activities?",
        "options" => array(1 => "DPIAs not conducted", 2 => "DPIAs conducted irregularly", 3 => "DPIAs conducted for some activities", 4 => "DPIAs conducted for high-risk activities", 5 => "DPIAs conducted systematically for all high-risk activities"),
      ),
      3 => array(
        "text" => "Are data subjects informed about the processing of their personal data, and is their consent obtained when required?",
        "options" => array(1 => "No information provided to data subjects", 2 => "Information provided irregularly", 3 => "Information provided with some consent obtained", 4 => "Consistent information and consent practices", 5 => "Transparent information and explicit consent obtained for all processing activities"),
      ),
      4 => array(
        "text" => "Is there a process in place for managing data subject access requests (DSARs) and responding to them within the required timeframe?",
        "options" => array(1 => "No DSAR process", 2 => "Basic DSAR process exists but lacks details", 3 => "DSAR process with some implementation", 4 => "Well-defined DSAR process consistently followed", 5 => "Mature DSAR process with continuous improvement and adherence to timelines"),
      ),
      5 => array(
        "text" => "How is data protection built into the development of new systems and processes (privacy by design and by default)?",
        "options" => array(1 => "No privacy by design and by default practices", 2 => "Partial privacy integration in some projects", 3 => "Privacy integrated in some projects", 4 => "Privacy integrated in most projects", 5 => "Privacy integrated systematically in all projects"),
      ),
      6 => array(
        "text" => "Is there a process for regularly testing and assessing the effectiveness of security measures to protect personal data?",
        "options" => array(1 => "No security testing process", 2 => "Security testing conducted irregularly", 3 => "Security testing with some implementation", 4 => "Well-defined security testing consistently followed", 5 => "Mature security testing with continuous improvement and proactive measures"),
      ),
      7 => array(
        "text" => "Are data breaches promptly detected, reported, and investigated in compliance with GDPR requirements?",
        "options" => array(1 => "No data breach detection and reporting process", 2 => "Partial detection and reporting practices", 3 => "Detection and reporting with some implementation", 4 => "Well-defined detection and reporting consistently followed", 5 => "Mature detection and reporting with continuous improvement and adherence to timelines"),
      ),
      8 => array(
        "text" => "How are third-party data processors assessed and managed to ensure GDPR compliance?",
        "options" => array(1 => "No third-party assessment process", 2 => "Partial assessment practices", 3 => "Assessment with some implementation", 4 => "Well-defined assessment process consistently followed", 5 => "Mature assessment process with continuous improvement and monitoring"),
      ),
      9 => array(
        "text" => "Is there a process for regularly training and raising awareness among employees regarding GDPR requirements and responsibilities?",
        "options" => array(1 => "No GDPR training provided", 2 => "Training provided irregularly", 3 => "Annual GDPR training", 4 => "Training provided at least twice a year", 5 => "Regular GDPR training based on roles and responsibilities"),
      ),
      10 => array(
        "text" => "How is compliance with GDPR monitored, and what mechanisms are in place for continuous improvement?",
        "options" => array(1 => "No GDPR monitoring process", 2 => "Partial monitoring practices", 3 => "Monitoring with some implementation", 4 => "Well-defined monitoring consistently followed", 5 => "Mature monitoring with continuous improvement and proactive measures"),
      ),
      11 => array(
        "text" => "Is there a process to conduct regular reviews and audits of GDPR compliance?",
        "options" => array(1 => "No compliance reviews or audits", 2 => "Partial review and audit practices", 3 => "Reviews and audits with some implementation", 4 => "Well-defined reviews and audits consistently followed", 5 => "Mature review and audit process with continuous improvement and proactive measures"),
      ),
      12 => array(
        "text" => "How is documentation maintained to demonstrate GDPR compliance, including records of processing activities?",
        "options" => array(1 => "No documentation of GDPR compliance", 2 => "Partial documentation practices", 3 => "Documentation with some implementation", 4 => "Well-defined documentation consistently followed", 5 => "Mature documentation practices with continuous improvement and proactive measures"),
      ),
      13 => array(
        "text" => "Is there a designated Data Protection Officer (DPO), and how is the DPO involved in ensuring GDPR compliance?",
        "options" => array(1 => "No DPO appointed", 2 => "DPO appointed but limited involvement", 3 => "DPO with some involvement", 4 => "Active involvement of DPO in compliance", 5 => "DPO actively driving and ensuring continuous GDPR compliance"),
      ),
      14 => array(
        "text" => "How is data transfer to third countries or international organizations managed in compliance with GDPR?",
        "options" => array(1 => "No process for data transfer compliance", 2 => "Partial data transfer practices", 3 => "Data transfer with some implementation", 4 => "Well-defined data transfer processes consistently followed", 5 => "Mature data transfer practices with continuous improvement and proactive measures"),
      ),
      15 => array(
        "text" => "Is there a process for handling data subject complaints and ensuring timely responses in line with GDPR?",
        "options" => array(1 => "No process for handling complaints", 2 => "Partial complaint handling practices", 3 => "Complaint handling with some implementation", 4 => "Well-defined complaint handling consistently followed", 5 => "Mature complaint handling with continuous improvement and adherence to timelines"),
      ),
      // ... add more questions for other GDPR Compliance areas
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
    <form method="post" action="assess7.php" onsubmit="return validateForm();">
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