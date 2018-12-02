<?php
  require_once('php_includers/db_connection.php');
  $USER = "paquito";
  $recientBooks = DB::getRecientBooks($USER);
  $popularBooks = DB::getPopularBooks();
  $imgroute = "img/".$recientBooks[0]['ISBN'].".png";
?>
      <div class="w3-container tbo-cream">
        <h1 class="titles">Mis novedades</h1>
      </div>
      <div class="w3-container w3-section">
        <div class="w3-row">
          <div class="w3-container w3-quarter">
          <?php if (isset($recientBooks[0]['ISBN'])){
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
          ?>
          </div>
          <div class="w3-container w3-quarter ">
            <?php if (isset($recientBooks[1]['ISBN'])){
              if(!file_exists("img/".$recientBooks[1]['ISBN'].".png")){
                $imgroute = "img/without.png";
              } else {
                $imgroute = "img/".$recientBooks[1]['ISBN'].".png";
              }
              print_r ("<a href=\"book.php?ISBN=".$recientBooks[1]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[1]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[1]['ISBN']."\">");
              print_r ("<p>".$recientBooks[1]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter ">
          <?php if (isset($recientBooks[2]['ISBN'])){
            if(!file_exists("img/".$recientBooks[2]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$recientBooks[2]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$recientBooks[2]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[2]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[2]['ISBN']."\">");
              print_r ("<p>".$recientBooks[2]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter ">
          <?php if (isset($recientBooks[3]['ISBN'])){
              if(!file_exists("img/".$recientBooks[3]['ISBN'].".png")){
                $imgroute = "img/without.png";
              } else {
                $imgroute = "img/".$recientBooks[3]['ISBN'].".png";
              }
              print_r ("<a href=\"book.php?ISBN=".$recientBooks[3]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$recientBooks[3]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[3]['ISBN']."\">");
              print_r ("<p>".$recientBooks[3]["TITLE"]."</p></a>");
          }?>
          </div>
        </div> 
      </div>
      <div class="w3-container w3-section tbo-cream">
        <h1 class="titles">Libros populares</h1>
      </div>
      <div class="w3-container w3-section">
        <div class="w3-row">
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[0]['ISBN'])){
            if(!file_exists("img/".$recientBooks[0]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$recientBooks[0]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[0]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[0]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[0]['ISBN']."\">");
              print_r ("<p>".$popularBooks[0]["TITLE"]."</p></a>");
            } else {
              print_r ("<p>¡No has añadido aún ningún book!</p>");
            }
          ?>
          </div>
          <div class="w3-container w3-quarter">
            <?php if (isset($popularBooks[1]['ISBN'])){
            if(!file_exists("img/".$recientBooks[1]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$recientBooks[1]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[1]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[1]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[1]['ISBN']."\">");
              print_r ("<p>".$popularBooks[1]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[2]['ISBN'])){
            if(!file_exists("img/".$recientBooks[2]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$recientBooks[2]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[2]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[2]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[2]['ISBN']."\">");
              print_r ("<p>".$popularBooks[2]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[3]['ISBN'])){
            if(!file_exists("img/".$recientBooks[3]['ISBN'].".png")){
              $imgroute = "img/without.png";
            } else {
              $imgroute = "img/".$recientBooks[3]['ISBN'].".png";
            }
              print_r ("<a href=\"book.php?ISBN=".$popularBooks[3]['ISBN']."\" class=\"noUnder\"><img src=\"".$imgroute."\" alt=\"".$popularBooks[3]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[3]['ISBN']."\">");
              print_r ("<p>".$popularBooks[3]["TITLE"]."</p></a>");
          }?>
          </div>
        </div> 
      </div>
