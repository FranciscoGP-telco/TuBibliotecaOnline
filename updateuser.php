<?php
  require_once('php_includers/db_connection.php');
  $nick = $_POST["nick"];
  $name = $_POST["name"];
  $subname = $_POST["subname"];
  $usertype = $_POST["usertype"];
  $email = $_POST["email"];
  $updateResult = DB::updateUser($nick, $name, $subname, $usertype, $email);
  echo ($updateResult);   
?>