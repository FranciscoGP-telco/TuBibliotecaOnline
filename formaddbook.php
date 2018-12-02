<?php
  require_once('php_includers/db_connection.php');
    $ISBN = $_POST["ISBN"];
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $plot = $_POST["plot"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $results = array();
    $totalResults = 0;

    if(strlen($ISBN) == 10 || strlen($ISBN) == 13){
        if(is_numeric($ISBN)){
            $results[0] = true;
        }
    }

    if(strlen($title) >= 1){
        $results[1] = true;
    }

    if(strlen($genre) >= 4 && strlen($genre) <= 20){
        $results[2] = true;
    }

    if(strlen($plot) >= 10 && strlen($plot) <= 10000){
        $results[3] = true;
    }

    for ($i = 0; $i < 4; $i++){
        if($results[$i]){
            $totalResults++;
        }
    }
    
    if ($totalResults == 4){
        $insertBookResult = DB::insertBook($ISBN, $publisher, $author, $title, $genre, $plot);
        echo ($insertBookResult);    
    } else {
        echo ("Los datos introducidos no son correctos.");
    }
?>