<?php

$databaseFile = '../_/db/files/my_database.sqlite';

try {
  $pdo = new PDO("sqlite:$databaseFile");

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sqlSelectData = "SELECT id, name, email FROM users";

  $stmt = $pdo->query($sqlSelectData);

  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<hr><h2>Users Table Content:</h2>";

  if ($users) {
    echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>";
    echo "<tbody>";

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
  echo "Error: " . $e->getMessage();
}

$pdo = null;
