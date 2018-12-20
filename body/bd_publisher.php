<?php
  //Page to show publisher info
  //Only charge the web if the user send the id via the url
  if(isset($_GET["id"])){
    require_once('php_includers/db_connection.php');
    try{
      $publisher = DB::getPublisherById($_GET["id"]);
    } catch (PDOException $e){
      print_r('<div class="addBook tbo-cream w3-padding-large">
      <p>'.$e->getMessage().'</p>
      </div>');
    }
    print_r('
      <div class="book tbo-cream">
        <div class="w3-row">
          <div class="w3-half w3-container">
            <div class="bookContainer">
              <h1 class="title">'.$publisher["NAME"].'</h1>
              <p>Teléfono: '.$publisher["PHONE"].'</p>
              <p>Email: '.$publisher["EMAIL"].'</p>
              <a href="https://www.google.es/search?q='.str_replace(" ", "+",$publisher["NAME"]).'" class="noUnder"><button class="w3-button w3-round tbo-mint w3-block">Buscar en Google</button></a>
            </div>
          </div>
          <div class="w3-half w3-container">

            <div id="map"></div>
            <p>Dirección:</p><p id="mapaddress">'.$publisher["ADDRESS"].'</p>
          </div>
        </div>
      </div>
      <!--Scripts to charge the map in the previous div-->
      <script src="https://maps.googleapis.com/maps/api/js?key=<KEY>&callback=initMap"
            async defer></script>
          <script src=js/maps.js></script>');
  } else {
    print_r('<div class="addBook tbo-cream w3-padding-large">
    <p>¡Error! Debes entrar a esta web a traves de un enlace de editorial</p>
    </div>');
  }
?>
