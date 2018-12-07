<?php
  require_once('php_includers/db_connection.php');
?>

<div class="addBook tbo-cream w3-padding-large">
        <h1 class="titles">Busqueda de autores</h1>
      <div class="w3-row-padding">
				<div class="w3-third">
					<label for="authorsearch">Autor a buscar: </label>
				</div>
				<div class="w3-third">
					<input class="w3-input w3-border" name="authorsearch" type="text" id="authorsearch">
				</div>
				<div class="w3-third">
					<button type="button" class="w3-button w3-round tbo-mint w3-block"  id="authorsearchbutton">Buscar</button>
				</div>
      </div>
      <div id="authorsearchresults" class="w3-row-padding">
      <table id ="authorsearchtable" class="w3-table w3-bordered">

      </table>
    <div>
    <p class="normalTextCenter">¿Aun no has encontrado al autor que buscas? <a href="addauthor.php">¡Añadelo aquí!</a></p>

    </div>