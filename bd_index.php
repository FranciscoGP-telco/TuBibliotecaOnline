<?php
  require_once('php_includers/db_connection.php');
  $result = null;
  $USER = "paquito";
  $recientBooks = DB::getRecientBooks($USER);
  $popularBooks = DB::getPopularBooks();
?>
      <div class="w3-container tbo-cream">
        <h1 class="titles">Mis novedades</h1>
      </div>
      <div class="w3-container w3-section">
        <div class="w3-row">
          <div class="w3-container w3-quarter">
          <?php if (isset($recientBooks[0]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$recientBooks[0]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$recientBooks[0]['ISBN'].".jpg\" alt=\"".$recientBooks[0]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[0]['ISBN']."\">");
              echo ("<p>".$recientBooks[0]["TITLE"]."</p></a>");
            } else {
              echo ("<p>¡No has añadido aún ningún book!</p>");
            }
          ?>
          </div>
          <div class="w3-container w3-quarter ">
            <?php if (isset($recientBooks[1]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$recientBooks[1]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$recientBooks[1]['ISBN'].".jpg\" alt=\"".$recientBooks[1]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[1]['ISBN']."\">");
              echo ("<p>".$recientBooks[1]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter ">
          <?php if (isset($recientBooks[2]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$recientBooks[2]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$recientBooks[2]['ISBN'].".jpg\" alt=\"".$recientBooks[2]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[2]['ISBN']."\">");
              echo ("<p>".$recientBooks[2]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter ">
          <?php if (isset($recientBooks[3]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$recientBooks[3]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$recientBooks[3]['ISBN'].".jpg\" alt=\"".$recientBooks[3]['TITLE']."\" class=\"bookCoverSmall\" id=\"recient".$recientBooks[3]['ISBN']."\">");
              echo ("<p>".$recientBooks[3]["TITLE"]."</p></a>");
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
              echo ("<a href=\"book.php?ISBN=".$popularBooks[0]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$popularBooks[0]['ISBN'].".jpg\" alt=\"".$popularBooks[0]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[0]['ISBN']."\">");
              echo ("<p>".$popularBooks[0]["TITLE"]."</p></a>");
            } else {
              echo ("<p>¡No has añadido aún ningún book!</p>");
            }
          ?>
          </div>
          <div class="w3-container w3-quarter">
            <?php if (isset($popularBooks[1]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$popularBooks[1]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$popularBooks[1]['ISBN'].".jpg\" alt=\"".$popularBooks[1]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[1]['ISBN']."\">");
              echo ("<p>".$popularBooks[1]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[2]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$popularBooks[2]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$popularBooks[2]['ISBN'].".jpg\" alt=\"".$popularBooks[2]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[2]['ISBN']."\">");
              echo ("<p>".$popularBooks[2]["TITLE"]."</p></a>");
            }?>
          </div>
          <div class="w3-container w3-quarter">
          <?php if (isset($popularBooks[3]['ISBN'])){
              echo ("<a href=\"book.php?ISBN=".$popularBooks[3]['ISBN']."\" class=\"noUnder\"><img src=\"img/".$popularBooks[3]['ISBN'].".jpg\" alt=\"".$popularBooks[3]['TITLE']."\" class=\"bookCoverSmall\" id=\"popular".$popularBooks[3]['ISBN']."\">");
              echo ("<p>".$popularBooks[3]["TITLE"]."</p></a>");
          }?>
          </div>
        </div> 
      </div>
