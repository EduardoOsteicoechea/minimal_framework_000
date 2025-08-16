<?php

include_once 'include.php';

function view_db_tables(): mixed
{
  include 'include.php';

  return pdo_fetch_assoc("SELECT name FROM sqlite_master WHERE type='tabale';");
}

class ViewTables extends TOOL
{

  public function __construct(
    WORKFLOW $workflow,
    string $methodDescription
  ) {
    parent::__construct($workflow, $methodDescription);

    $this->Result = view_db_tables();

    $this->AddTest(function ($result) {
      if ($result instanceof Exception) {
        throw $result;
      }
    });

    $this->Test();
    if ($this->PassedTests) $this->Document($this);
  }
}

$workflow = new WORKFLOW();
$a = new ViewTables($workflow, "view_db_tables");
