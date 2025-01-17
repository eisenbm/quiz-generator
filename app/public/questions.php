<?php
require "src/functions.php";
$json = "./json/exam.json";
$exam = json_decode(file_get_contents($json), true);
$title = $exam["title"];
$questions = $exam["questions"];

$showAnswers = true;
require_once "layout.php";
