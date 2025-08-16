<?php
class TOOL
{
  private WORKFLOW $Workflow;
  public string $Action;
  public string $Name;
  public bool $PassedTests;
  public mixed $Result;
  private array $Tests = [];

  public function __construct(
    WORKFLOW $workflow,
    string $methodDescription
  ) {
    $this->Workflow = $workflow;
    $this->Name = $methodDescription;
    $this->Workflow->AddAction();
    $this->Action = $this->Workflow->CurrentAction();
    $this->Tests[] = function () { if ($this->Result === null) throw new Exception("Test failed: The result is null.");};
  }

  public function AppendTests($test)
  {
    $this->Tests[] = $test;
  }

  public function Test(): void
  {
    for ($i = 0; $i < count(($this->Tests)); $i++) {
      $current_test = $this->Tests[$i];
      try {
        $current_test($this->Result);
        $this->PassedTests = true;
      } catch (Exception $e) {
        $this->PassedTests = false;
        $this->log_error($e);
      }
    }
  }

  public function Document(object $item)
  {
    echo nl2br(json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    echo "<br><br>";
  }

  private function log_error(Exception $e)
  {
    echo "Error: " . $e->getMessage();
    echo "<br>";
    echo "Name: " . $this->Name;
    echo "<br>";
    echo "Action: " . $this->Workflow->CurrentAction();
    echo "<br>";
    echo "Value: " . $this->Result;
    echo "<br>";
    echo "<br>";
  }
}
