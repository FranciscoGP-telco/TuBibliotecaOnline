<?php
  require_once('php_includers/db_connection.php');
    $ISBN = $_POST["ISBN"];
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $plot = $_POST["plot"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    /*//Comprobations to upload the front
    //First, we check the format
    $fileType = strtolower(pathinfo($_FILES["uploadform"]["name"],PATHINFO_EXTENSION));
      if($fileType != "jpg" && $fileType != "png") {
        echo "Solo puedes añadir portadas en formato .jpg o .png";
        $uploadTest = false;
    } else {
      $target_file = "img/" . basename($ISBN . ".png");
      $uploadTest = true;
      //First we check if the image have size
      if(isset($_POST["submit"])) {
          if(getimagesize($_FILES["uploadform"]["tmp_name"])) {
              echo "La portada que has subido no es una imagen.";
              $uploadTest = false;
          }
      }

      // Then the maximum file size
      if ($_FILES["uploadform"]["size"] > 500000) {
          echo "No se ha añadido la portada. No puede tener un tamaño mayor a 5 megas";
          $uploadTest = false;
      }
  
      // Check if $uploadTest is false
      if ($uploadTest == false) {
          echo "No se ha subido la imagen.";
      // If is true, try to upload file
      } else {
          if (move_uploaded_file($_FILES["uploadform"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["uploadform"]["name"]). " has been uploaded.";
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
    }*/
    $insertBookResult = DB::insertBook($ISBN, $publisher, $author, $title, $genre, $plot);
    echo ($insertBookResult);
?>