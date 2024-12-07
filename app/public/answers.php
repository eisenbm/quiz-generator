<?php
session_start();
$questions = $_SESSION["questions"];
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
  <h1>Answer Key</h1>
  <ol>
    <?php foreach ($questions as $question) : ?>
      <li>
        <div class="question">
          <p><strong><?php echo htmlspecialchars($question["text"], ENT_QUOTES); ?></strong></p>
          <?php if (array_key_exists("answers", $question)) : ?>
            <ol class="choices">
              <?php
              $count = 0;
              foreach ($question["answers"] as $answer) {
                $count++;
                if ($answer == $question["answer"]) {
                  $value = $count;
                }
              }
              ?>
              <li value="<? echo $value; ?>">
                <?php echo htmlspecialchars($question["answer"], ENT_QUOTES); ?>
              </li>
            </ol>
          <?php else : ?>
            <ul class="answer">
              <li><?php echo "Answer: " . htmlspecialchars($question["answer"], ENT_QUOTES); ?></li>
            </ul>
          <?php endif; ?>
        </div>
      </li><?php endforeach; ?>
  </ol>
</body>

</html>