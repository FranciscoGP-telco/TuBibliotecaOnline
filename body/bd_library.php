<?php
  require_once('php_includers/db_connection.php');
  if(isset($_COOKIE["login"])){
    $cookieSplit = explode(",", $_COOKIE["login"]);
    $USER = $cookieSplit[0];
    $recientBooks = DB::getRecientBooks($USER);
    $library = DB::getUserLibrary($USER);
    $imgroute = "img/".$recientBooks[0]['ISBN'].".png";
    print_r('
    <div class="w3-container tbo-cream">
    <h1 class="titles">Tus últimos libros añadidos:</h1>
  </div>
  <div class="w3-container w3-section">
    <div class="w3-row">
      <div class="w3-container w3-quarter">');
      if (isset($recientBooks[0]['ISBN'])){
        if(!file_exists("img/".$recientBooks[0]['ISBN'].".png")){
          $imgroute = "img/without.png";
        } else {
          $imgroute = "img/".$recientBooks[0]['ISBN'].".png";
        }
          print_r ("<a href=\"book.php?ISBN=".$recientBooks[0]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[0]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[0]['ISBN']."\">");
          print_r ("<p>".$recientBooks[0]["TITLE"]."</p></a>");
        } else {
          print_r ("<p>¡No has añadido aún ningún book!</p>");
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
            <td><a href='book.php?ISBN=".$library[$i]['ISBN']."'>".$library[$i]['TITLE']."</td>
            <td>".$library[$i]['GENRE']."</td>
            <td><a href='publisher.php?ISBN=".$library[$i]['PUBLISHER']."'>".$library[$i]['PUBLISHER']."</td>
            <td><a href=removefromlibrary.php?ISBN='".$library[$i]['ISBN']."'>Borrar</a></td>
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