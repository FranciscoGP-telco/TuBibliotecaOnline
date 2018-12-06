<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?= isset($PageTitle) ? $PageTitle : "tuBibliotecaOnline, todos tus libros organizados"?></title>
	<meta charset="UTF-8">
	<meta name="author" content="García Pozo, Francisco">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/w3.css">	
  <link rel="stylesheet" href="css/pagedesign.css">
  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
  <script src="js/menu.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"
          integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
          crossorigin="anonymous"></script>
</head>
<body>
  <main>
    <div class="w3-top">
      <div class="w3-bar tbo-dark">
        <a href="#" class="w3-bar-item w3-button w3-hover-gray" id="menuButton">☰</a>
        <div id ="toNarrow">
          <a href="index.php" class="w3-bar-item w3-button w3-hover-gray">tuBibliotecaOnline</a>
          <a href="library.php" class="w3-bar-item w3-button w3-hover-gray">Tu biblioteca</a>
          <a href="books.php" class="w3-bar-item w3-button w3-hover-gray">Libros</a>
          <a href="authors.php" class="w3-bar-item w3-button w3-hover-gray">Autores</a>
          <a href="publishers.php" class="w3-bar-item w3-button w3-hover-gray">Editoriales</a>
        </div>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-gray" id="userButton">Desconectar</a>
      </div>
    </div>
    <div id="header-size"></div>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-animate-left w3-hide tbo-mint" id="sideBar">
     <a href="index.php" class="w3-bar-item w3-button tbo-hover-cream">Inicio</a>
     <a href="library.php" class="w3-bar-item w3-button tbo-hover-cream">Tu biblioteca</a>
     <a href="books.php" class="w3-bar-item w3-button tbo-hover-cream">Libros</a>
     <a href="authors.php" class="w3-bar-item w3-button tbo-hover-cream">Autores</a>
     <a href="publishers.php" class="w3-bar-item w3-button tbo-hover-cream">Editoriales</a>
    </div>