<?php 
  require "functions.php";
  
  $version = rand(1000, 1999);

  $questions = randomize(
    json_decode(file_get_contents('questions.json'), 1)
  );

  $mc = array_filter($questions, function ($question) {
    return $question['type'] === 'multiple-choice';
  });

  $mcPoints = count($mc);

  $fb = array_filter($questions, function ($question) {
    return $question['type'] === 'fill-in-the-blank';
  });

  $fbPoints = array_reduce($fb, function ($total, $question) {
    return $total + count($question['answers']);
  });
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Generator</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  <script>
      hljs.highlightAll();
  </script>
</head>
<body>
  <header class="page-break" style="padding: 10rem;">
    <h1>CST8257 Midterm Exam<br><small>(Version <?php echo $version; ?>)</small></h1>
    <p class="px-1">__________________________________________________<br>Full Name</p>
    <p class="px-1">__________________________________________________<br>Student Number</p>
  </header>

  <section class="page-break">
    <header>
      <h2>Multiple-Choice Questions: <?php echo $mcPoints; ?> Points</h2>
      <p>Circle the letter of the option that best answers the question.</p>
    </header>

    <?php $cnt = 1; ?>
    <?php foreach ($mc as $question) : ?>
      <div class="question <?php echo $cnt % 7 === 0 ? 'page-break' : ''; ?>">
        <p class="no-page-break"><strong><?php echo "{$cnt}. "; ?><?php echo $question["text"]; ?></strong></p>
        <ol>
          <?php foreach ($question["answers"] as $answer) : ?>
            <li><?php echo $answer; ?></li>
          <?php endforeach; ?>
        </ol>
      </div>
      <?php $cnt++; ?>
    <?php endforeach; ?>
  </section>

  <section>
    <header>
      <h2>Fill in the Blank Questions: <?php echo $fbPoints; ?> Points</h2>
      <p>Circle the letter of the option that best answers the question.</p>
    </header>
    
    <?php $cnt = 1; ?>
    <?php foreach ($fb as $question) : ?>
      <div class="question page-break">
        <p class="no-page-break"><?php echo "{$cnt}. "; ?><strong>Complete the code below to create the output.</strong></p>
        <h3>Output</h3>
        <div class="output">
          <?php echo $question["output"]; ?>
        </div>

        <h3>Code</h3>
        <pre><code class="language-text"><?php echo $question['text']; ?></code></pre>
        <ol>
          <?php foreach ($question["answers"] as $answer) : ?>
            <li class="px-1">_______________________________</li>
          <?php endforeach; ?>
        </ol>
      </div>
      <?php $cnt++; ?>
    <?php endforeach; ?>
  </section>
</body>
</html>