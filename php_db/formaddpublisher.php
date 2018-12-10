<?php
  require_once('../php_includers/db_connection.php');
  $publishers = DB::getPublishers();
  $totalPublishers = count($publishers);
  $name = strtolower($_POST["name"]);
  $email = strtolower($_POST["email"]);
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $results = array();
  $totalResults = 0;

    if(strlen($name) >= 3 && strlen($name) <= 50){
      $results[0] = true;
      for ($i = 0; $i < $totalPublishers; $i++){
        if($publishers[$i]["NAME"] == $name){
          $results[0] = false;
        }
      }
    } 

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $results[1] = true;
      for ($i = 0; $i < $totalPublishers; $i++){
        if($publishers[$i]["EMAIL"] == $email){
          $results[1] = false;
        }
      }
    }

    if(strlen($address) >= 10 && strlen($name) <= 1000){
        $results[2] = true;
    }

    if(strlen($phone) == 9){
      $results[3] = true;
  }

    for ($i = 0; $i < 4; $i++){
        if($results[$i]){
            $totalResults++;
        }
    }
    
    if ($totalResults == 4){
        $addPublisherResult = DB::insertPublisher($name, $address, $phone, $email);
        echo ($addPublisherResult);    
    } else {
        echo ("Los datos introducidos no son correctos.");
    }
?>