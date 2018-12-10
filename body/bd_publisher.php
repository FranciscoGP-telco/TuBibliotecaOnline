<?php
  //Page to show publisher info
  require_once('php_includers/db_connection.php');
  $publisher = DB::getPublisherById($_GET["id"]);
?>
    <div class="book tbo-cream">
      <div class="w3-row">
        <div class="w3-half w3-container">
          <div class="bookContainer">
            <h1 class="title"><?php print_r($publisher["NAME"]) ?></h1>
            <p>Teléfono: <?php print_r($publisher["PHONE"]) ?></p>
            <p>Email: <?php print_r($publisher["EMAIL"]) ?></p>
            <a href="https://www.google.es/search?q=<?php print_r(str_replace(' ', '+',$publisher["NAME"])) ?>" class="noUnder"><button class="w3-button w3-round tbo-mint w3-block">Buscar en Google</button></a>
          </div>
        </div>
        <div class="w3-half w3-container">

          <div id="map"></div>
          <p>Dirección:</p><p id="mapaddress"><?php print_r($publisher["ADDRESS"]) ?></p>
        </div>
      </div>
    </div>
    <!--Scripts to charge the map in the previous div-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC211PskvPGvdclmu_mOafZ8zW58ijr7xw&callback=initMap"
          async defer></script>
        <script src=js/maps.js></script>