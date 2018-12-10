<?php
  //page to call the function listUsers and send the results in json format
  require_once('../php_includers/db_connection.php');
  $users = DB::listUsers();
  echo (json_encode($users));    
?>