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
