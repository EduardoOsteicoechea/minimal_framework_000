<?php

function get_json_article_as_associative_array(string $articleName)
{
  $basePath = "../../_/json/";
  $filePath = $basePath . $articleName . ".json";

  if (!file_exists($filePath)) {
    echo __DIR__;
    echo "<br><br>";
    echo "file doens't exist";
    echo "<br><br>";
    echo $filePath;
    return [];
  }

  $jsonContent = file_get_contents($filePath);

  $articleData = json_decode($jsonContent, true);

  return $articleData;
}