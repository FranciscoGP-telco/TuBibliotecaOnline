<?php
  if(isset($_COOKIE["login"])){
  //Page with the form to add a publisher
  print_r('<div class="addBook tbo-cream w3-padding-large" id="divpublisherform">
        <h1 class="titles">Añadir editorial</h1>
        
        <p><label for="nameform">Nombre:</label>
        <input class="w3-input w3-border" name="nameform" id="nameform" type="text" autofocus></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="nameerror"></span>
        <p><label for="addressform">Dirección:</label>
        <textarea class="w3-input w3-border" name="addressform" id="addressform" rows="2" cols="1"></textarea></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="addresserror"></span>
        <p><label for="emailform">Email:</label>
        <input class="w3-input w3-border" name="emailform" id="emailform" type="email"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="emailerror"></span>
        <p><label for="phoneform">Teléfono:</label>
        <input class="w3-input w3-border" name="phoneform" id="phoneform" type="text"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="phoneerror"></span>
        <div id="addpublishercorrect" class="w3-panel tbo-mint w3-display-container w3-hide">
        <h2>¡Editorial creada correctamente!</h2>
        </div>
        <div id="addpublishererror" class="w3-panel tbo-dark w3-display-container w3-hide">
        <h2>La editorial ya existe</h2>
        </div>
      </br><button class="w3-button w3-round tbo-mint w3-block" id="addnewpublisher">Crear editorial</button>');
  } else {
    print_r('    <div class="addBook tbo-cream w3-padding-large">
    <p> Debes loguearte para poder añadir una editorial. Hazlo <a href="login.php">aquí</a></p>
    </div>
    ');
  }
?>
