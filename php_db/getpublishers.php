<?php
  //page to call the function getPublishers and send the results in json format
  require_once('../php_includers/db_connection.php');
  $publishers = DB::getPublishers();
  echo (json_encode($publishers));    
?>