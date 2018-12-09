<?php
  require_once('php_includers/db_connection.php');
?>

<div class="addBook tbo-cream w3-padding-large">
        <h1 class="titles">Busqueda de editoriales</h1>
      <div class="w3-row-padding">
				<div class="w3-third">
					<label for="publisherSearch">Editorial a buscar: </label>
				</div>
				<div class="w3-third">
					<input class="w3-input w3-border" name="publisherSearch" type="text" id="publisherSearch">
				</div>
				<div class="w3-third">
					<button type="button" class="w3-button w3-round tbo-mint w3-block"  id="buttonsearchpublishers">Buscar</button>
				</div>
      </div>
      <div id="searchPublishersResults" class="w3-row-padding">
      <table id ="publisherTable" class="w3-table w3-bordered">

      </table>
    <div>
    <p class="normalTextCenter">¿Aun no has encontrado la editorial que buscas? <a href="addpublishers.php">¡Añadela aquí!</a></p>

    </div>