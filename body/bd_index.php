<?php
  require_once('php_includers/db_connection.php');
  $popularBooks = DB::getPopularBooks();
  //Charging the first img of the books
  if(isset($popularBooks[0])){
    $imgroute = "img/".$popularBooks[0]['ISBN'].".png";
  }
  //Checking if the user is logged
  if(isset($_COOKIE["login"])){
    $USER = $_COOKIE["login"];
    $recientBooks = DB::getRecientBooks($USER);
    
    print_r('
    <div class="w3-container tbo-cream">
    <h1 class="titles">Mis novedades</h1>
  </div>
  <div class="w3-container w3-section">
    <div class="w3-row">
      <div class="w3-container w3-quarter">
      ');
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
      print_r('
      </div>
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
        </div>
      ');
    } else {
      print_r('    <div class="addBook tbo-cream w3-padding-large">
      <p> Para ver tus libros recientes debes loguearte. Hazlo <a href="login.php">aquí</a></p>
      </div>
      ');
    }
?>

      <div class="w3-container w3-section tbo-cream">
        <h1 class="titles">Libros populares</h1>
      </div>
      <div class="w3-container w3-section">
        <div class="w3-row">
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[0]['ISBN'])){
            if(!file_exists("img/".$popularBooks[0]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$popularBooks[0]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[0]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[0]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[0]['ISBN']."\">");
              print_r ("<p>".$popularBooks[0]["TITLE"]."</p></a>");
            } else {
              print_r ("<p>¡No has añadido aún ningún libro!</p>");
            }
          ?>
          </div>
          <div class="w3-container w3-quarter">
            <?php if (isset($popularBooks[1]['ISBN'])){
            if(!file_exists("img/".$popularBooks[1]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$popularBooks[1]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[1]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[1]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[1]['ISBN']."\">");
              print_r ("<p>".$popularBooks[1]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[2]['ISBN'])){
            if(!file_exists("img/".$popularBooks[2]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$popularBooks[2]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[2]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[2]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[2]['ISBN']."\">");
              print_r ("<p>".$popularBooks[2]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[3]['ISBN'])){
            if(!file_exists("img/".$popularBooks[3]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$popularBooks[3]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[3]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[3]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[3]['ISBN']."\">");
              print_r ("<p>".$popularBooks[3]["TITLE"]."</p></a>");
          }?>
          </div>
        </div> 
      </div>
