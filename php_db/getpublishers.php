<?php
  require_once('../php_includers/db_connection.php');
  $publishers = DB::getPublishers();
  echo (json_encode($publishers));    
?>