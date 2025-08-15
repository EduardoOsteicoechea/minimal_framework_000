<?php

function create_article_001($name, $json)
{
  include_once '_include.php';

  try {
    $pdo = new PDO("sqlite:$db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        INSERT INTO 
          articles_001 
            (name, article_json) 
          VALUES
            ('.$name.','.$json.')
    ";

    $pdo->exec($sql);
    echo "Initial data inserted into 'users' table!<br>";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $pdo = null;
}
