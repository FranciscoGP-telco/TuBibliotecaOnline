<?php
  require_once('php_includers/db_connection.php');
  $result = null;
  $USER = "paquito";
  $recientBooks = DB::getRecientBooks($USER);
?>
      <div class="w3-container tbo-cream">
        <h1 class="titles">Mis novedades</h1>
      </div>
      <div class="w3-container w3-section">
        <div class="w3-row">
          <div class="w3-container w3-quarter">
            <a href="libro.php?ISBN=<?php print_r($recientBooks[0]["ISBN"]) ?>"><img src="img/<?php print_r($recientBooks[0]["ISBN"]) ?>.jpg" alt="<?php print_r($recientBooks[0]["TITLE"]) ?>" class="bookCoverSmall" id="<?php print_r($recientBooks[0]["ISBN"]) ?>">
            <p><?php print_r($recientBooks[0]["TITLE"]) ?></p></a>
          </div>
          <div class="w3-container w3-quarter">
          <a href="libro.php?ISBN=<?php print_r($recientBooks[1]["ISBN"]) ?>"><img src="img/<?php print_r($recientBooks[1]["ISBN"]) ?>.jpg" alt="<?php print_r($recientBooks[1]["TITLE"]) ?>" class="bookCoverSmall" id="<?php print_r($recientBooks[1]["ISBN"]) ?>">
            <p><?php print_r($recientBooks[1]["TITLE"]) ?></p></a>
          </div>
          <div class="w3-container w3-quarter">
            <a href="libro.php?ISBN=<?php print_r($recientBooks[2]["ISBN"]) ?>"><img src="img/<?php print_r($recientBooks[2]["ISBN"]) ?>.jpg" alt="<?php print_r($recientBooks[2]["TITLE"]) ?>" class="bookCoverSmall" id="<?php print_r($recientBooks[2]["ISBN"]) ?>">
            <p><?php print_r($recientBooks[2]["TITLE"]) ?></p></a>
          </div>
          <div class="w3-container w3-quarter">
            <a href="libro.php?ISBN=<?php print_r($recientBooks[3]["ISBN"]) ?>"><img src="img/<?php print_r($recientBooks[3]["ISBN"]) ?>.jpg" alt="<?php print_r($recientBooks[3]["TITLE"]) ?>" class="bookCoverSmall" id="<?php print_r($recientBooks[3]["ISBN"]) ?>">
            <p><?php print_r($recientBooks[3]["TITLE"]) ?></p></a>
          </div>
        </div> 
      </div>
      <div class="w3-container w3-section tbo-cream">
        <h1 class="titles">Libros populares</h1>
      </div>
      <div class="w3-container w3-section">
        <p>Aqui vendran los libros mas populares en la base datos</p>
        <p></p>
      </div>
