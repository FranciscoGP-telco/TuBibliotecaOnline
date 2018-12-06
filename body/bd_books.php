<?php
  require_once('php_includers/db_connection.php');
?>

<div class="addBook tbo-cream w3-padding-large">
        <h1 class="titles">Busqueda de libros</h1>
      <div class="w3-row-padding">
				<div class="w3-third">
					<label for="titleSearch">Título a buscar: </label>
				</div>
				<div class="w3-third">
					<input class="w3-input w3-border" name="titleSearch" type="text" id="titleSearch">
				</div>
				<div class="w3-third">
					<button type="button" class="w3-button w3-round tbo-mint w3-block"  id="searchBooks">Buscar</button>
				</div>
      </div>
      <div id="searchBooksResults" class="w3-row-padding">
      <table id ="searchBooksTable" class="w3-table w3-bordered">

      </table>
    <div>
    <p class="normalTextCenter">¿Aun no has encontrado el libro que buscas? <a href="addbook.php">¡Añadelo aquí!</a></p>

    </div>