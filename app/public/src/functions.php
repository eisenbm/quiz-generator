<?php

function randomize($questions)
{
  shuffle($questions);

  for ($i = 0; $i < count($questions); $i++) {
    if (array_key_exists("answers", $questions[$i])) {
      $answers = array_merge([], $questions[$i]["answers"]);
      if ($questions[$i]["type"] !== "true-false")
        shuffle($answers);
      $questions[$i]["answers"] = array_merge([], $answers);
    }
  }
  return $questions;
}

function convert($file) 
{
  $content = file_get_contents("./src/questions/{$file}");

  $content = htmlspecialchars($content);
  $content = str_replace("\"", "&quot;", $content);
  // $content = str_replace("\t", "\\t", $content);
  // $content = str_replace("\n", "\\n", $content);

  return $content;
}