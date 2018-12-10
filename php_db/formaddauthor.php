<?php
    //page to call the function insertAuthor and showing the results. Before its double check the user input
    require_once('../php_includers/db_connection.php');
    $authors = DB::listAuthors();
    $totalAuthors = count($authors);
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $results = array();
    $totalResults = 0;
  
    //Checking if the user is in the DB
    $results[0] = false;
    if(strlen($name) >= 3 && strlen($name) <= 100){
        $results[0] = true;
        for ($i = 0; $i < $totalAuthors; $i++){
        if($authors[$i]["NAME"] == $name){
            $results[0] = false;
        }
        }
    } 

    //Checking the length of the string
    $results[1] = false;
    if(strlen($bio) >= 20 && strlen($name) <= 10000){
        $results[1] = true;
    }

    //Checking if the author is older than 16
    $results[2] = false;
    if((date("Y") - $year) >= 16){
        $results[2] = true;
    }

    //Counting the results
    for ($i = 0; $i < 3; $i++){
        if($results[$i]){
            $totalResults++;
        }
    }

    //insert the author if the results are ok
    if ($totalResults == 3){
        $addAuthorResult = DB::insertAuthor($name, $bio, $year, $month, $day);
        echo ($addAuthorResult);    
    } else {
        echo ("Los datos introducidos no son correctos.");
    }
?>