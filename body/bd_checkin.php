<?php
  //Page with the form to registrer a user
  print_r('<div class="addBook tbo-cream w3-padding-large" id="divuserform">
        <h1 class="titles">¡Bienvenido a TuBibliotecaOnline!</h1>
        <p>Con TuBibliotecaOnline podras llevar al día todos los libros que posees, comprobar los datos de tus editoriales 
        favoritas y tener todos los datos de los autores a los que sigues. 
        Para registrarte solo deberes rellenar los siguientes datos</p>
        
        <p><label for="nickform">Nick:</label>
        <input class="w3-input w3-border" name="nickform" id="nickform" type="text" autofocus></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="nickerror"></span>
        <p><label for="emailform">Correo electronico:</label>
        <input class="w3-input w3-border" name="emailform" id="emailform" type="email"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="emailerror"></span>
        <p><label for="nameform">Nombre:</label>
        <input class="w3-input w3-border" name="nameform" id="nameform" type="text"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="nameerror"></span>
        <p><label for="subnameform">Primer apellido:</label>
        <input class="w3-input w3-border" name="subnameform" id="subnameform" type="text"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="subnameerror"></span>
        <p><label for="passform">Contraseña:</label>
        <input class="w3-input w3-border" name="passform" id="passform" type="password"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="passerror"></span>
        <p><label for="passconfirmform">Confirmar contraseña:</label>
        <input class="w3-input w3-border" name="passconfirmform" id="passconfirmform" type="password"></p><span class="w3-tag w3-padding w3-small w3-red w3-center w3-hide" id="passcheckerror"></span>
        <br/><span class="w3-tag w3-padding w3-red w3-center w3-hide" id="addusererror"></span>
      ');
      print_r('</br><button class="w3-button w3-round tbo-mint w3-block" id="adduser">Crear usuario</button>
      </div>');
      print_r('<div class="addBook tbo-cream w3-padding-large w3-hide" id="divusercreate">
        <p>¡Usuario creado correctamente! Haz click <a href="login.php">aquí</a> para loguearte</p>
        </div>');
?>
    </div>
