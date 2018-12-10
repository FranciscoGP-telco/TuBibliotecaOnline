<?php
  //page to call the function updateBook and showing the results
  require_once('../php_includers/db_connection.php');
  $ISBN = $_POST["ISBN"];
  $name = $_POST["name"];
  $genre = $_POST["genre"];
  $updateResult = DB::updateBook($ISBN, $name, $genre);
  echo ($updateResult);   
?>