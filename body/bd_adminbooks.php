<?php
  require_once('php_includers/db_connection.php');
  //Getting all the books
  $books = DB::getAllBooks();
  //Checking if the user is admin
  if($admin){
    print_r('
    <div class="advice w3-hide" id="advicedelete">
    <p>¿Deseas borrar el libro?</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmDelete">Sí</button></br>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackDelete">No</button>
    </div>
    <div class="advice w3-hide" id="adviceupdate">
    <p>¿Deseas actualizar los datos del libro?</p>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmUpdate">Sí</button></br>
    <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackUpdate">No</button>
    </div>
        <div class="admin tbo-cream w3-padding-large">
          <h1 class="titles">Administración de libros</h1>
          ');
            print_r("<table class='w3-table w3-bordered w3-hoverable'>
            <tr>
              <th>ISBN</th>
              <th>Título</th>
              <th>Género</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>");
            //Showing all the authors and creating the form to change the data. Also we add two bottons with functions to update and delete
            for ($i = 0; $i < count($books); $i++){
            print_r("<tr>
              <td>".$books[$i]['ISBN']."</td>
              <td><input class='w3-input w3-border' name='name_".$books[$i]['ISBN']."' id='name_".$books[$i]['ISBN']."' type='text' value='".$books[$i]['NAME']."'></td>
              <td><input class='w3-input w3-border' name='genre_".$books[$i]['ISBN']."' id='genre_".$books[$i]['ISBN']."' type='text' value='".$books[$i]['GENRE']."'></td>
              <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='updateBook(\"".$books[$i]['ISBN']."\")'>Actualizar</button></td>
              <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='deleteBook(\"".$books[$i]['ISBN']."\")'>X</button></td>
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