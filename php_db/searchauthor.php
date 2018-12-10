<?php
  require_once('../php_includers/db_connection.php');
  $name = $_POST["name"];
  $authorResults = DB::getAuthorsByName($name);
  echo (json_encode($authorResults));    
?>