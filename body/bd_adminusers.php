<?php
  require_once('php_includers/db_connection.php');
  $users = DB::listUsers();
  if($admin){
    print_r('
    <div class="advice w3-hide" id="advicedelete">
    <p>¿Deseas borrar el usuario?</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmDelete">Sí</button></br>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackDelete">No</button>
    </div>
    <div class="advice w3-hide" id="adviceupdate">
    <p>¿Deseas actualizar los datos del usuario?</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmUpdate">Sí</button></br>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackUpdate">No</button>
    </div>
        <div class="admin tbo-cream w3-padding-large">
          <h1 class="titles">Administración de usuarios</h1>
          ');
            print_r("<table class='w3-table w3-bordered w3-hoverable'>
            <tr>
              <th>Nick</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Tipo de usuario</th>
              <th>Email</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>");
            for ($i = 0; $i < count($users); $i++){
            print_r("<tr>
              <td>".$users[$i]['NICK']."</td>
              <td><input class='w3-input w3-border' name='name_".$users[$i]['NICK']."' id='name_".$users[$i]['NICK']."' type='text' value='".$users[$i]['NAME']."'></td>
              <td><input class='w3-input w3-border' name='subname_".$users[$i]['NICK']."' id='subname_".$users[$i]['NICK']."' type='text' value='".$users[$i]['SUBNAME']."'></td>
              <td>");
            if($users[$i]['USERTYPE'] == 'ADMIN'){
              print_r("
              <select class='w3-input w3-border' name='type_".$users[$i]['NICK']."' id='type_".$users[$i]['NICK']."'>
              <option value='ADMIN' selected='selected'>Administrador</option>
              <option value='USUARIO'>Usuario</option>
              </select>
              ");
            } else {
              print_r("
              <select class='w3-input w3-border' name='type_".$users[$i]['NICK']."' id='type_".$users[$i]['NICK']."'>
              <option value='USUARIO' selected='selected'>Usuario</option>
              <option value='ADMIN'>Administrador</option>
              </select>
              ");
            }
            print_r("  
              </td>
              <td><input class='w3-input w3-border' name='email_".$users[$i]['NICK']."' id='email_".$users[$i]['NICK']."' type='text' value='".$users[$i]['EMAIL']."'></td>
              <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='updateUser(\"".$users[$i]['NICK']."\")'>Actualizar</button></td>
              <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='deleteUser(\"".$users[$i]['NICK']."\")'>X</button></td>
            </tr>");
            }
            print_r("</table>
        </div>");
  } else {
    print_r('<div class="admin tbo-cream w3-padding-large">
      <h1 class="titles">Zona restringida</h1>
      <p>A esta parte de la web solo pueden entrar usuarios administradores</p>
    </div>');
  }

?>