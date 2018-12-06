<?php
  require_once('php_includers/db_connection.php');
  $users = DB::listUsers();
  $totalUsers = count($users);
  $nick = strtolower($_POST["nick"]);
  $email = strtolower($_POST["email"]);
  $name = $_POST["name"];
  $subname = $_POST["subname"];
  $pass = $_POST["pass"];
  $results = array();
  $totalResults = 0;

    if(strlen($nick) >= 3 && strlen($nick) <= 20){
      $results[0] = true;
      for ($i = 0; $i < $totalUsers; $i++){
        if($users[$i]["NICK"] == $nick){
          $results[0] = false;
        }
      }
    } 

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $results[1] = true;
      for ($i = 0; $i < $totalUsers; $i++){
        if($users[$i]["EMAIL"] == $email){
          $results[1] = false;
        }
      }
    }

    if(strlen($name) >= 3 && strlen($name) <= 30){
        $results[2] = true;
    }

    if(strlen($subname) >= 3 && strlen($subname) <= 30){
      $results[3] = true;
  }


  if(strlen($pass) >= 6 && strlen($pass) <= 20){
    $results[4] = true;
  }

    for ($i = 0; $i < 5; $i++){
        if($results[$i]){
            $totalResults++;
        }
    }
    
    if ($totalResults == 5){
        $addUserResult = DB::insertUser($nick, $name, $subname, $pass, $email);
        echo ($addUserResult);    
    } else {
        echo ("Los datos introducidos no son correctos.");
    }
?>