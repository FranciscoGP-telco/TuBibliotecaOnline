<?php
  //page to call the function deleteAuthor and showing the results
  require_once('../php_includers/db_connection.php');
  $id = $_POST["id"];
  $deleteResult = DB::deleteAuthor($id);
  echo ($deleteResult);   
?>