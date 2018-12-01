<?php
  require_once('php_includers/db_connection.php');
  $authors = DB::getAuthors();
  $publishers = DB::getPublishers();
  print_r('<div class="addBook tbo-cream w3-padding-large">
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
      print_r('<div id="addbookcorrect" class="w3-panel tbo-mint w3-display-container w3-hide">
      <h2>¡Libro creado correctamente!</h2>
      </div>');
      print_r('<div id="addbookerror" class="w3-panel tbo-dark w3-display-container w3-hide">
      <h2>El libro ya existe</h2>
      </div>');
      print_r('</br><button class="w3-button w3-round tbo-mint w3-block" id="addnewbook">Añadir</button>');
    }
?>
    </div>
