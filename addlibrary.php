<?php
  require_once('php_includers/db_connection.php');
  $ISBN = $_POST["isbn"];
  $nick = $_POST["nick"];
  $addResult = DB::insertLibrary($nick, $ISBN);
  echo ($addResult);   
?>