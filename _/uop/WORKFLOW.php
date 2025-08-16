<?php

class WORKFLOW
{
  private string $InitializationTime;

  public bool $MustDocumentMethods;
  public bool $MustDocumentResult;
  private bool $MustTest = true;
  public int $ActionCounter = 0;
  public bool $LastMethodFailed = false;
  public array $Results = [];

  public function __construct(
    bool $mustDocument = false,
    bool $mustTest = false
  ) {
    $this->InitializationTime = (new DateTime())->format('Ymd_His');

    $this->MustDocumentMethods = $mustDocument;
    $this->MustDocumentResult = true;
    $this->MustTest = $mustTest;
  }

  public function DocumentResults(): void
  {
    echo serialize($this);
  }

  public function AddAction(): void
  {
    $this->ActionCounter++;
  }

  public function CurrentAction(): string
  {
    return (string)$this->ActionCounter;
  }
}