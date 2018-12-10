<?php
  //page to call the function insertPublisher and showing the results. Before its double check the user input
  require_once('../php_includers/db_connection.php');
  $publishers = DB::getPublishers();
  $totalPublishers = count($publishers);
  $name = strtolower($_POST["name"]);
  $email = strtolower($_POST["email"]);
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $results = array();
  $totalResults = 0;

  //Checking the correct length of the name
  if(strlen($name) >= 3 && strlen($name) <= 50){
    $results[0] = true;
    for ($i = 0; $i < $totalPublishers; $i++){
      if($publishers[$i]["NAME"] == $name){
        $results[0] = false;
      }
    }
  } 

  //Checking the correct length of the mail, if is a correct email and if is in the DB
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $results[1] = true;
    for ($i = 0; $i < $totalPublishers; $i++){
      if($publishers[$i]["EMAIL"] == $email){
        $results[1] = false;
      }
    }
  }
  //Checking the correct length of the Address
  if(strlen($address) >= 10 && strlen($name) <= 1000){
      $results[2] = true;
  }

  //Checking the correct length of the phone
  if(strlen($phone) == 9){
    $results[3] = true;
  }
  
  //Counting the results
  for ($i = 0; $i < 4; $i++){
      if($results[$i]){
          $totalResults++;
      }
  }
  //insert the publisher if the results are ok
  if ($totalResults == 4){
      $addPublisherResult = DB::insertPublisher($name, $address, $phone, $email);
      echo ($addPublisherResult);    
  } else {
      echo ("Los datos introducidos no son correctos.");
  }
?>