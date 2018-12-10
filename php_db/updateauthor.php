<?php
  //page to call the function updateAuthor and showing the results
  require_once('../php_includers/db_connection.php');
  $id = $_POST["id"];
  $name = $_POST["name"];
  $date = $_POST["date"];
  $updateResult = DB::updateAuthor($id, $name, $date);
  echo ($updateResult);   
?>