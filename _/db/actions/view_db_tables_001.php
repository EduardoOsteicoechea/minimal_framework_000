<?php

function view_db_tables_001()
{
  include_once '_include.php';

  try {

    $pdo = new PDO("sqlite:$db");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlCreateTable = "SELECT name FROM sqlite_master WHERE type='table';";

    $pdo->exec($sqlCreateTable);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $pdo = null;
}
