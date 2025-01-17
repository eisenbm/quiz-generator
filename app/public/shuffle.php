<?php
session_start();
require "src/functions.php";

$title = $_SESSION['title'];
$questions = $_SESSION["questions"];
$version = $_SESSION["version"];
$showAnswers = false;

require_once "layout.php";