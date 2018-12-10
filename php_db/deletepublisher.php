<?php
  //page to call the function deletePublisher and showing the results
  require_once('../php_includers/db_connection.php');
  $id = $_POST["id"];
  $deleteResult = DB::deletePublisher($id);
  echo ($deleteResult);   
?>