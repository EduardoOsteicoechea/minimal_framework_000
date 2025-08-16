<?php

function create_articles_001_table_001()
{
  include 'include.php';

  $sqlCreateTable = "
        CREATE TABLE IF NOT EXISTS articles_001 (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            article_json TEXT NOT NULL,
            updated_at TEXT DEFAULT CURRENT_TIMESTAMP,
            created_at TEXT DEFAULT CURRENT_TIMESTAMP
        );
    ";

  pdo_exec($sqlCreateTable);

  echo "Table 'users' created successfully (or verified if it already existed)!<br>";
}