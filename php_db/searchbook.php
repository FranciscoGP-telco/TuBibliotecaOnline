<?php
  //page to call the function getBooks and send the results in json format
  require_once('../php_includers/db_connection.php');
  $title = $_POST["title"];
  $bookResults = DB::getBooks($title);
  echo (json_encode($bookResults));    
?>