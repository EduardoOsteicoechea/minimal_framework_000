<?php

echo "starting";
echo "<br><br>";

try {

  include '../../_/db/actions/create_articles_001_table.php';

  create_articles_001_table_001();
  
} catch (Exception $e) {
  echo $e->getMessage();
}
