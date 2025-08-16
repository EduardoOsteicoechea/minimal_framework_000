<?php

function instantiate_pdo(): PDO | Exception
{
  $pdo = new PDO("sqlite:../files/db_001.sqlite");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}

function pdo_exec(string $sql): void
{
  $pdo = instantiate_pdo();
  $pdo->exec($sql);
}

function pdo_fetch_assoc(string $sql): array | Exception
{
    $pdo = instantiate_pdo();
    $statement = $pdo->query($sql);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $result ? $result : new Exception($sql . "\n\n Failed Query");
}
