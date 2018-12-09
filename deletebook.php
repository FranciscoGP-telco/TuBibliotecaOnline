<?php
  require_once('php_includers/db_connection.php');
  $ISBN = $_POST["ISBN"];
  $deleteResult = DB::deleteBook($ISBN);
  echo ($deleteResult);   
?>