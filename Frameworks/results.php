<?php

// Content specific to the SOC 2 framework
$pageTitle = "SOC 2 Framework Assessment";

$correctAnswers = [
  "tsc" => ["Security", "Availability", "Processing Integrity", "Confidentiality"],
  "report_type" => "Type 2",
];

$userAnswers = [];
$feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userAnswers["tsc"] = isset($_POST["tsc"]) ? $_POST["tsc"] : [];
  $userAnswers["report_type"] = isset($_POST["report_type"]) ? $_POST["report_type"] : "";

  $score = 0;
  $feedback .= "<ul>";

  // Check answer for question 1
  if (count(array_diff($correctAnswers["tsc"], $userAnswers["tsc"])) === 0) {
    $score++;
    $feedback .= "<li>Question 1: Correct!</li>";
  } else {
    $incorrectAnswers = array_diff($userAnswers["tsc"], $correctAnswers["tsc"]);
    $correctAnswersList = implode(", ", $correctAnswers["tsc"]);
    $feedback .= "<li>Question 1: Incorrect. Correct answers are: $correctAnswersList. Your answers included: " . implode(", ", $incorrectAnswers) . ".</li>";
  }

  // Check answer for question 2
  if ($userAnswers["report_type"] === $correctAnswers["report_type"]) {
    $score++;
    $feedback .= "<li>Question 2: Correct!</li>";
  } else {
    $feedback .= "<li>Question 2: Incorrect. The correct answer is: " . $correctAnswers["report_type"] . ".</li>";
  }

  $feedback .= "</ul>";

  // Store results (replace with your preferred method)
  // e.g., $_SESSION["soc2_results"] = $userAnswers . $score . $feedback;
}

$pageContent = <<<HTML
<h2>SOC 2 Assessment</h2>
<p>This simple assessment helps measure your understanding of the SOC 2 framework.</p>

<form action="" method="post">
  <p>**Question 1:** What are the five Trust Service Criteria (TSC) addressed by SOC 2?</p>
  <ul>
    <li><input type="checkbox" name="tsc[]" value="Security"> Security</li>
    <li><input type="checkbox" name="tsc[]" value="Availability"> Availability</li>
    <li><input type="checkbox" name="tsc[]" value="Processing Integrity"> Processing Integrity</li>
    <li><input type="checkbox" name="tsc[]" value="Confidentiality"> Confidentiality</li>
    <li><input type="checkbox" name="tsc[]" value="Privacy"> Privacy</li>
  </ul>

  <p>**Question 2:** Which SOC 2 report type provides a point-in-time assessment of controls?</p>
  <ul>
    <li><input type="radio" name="report_type" value="Type 1"> Type 1</li>
    <li><input type="radio" name="report_type" value="Type 2"> Type 2</li>
  </ul>

  <input type="submit" value="Submit Answers">
</form>

<p>**Your Score:** $score out of 2</p>
$feedback

<p>**Note:** This is a simplified assessment for educational purposes only and does not constitute a comprehensive SOC 2 audit.</p>
HTML;

include("template.php");
?>
