<?php
// check_db/view_db_tables


echo "starting";
echo "<br><br>";

try {

  include '../../_/db/actions/view_db_tables_001.php';

  view_db_tables_001();
  
} catch (Exception $e) {
  echo $e->getMessage();
}
