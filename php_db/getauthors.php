<?php
  //page to call the function listAuthors and send the results in json format
  require_once('../php_includers/db_connection.php');
  $authors = DB::listAuthors();
  echo (json_encode($authors));    
?>