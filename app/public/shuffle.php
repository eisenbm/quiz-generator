<?php
session_start();

require "./src/functions.php";

$questions = randomize($_SESSION["questions"]);

$_SESSION["questions"] = $questions;
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
  <h1>Questions</h1>
  <ol>
    <?php foreach ($questions as $question) : ?>
      <li>
        <div class="question">
          <p><strong><?php echo htmlspecialchars($question["text"], ENT_QUOTES); ?></strong></p>
          <?php if (array_key_exists("answers", $question)) : ?>
            <ol class="choices">
              <?php foreach ($question["answers"] as $answer) : ?>
                <li><?php echo htmlspecialchars($answer, ENT_QUOTES); ?></li>
              <?php endforeach; ?>
            </ol>
          <?php endif; ?>
        </div>
      </li><?php endforeach; ?>
  </ol>
</body>

</html>