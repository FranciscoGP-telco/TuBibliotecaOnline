<?php
  require_once('../php_includers/db_connection.php');
  $nick = $_POST["nick"];
  $deleteResult = DB::deleteUser($nick);
  echo ($deleteResult);   
?>