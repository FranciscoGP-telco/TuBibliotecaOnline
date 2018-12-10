<?php
  //page to call the function getPublishersByName and send the results in json format
  require_once('../php_includers/db_connection.php');
  $name = $_POST["name"];
  $publisherResults = DB::getPublishersByName($name);
  echo (json_encode($publisherResults));    
?>