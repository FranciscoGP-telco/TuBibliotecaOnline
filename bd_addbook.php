<?php
  require_once('php_includers/db_connection.php');
  $authors = DB::getAuthors();
  $publishers = DB::getPublishers();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ISBN = $_POST["ISBNform"];
    $title = $_POST["titleform"];
    $genre = $_POST["genreform"];
    $plot = $_POST["plotform"];
    $author = $_POST["authorform"];
    $publisher = $_POST["authorform"];
    $title = $_POST["titleform"];


    //Comprobations to upload the front
    //First, we check the format
    $fileType = strtolower(pathinfo($_FILES["uploadform"]["name"],PATHINFO_EXTENSION));
    echo ($_FILES["uploadform"]["name"]);
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
    }
    if($checksOk){
      echo("INSERT INTO BOOKS VALUES ('".$ISBN."', '".$title."', '".$genre."', '".$plot."', '".$publisher."', '".$author."')");
    }
  } else {
    print_r('<div class="addBook tbo-cream w3-padding-large">
        <form id="formaddbook" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" enctype="multipart/form-data">
        <h1 class="titles">Añadir libro</h1>
        <p><label for="ISBNform">ISBN</label>
        <input class="w3-input w3-border" name="ISBNform" id="ISBNform" type="text" autofocus></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="ISBNerror"></span>
        <p><label for="titleform">Título</label>
        <input class="w3-input w3-border" name="titleform" id="titleform" type="text"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="titleerror"></span>
        <p><label for="genreform">Género</label>
        <input class="w3-input w3-border" name="genreform" id="genreform" type="text"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="genreerror"></span>
        <p><label for="plotform">Argumento:</label>
        <textarea class="w3-input w3-border" name="plotform" id="plotform" rows="10" cols="30"></textarea></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="ploterror"></span></br>
        <p><label for="uploadform">Portada:</label>
        <input type="file" name="uploadform" id="uploadform"></p>
      ');
    if(empty($authors)){
      print_r('<p>¡Aun no se ha añadido ningun autor! <a href="addauthor.php">Añadelo pulsando aquí</a></p>');
    } else{
      print_r('<label for="authorform">Autor: </label>
      <select class="w3-input w3-border" name="authorform" id="authorform">');
      for ($x = 0; $x < count($authors); $x++) {
        print_r ('<option value="'.$authors[$x]["ID_AUTHOR"].'">'.$authors[$x]["NAME"].'</option>');
      }
      print_r('</select>');
    }
    if(empty($publishers)){
      print_r('<p>¡Aun no se ha añadido ninguna editorial! <a href="addpublisher.php">Añadela pulsando aquí</a></p>');
    } else{
      print_r('<label for="publisherform">Editorial: </label>
      <select class="w3-input w3-border" name="publisherform" id="publisherform">');
      for ($x = 0; $x < count($publishers); $x++) {
        print_r ('<option value="'.$publishers[$x]["ID_PUBLISHER"].'">'.$publishers[$x]["NAME"].'</option>');
      }
      print_r('</select>');
      print_r('</br><button class="w3-button w3-round tbo-mint w3-block" id="addnewbook">Añadir</button>');
    }
    print_r('</form>');
  }
?>
    </div>
