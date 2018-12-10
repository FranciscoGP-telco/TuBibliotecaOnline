<?php
  require_once('../php_includers/db_connection.php');
  $name = $_POST["name"];
  $publisherResults = DB::getPublishersByName($name);
  echo (json_encode($publisherResults));    
?>