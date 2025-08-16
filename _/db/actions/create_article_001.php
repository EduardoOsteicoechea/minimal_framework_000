<?php

function create_article_001($root, $name, $json)
{
  include '_include.php';

  try {
    echo "Preparing to Open Database";
    echo "<br><br>";
    
    $pdo = new PDO("sqlite:.$db.");
    echo "Opened Database";
    echo "<br><br>";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        INSERT INTO 
          articles_001 
            (name, article_json) 
          VALUES
            ('.$name.','.$json.')
    ";

    echo $sql . "<br><br>";

    $pdo->exec($sql);
    echo "Initial data inserted into 'users' table!<br>";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $pdo = null;
}
