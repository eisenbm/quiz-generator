<?php 
  $content = file_get_contents('fill-in-the-blank.html');

  $content = htmlspecialchars($content);
  $content = str_replace("\"", "&quot;", $content);
  $content = str_replace("\t", "\\t", $content);
  $content = str_replace("\n", "\\n", $content);

  echo $content;