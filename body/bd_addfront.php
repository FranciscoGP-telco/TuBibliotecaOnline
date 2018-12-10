<?php
  require_once('php_includers/db_connection.php');
  //cheking if we have the get info
  if(isset($_GET["ISBN"])){
    $book = DB::getBook($_GET["ISBN"]);
    print_r('<div class="addBook tbo-cream w3-padding-large">
    <form action="addfront_check.php" method="post" enctype="multipart/form-data">
        <h1 class="titles">Añadir portada al libro '.$book['TITLE'].'</h1>
        <p><label for="uploadform">Portada:</label>
        <input type="file" name="uploadform" id="uploadform"></p>
        <input type="hidden" name="ISBN" id="ISBN" value="'.$book["ISBN"].'">
        <input type="submit" value="Subir" name="submit">
    </form>
    </div>');
  } else {
    print_r('<div class="addBook tbo-cream w3-padding-large">
      <p>Error! debes añadir una portada desde la página del libro!</p>
    </div>');
  }
?>