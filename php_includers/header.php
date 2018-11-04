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
  <script charset="UTF-8" src="js/menu.js"></script>
</head>
<body>
  <main>
    <div class="w3-top">
      <div class="w3-bar tbo-dark">
        <a href="#" class="w3-bar-item w3-button w3-hover-gray" id="menuButton">☰</a><!-- function to keep the hover color? -->
        <div id ="toNarrow">
          <a href="#" class="w3-bar-item w3-button w3-hover-gray">tuBibliotecaOnline</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-gray">Tu biblioteca</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-gray">Libros</a>
          <a href="#" class="w3-bar-item w3-button w3-hover-gray">Autores y editoriales</a>
        </div>
        <a href="#" class="w3-bar-item w3-button w3-right w3-hover-gray">usuario</a><!-- here we change this text for the user avatar (or the default one) -->
        <a href="#" class="w3-bar-item w3-button w3-right w3-hover-gray">buscar</a><!-- here we change this text for a search button -->
      </div>
    </div>
    <div id="header-size"></div>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-animate-left w3-hide tbo-mint" id="mySidebar">
      <a href="#" class="w3-bar-item w3-button tbo-hover-cream">Link 1</a>
      <a href="#" class="w3-bar-item w3-button tbo-hover-cream">Link 2</a>
      <a href="#" class="w3-bar-item w3-button tbo-hover-cream">Link 3</a>
    </div>