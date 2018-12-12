<?php
  require_once('php_includers/db_connection.php');
  //Getting all the publishers
  $publis = DB::getPublishers();
  //Checking if the user is admin
  if($admin){
    print_r('
    <div class="advice w3-hide" id="advicedelete">
    <p>¿Deseas borrar la editorial?</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmDelete">Sí</button></br>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackDelete">No</button>
    </div>
    <div class="advice w3-hide" id="adviceupdate">
    <p>¿Deseas actualizar los datos de la editorial?</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmUpdate">Sí</button></br>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackUpdate">No</button>
    </div>
    <div class="advice w3-hide" id="advice">
    <p>¡No puedes borrar una editorial que tenga libros asociados!</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="closeAdvice">OK</button></br>
   
    </div>
        <div class="admin tbo-cream w3-padding-large">
          <h1 class="titles">Administración de editoriales</h1>
          ');
            print_r("
            <div class='w3-responsive'>
            <table class='w3-table w3-bordered w3-hoverable w3-table-all'>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Email</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>");
            //Showing all the publishers and creating the form to change the data. Also we add two bottons with functions to update and delete
            for ($i = 0; $i < count($publis); $i++){
            print_r("<tr>
              <td>".$publis[$i]['ID_PUBLISHER']."</td>
              <td><input class='w3-input w3-border' name='name_".$publis[$i]['ID_PUBLISHER']."' id='name_".$publis[$i]['ID_PUBLISHER']."' type='text' value='".$publis[$i]['NAME']."'></td>
              <td><input class='w3-input w3-border' name='address_".$publis[$i]['ID_PUBLISHER']."' id='address_".$publis[$i]['ID_PUBLISHER']."' type='text' value='".$publis[$i]['ADDRESS']."'></td>
              <td><input class='w3-input w3-border' name='phone_".$publis[$i]['ID_PUBLISHER']."' id='phone_".$publis[$i]['ID_PUBLISHER']."' type='text' value='".$publis[$i]['PHONE']."'></td>
              <td><input class='w3-input w3-border' name='email_".$publis[$i]['ID_PUBLISHER']."' id='email_".$publis[$i]['ID_PUBLISHER']."' type='email' value='".$publis[$i]['EMAIL']."'></td>
              <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='updatePublisher(\"".$publis[$i]['ID_PUBLISHER']."\")'>Actualizar</button></td>
              <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='deletePublisher(\"".$publis[$i]['ID_PUBLISHER']."\")'>X</button></td>
            </tr>");
            }
            print_r("</table>
            </div>
        </div>");
  } else {
    print_r('<div class="admin tbo-cream w3-padding-large">
      <h1 class="titles">Zona restringida</h1>
      <p>A esta parte de la web solo pueden entrar usuarios administradores</p>
    </div>');
  }

?>