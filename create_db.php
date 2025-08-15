<?php

// Define the path to your SQLite database file
// It's good practice to keep it outside the web root (e.g., /var/www/html),
// or at least in a secure, non-public directory.
// For this example, we'll put it in the same directory as the script.
$databaseFile = __DIR__ . '/my_database.sqlite';

try {
    // Create a new PDO instance to connect to the SQLite database.
    // If the file doesn't exist, PDO will create it.
    $pdo = new PDO("sqlite:$databaseFile");

    // Set error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database 'my_database.sqlite' created successfully (or connected if it already existed)!<br>";

    // SQL statement to create a table
    $sqlCreateTable = "
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL
        );
    ";

    // Execute the SQL statement
    $pdo->exec($sqlCreateTable);
    echo "Table 'users' created successfully (or verified if it already existed)!<br>";

    // Optional: Insert some initial data
    $sqlInsertData = "
        INSERT INTO users (name, email) VALUES
        ('John Doe', 'john.doe@example.com'),
        ('Jane Smith', 'jane.smith@example.com');
    ";
    $pdo->exec($sqlInsertData);
    echo "Initial data inserted into 'users' table!<br>";

} catch (PDOException $e) {
    // Catch any exceptions (e.g., if the database file is not writable)
    echo "Error: " . $e->getMessage();
}

// Close the database connection (optional, PHP handles this at script end)
$pdo = null;

?>