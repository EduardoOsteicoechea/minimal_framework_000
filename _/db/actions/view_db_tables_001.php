<?php

include_once 'include.php';

function view_db_tables(string $dbPath): string
{
  try {
    $pdo = new PDO("sqlite:$dbPath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $pdo->query("SELECT name FROM sqlite_master WHERE type='table';");

    $result = "";

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $result .= "<br>";
      $result .= "----";
      $result .= $row['name'];
    }
    
    $result .= "<br>";

    return $result;
  } catch (PDOException $e) {
    return "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

class ViewTables extends TOOL
{
  public string $Database_path;

  public function __construct(
    WORKFLOW $workflow,
    string $methodDescription,
    string $dbPath
  ) {
    parent::__construct($workflow, $methodDescription);
    $this->Database_path = $dbPath;

    $this->Result = view_db_tables($this->Database_path);
    $this->AppendTests(function($result) {if ($result == "") throw new Exception("Test failed: The result is an empty string.");});
    $this->Test();
    if($this->PassedTests) $this->Document($this);
  }
}

$workflow = new WORKFLOW();
// $a = new ViewTables($workflow, "view_db_tables", "");
$a = new ViewTables($workflow, "view_db_tables", $db);
