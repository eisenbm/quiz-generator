<?php
session_start();
require "src/functions.php";

$title = $_SESSION['title'];
$questions = $_SESSION["questions"];
$version = $_SESSION["version"];
$showAnswers = true;

require_once "layout.php";