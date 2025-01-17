<?php
session_start();
require "src/functions.php";
$json = "./json/exam.json";
$exam = json_decode(file_get_contents($json), true);
$title = $exam["title"];
$questions = randomize($exam["questions"]);
$version = rand(1000, 1999);

$_SESSION["title"] = $title;
$_SESSION["questions"] = $questions;
$_SESSION["version"] = $version;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Generator</title>
  <link rel="stylesheet" href="./css/questions.css">
</head>

<body>
  <h1>Quiz Generator</h1>
  <ul>
    <li><a href="./questions.php">Questions</a></li>
    <li><a href="./shuffle.php" target="_blank">Shuffle</a></li>
    <li><a href="./answers.php" target="_blank">Answer Key</a></li>
  </ul>
</body>

</html>