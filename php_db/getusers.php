<?php
  require_once('../php_includers/db_connection.php');
  $users = DB::listUsers();
  echo (json_encode($users));    
?>