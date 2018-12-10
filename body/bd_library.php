<?php
  //page with the library of the user
  require_once('php_includers/db_connection.php');
  //Checking if the user is logged. If not, charge and advice to login
  if(isset($_COOKIE["login"])){
    $USER = $_COOKIE["login"];
    $recientBooks = DB::getRecientBooks($USER);
    $library = DB::getUserLibrary($USER);
    if (isset($recientBooks[0])){
      $imgroute = "img/".$recientBooks[0]['ISBN'].".png";
    }
    //div with the advice to confirm delete a book from the library
    print_r('<div class="advice w3-hide" id="advicedelete">
        <p>¿Deseas borrar el libro de tu librería?</p>
        <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="confirmDelete">Sí</button></br>
        <button class="w3-button w3-tiny w3-round tbo-mint w3-block" id="rollbackDelete">No</button>
      </div>');
    print_r('
    <div class="w3-container tbo-cream">
    <h1 class="titles">Tus últimos libros añadidos:</h1>
  </div>
  <div class="w3-container w3-section">
    <div class="w3-row">
      <div class="w3-container w3-quarter">');
      //Charging the image by default if the book dont have front. Repeat for the rests of books
      if (isset($recientBooks[0]['ISBN'])){
        if(!file_exists("img/".$recientBooks[0]['ISBN'].".png")){
          $imgroute = "img/without.png";
        } else {
          $imgroute = "img/".$recientBooks[0]['ISBN'].".png";
        }
          print_r ("<a href=\"book.php?ISBN=".$recientBooks[0]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[0]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[0]['ISBN']."\">");
          print_r ("<p>".$recientBooks[0]["TITLE"]."</p></a>");
        } else {
          print_r ("<p>¡No has añadido aún ningún libro!</p>");
        }
      print_r('
      </div>
      <div class="w3-container w3-quarter ">
      ');
         if (isset($recientBooks[1]['ISBN'])){
          if(!file_exists("img/".$recientBooks[1]['ISBN'].".png")){
            $imgroute = "img/without.png";
          } else {
            $imgroute = "img/".$recientBooks[1]['ISBN'].".png";
          }
          print_r ("<a href=\"book.php?ISBN=".$recientBooks[1]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[1]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[1]['ISBN']."\">");
          print_r ("<p>".$recientBooks[1]["TITLE"]."</p></a>");
        }
      print_r('
      </div>
      <div class="w3-container w3-quarter ">
      ');
      if (isset($recientBooks[2]['ISBN'])){
        if(!file_exists("img/".$recientBooks[2]['ISBN'].".png")){
          $imgroute = "img/without.png";
        } else {
          $imgroute = "img/".$recientBooks[2]['ISBN'].".png";
        }
          print_r ("<a href=\"book.php?ISBN=".$recientBooks[2]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[2]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[2]['ISBN']."\">");
          print_r ("<p>".$recientBooks[2]["TITLE"]."</p></a>");
        }
      print_r('</div>
      <div class="w3-container w3-quarter ">
      ');
      if (isset($recientBooks[3]['ISBN'])){
          if(!file_exists("img/".$recientBooks[3]['ISBN'].".png")){
            $imgroute = "img/without.png";
          } else {
            $imgroute = "img/".$recientBooks[3]['ISBN'].".png";
          }
          print_r ("<a href=\"book.php?ISBN=".$recientBooks[3]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[3]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[3]['ISBN']."\">");
          print_r ("<p>".$recientBooks[3]["TITLE"]."</p></a>");
      }
      print_r('
      </div>
    </div> 
    <div class="addBook tbo-cream w3-padding-large">
      <h1 class="titles">Tú biblioteca completa</h1>
      ');
        //If we have titles, charge the book table
        if(isset($library[0]["TITLE"])){
          print_r("<table class='w3-table w3-bordered  w3-hoverable
          '>
          <tr>
            <th>ISBN</th>
            <th>Título</th>
            <th>Género</th>
            <th>Editorial</th>
            <th>Borrar de la biblioteca</th>
          </tr>");
          for ($i = 0; $i < count($library); $i++){
          print_r("<tr>
            <td>".$library[$i]['ISBN']."</td>
            <td><a href='book.php?ISBN=".$library[$i]['ISBN']."'>".$library[$i]['TITLE']."</a></td>
            <td>".$library[$i]['GENRE']."</td>
            <td><a href='publisher.php?ISBN=".$library[$i]['PUBLISHER']."'>".$library[$i]['PUBLISHER']."</a></td>
            <td><button class='w3-button w3-tiny w3-round tbo-mint w3-block' onclick='deleteBookLibrary(".$library[$i]['ISBN'].")'>X</button></td>
          </tr>");
          }
          print_r("</table>");
        }
        print_r('
    </div>
  </div>');
  } else {
    print_r('    <div class="addBook tbo-cream w3-padding-large">
    <p> Debes loguearte para poder ver tu biblioteca. Hazlo <a href="login.php">aquí</a></p>
    </div>
    ');
  }
  ?>