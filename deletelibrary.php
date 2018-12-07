<?php
  require_once('php_includers/db_connection.php');
  $ISBN = $_POST["ISBN"];
  $user = $_POST["user"];
  $deleteResult = DB::deleteBookFromLibrary($ISBN, $user);
  echo ($deleteResult);   
?>