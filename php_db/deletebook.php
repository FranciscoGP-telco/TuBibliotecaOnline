<?php
  //page to call the function deleteBook and showing the results
  require_once('../php_includers/db_connection.php');
  $ISBN = $_POST["ISBN"];
  $deleteResult = DB::deleteBook($ISBN);
  echo ($deleteResult);   
?>