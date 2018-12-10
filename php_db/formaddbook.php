<?php
    //page to call the function insertBook and showing the results. Before its double check the user input
    require_once('../php_includers/db_connection.php');
    $ISBN = $_POST["ISBN"];
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $plot = $_POST["plot"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $results = array();
    $totalResults = 0;

    //Checking the correct length of the ISBN
    if(strlen($ISBN) == 10 || strlen($ISBN) == 13){
        if(is_numeric($ISBN)){
            $results[0] = true;
        }
    }

    //Checking the correct length of the title
    if(strlen($title) >= 1){
        $results[1] = true;
    }

    //Checking the correct length of the genre
    if(strlen($genre) >= 4 && strlen($genre) <= 20){
        $results[2] = true;
    }

    //Checking the correct length of the plot
    if(strlen($plot) >= 10 && strlen($plot) <= 10000){
        $results[3] = true;
    }

    //Counting the results
    for ($i = 0; $i < 4; $i++){
        if($results[$i]){
            $totalResults++;
        }
    }
    //insert the book if the results are ok
    if ($totalResults == 4){
        $insertBookResult = DB::insertBook($ISBN, $publisher, $author, $title, $genre, $plot);
        echo ($insertBookResult);    
    } else {
        echo ("Los datos introducidos no son correctos.");
    }
?>