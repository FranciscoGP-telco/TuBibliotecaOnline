<?php
  //page to call the function getAuthorsByName and send the results in json format
  require_once('../php_includers/db_connection.php');
  $name = $_POST["name"];
  $authorResults = DB::getAuthorsByName($name);
  echo (json_encode($authorResults));    
?>