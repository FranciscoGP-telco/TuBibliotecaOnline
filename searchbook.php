<?php
  require_once('php_includers/db_connection.php');
  $title = $_POST["title"];
  $bookResults = DB::getBooks($title);
  echo (json_encode($bookResults));    
?>