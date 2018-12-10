<?php
  require_once('../php_includers/db_connection.php');
  $id = $_POST["id"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $updateResult = DB::updatePublisher($id, $name, $address, $phone, $email);
  echo ($updateResult);   
?>