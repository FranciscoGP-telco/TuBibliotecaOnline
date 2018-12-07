<?php
  require_once('php_includers/db_connection.php');
  $author = DB::getAuthorsById($_GET["id"]);
?>
    <div class="book tbo-cream">
      <div class="w3-row">
        <div class="w3-half w3-container">
          <div class="bookContainer">
            <h1 class="title"><?php print_r($author["NAME"]) ?></h1>
            <p>Fecha de nacimiento: <?php print_r($author["YEAROFBIRTH"]) ?></p>
            <a href="https://www.google.es/search?q=<?php print_r(str_replace(' ', '+',$author["NAME"])) ?>" class="noUnder"><button class="w3-button w3-round tbo-mint w3-block">Buscar en Google</button></a>
          </div>
        </div>
        <div class="w3-half w3-container">
          <p>Biografía:</p><p class="plot"><?php print_r($author["BIOGRAPHY"]) ?></p>
        </div>
      </div>
    </div>