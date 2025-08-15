<?php

include_once 'module_includes.php';

try {
    $pdo = new PDO("sqlite:$db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlCreateTable = "
        CREATE TABLE IF NOT EXISTS articles_001 (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            article_json TEXT NOT NULL,
            updated_at TEXT DEFAULT CURRENT_TIMESTAMP,
            created_at TEXT DEFAULT CURRENT_TIMESTAMP
        );
    ";

    $pdo->exec($sqlCreateTable);
    echo "Table 'users' created successfully (or verified if it already existed)!<br>";


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

?>