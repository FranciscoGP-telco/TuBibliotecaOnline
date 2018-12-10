<?php
  require_once('../php_includers/db_connection.php');
  $authors = DB::listAuthors();
  echo (json_encode($authors));    
?>