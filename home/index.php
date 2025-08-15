<?php
// ... (Your existing code for database connection and table creation) ...

try {
    // ... (Your existing code for database connection and table creation) ...

    // Select all data from the 'users' table
    $sqlSelectData = "SELECT id, name, email FROM users";

    // Prepare and execute the query
    $stmt = $pdo->query($sqlSelectData);

    // Fetch all results as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<hr><h2>Users Table Content:</h2>";

    // Check if any users were found
    if ($users) {
        echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
        echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>";
        echo "<tbody>";

        // Loop through the fetched results and echo them
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No users found in the database.</p>";
    }

} catch (PDOException $e) {
    // Catch any exceptions
    echo "Error: " . $e->getMessage();
}

// Close the database connection (optional)
$pdo = null;

?>