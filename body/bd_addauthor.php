<?php
  //Page with the form to add a author
  print_r('<div class="addBook tbo-cream w3-padding-large" id="divauthorform">
        <h1 class="titles">Añadir autor</h1>
        <p><label for="authorform">Nombre:</label>
        <input class="w3-input w3-border" name="authorform" id="authorform" type="text" autofocus></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="nameerror"></span>
        <p><label for="bioform">Biografía:</label>
        <textarea class="w3-input w3-border" name="bioform" id="bioform" rows="10" cols="30"></textarea></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="bioerror"></span>
        <p><label for="dateform">Fecha de nacimiento:</label>
        <input class="w3-input w3-border" name="dateform" id="dateform" type="date"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="dateerror"></span>
        <div id="addauthorcorrect" class="w3-panel tbo-mint w3-display-container w3-hide">
        <h2>Autor creado correctamente!</h2>
        </div>
        <div id="addauthorerror" class="w3-panel tbo-dark w3-display-container w3-hide">
        <h2>El autor ya existe</h2>
        </div>
        <br/><button class="w3-button w3-round tbo-mint w3-block" id="addnewauthor">Crear autor</button>');
?>
