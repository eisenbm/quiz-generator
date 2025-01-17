<?php
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

$sa = current(array_filter($questions, function ($question) {
    return $question['type'] === 'short-answer';
}));

$saPoints = count($sa['questions']) * 5;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Generator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <link rel="stylesheet" href="./css/questions.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</head>

<body>
<header class="page-break" style="padding: 10rem;">
    <h1><?php if (isset($title)) { echo $title; } else { echo "Course Exam"; } ?><br><small><?php if (isset($version)) { echo "(Version {$version})"; } ?></small></h1>
    <p class="px-1">__________________________________________________<br>Full Name</p>
    <p class="px-1">__________________________________________________<br>Student Number</p>
</header>
<section class="page-break">
    <header>
        <h2>Multiple-Choice Questions: <?php echo $mcPoints; ?> Points</h2>
        <p>Circle the letter of the option that best answers the question.</p>
    </header>

    <ol>
        <?php $cnt = 1; ?>
        <?php foreach ($mc as $question) : ?>
            <li class="mb-2">
            <div class="question <?php echo $cnt % 5 === 0 ? 'page-break' : ''; ?>">
                <p><strong><?php echo $question["text"]; ?></strong></p>
                <?php if (array_key_exists("file", $question)) : ?>
                    <pre><code class="language-text"><?php echo convert($question['file']); ?></code></pre>
                <?php endif; ?>
                <?php if (array_key_exists("answers", $question)) : ?>
                    <ol class="choices">
                        <?php foreach ($question["answers"] as $answer) : ?>
                            <li class="<?php if ($showAnswers && $answer === $question["answer"]) : ?>correct <?php endif; ?>"><?php echo $answer ?></li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            </div>
            </li>
            <?php $cnt++; ?>
        <?php endforeach; ?>
    </ol>
</section>
<section class="page-break">
    <header>
        <h2>Fill in the Blank Questions: <?php echo $fbPoints; ?> Points</h2>
        <p>Fill in the blank using the space provided. Correct spelling, casing, and syntax must be used.</p>
    </header>

    <?php $cnt = 1; ?>
    <?php foreach ($fb as $question) : ?>
        <div class="question <?php echo $cnt % 5 === 0 ? 'page-break' : ''; ?>">
            <p class="no-page-break"><?php echo "{$cnt}. "; ?> <?php echo $question['text']; ?></p>
            <ol class="choices">
                <?php foreach ($question["answers"] as $answer) : ?>
                    <?php if ($showAnswers) : ?>
                        <li class="pt-1 correct"><?php echo $answer; ?></li>
                    <?php else : ?>
                        <li class="px-1">__________________________________________________</li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ol>
        </div>
        <?php $cnt++; ?>
    <?php endforeach; ?>
</section>
<section class="page-break">
    <header>
        <h2>Short Answer Questions: <?php echo $saPoints; ?> Points</h2>
        <p>Review the code below. Then answer the questions on the next page. Answers will not be graded on spelling or grammar, but should be detailed, thorough, and specific. Answers may include bullet points and/or code.</p>
    </header>

    <div class="code page-break">
        <pre><code class="language-text"><?php echo $sa['code']; ?></code></pre>
    </div>
    <div>
        <?php foreach($sa['questions'] as $question) : ?>
        <div class="mb-15">
            <p><?php echo $question; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>
</body>

</html>