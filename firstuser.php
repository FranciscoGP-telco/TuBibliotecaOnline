<?php
//Page to call the header, footer and body
$PageTitle =  "Inicio";
  //if we have users in the DB redirect to index.php
  require_once('php_includers/db_connection.php');
  $numUsers = DB::numUsers();
  
  if($numUsers["NUMUSERS"] != 0){
    header('Location: index.php');
  }
  include_once('php_includers/header.php');

  include_once('body/bd_first.php');

  include_once('php_includers/footer.php');
?>