<?php
  //Page to charge the author page
  //Only charge the web if the user send the id via the url
  if(isset($_GET["id"])){
  require_once('php_includers/db_connection.php');
  $author = DB::getAuthorsById($_GET["id"]);
  print_r('
    <div class="book tbo-cream">
      <div class="w3-row">
        <div class="w3-half w3-container">
          <div class="bookContainer">
            <h1 class="title">'.$author["NAME"].'</h1>
            <p>Fecha de nacimiento: '.$author["YEAROFBIRTH"].'</p>
            <a href="https://www.google.es/search?q='.str_replace(" ", "+",$author["NAME"]).'" class="noUnder"><button class="w3-button w3-round tbo-mint w3-block">Buscar en Google</button></a>
          </div>
        </div>
        <div class="w3-half w3-container">
          <p>Biografía:</p><p class="plot">'.$author["BIOGRAPHY"].'</p>
        </div>
      </div>
    </div>');
  } else {
    print_r('<div class="addBook tbo-cream w3-padding-large">
    <p>¡Error! Debes entrar a esta web a traves de un enlace de autor</p>
    </div>');
  }
?>
