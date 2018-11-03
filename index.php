<!DOCTYPE html>
<html lang="es">
<head>
	<title>tuBibliotecaOnline, todos tus libros organizados</title>
	<meta charset="UTF-8">
	<meta name="author" content="García Pozo, Francisco">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/w3.css">	
  <link rel="stylesheet" href="css/pagedesign.css">	
</head>
<body>
  <main>
    <div class="w3-top">
      <div class="w3-bar w3-black">
        <a href="#" class="w3-bar-item w3-button" id="menuButton">☰</a>
        <div id ="toNarrow">
          <a href="#" class="w3-bar-item w3-button">tuBibliotecaOnline</a>
          <a href="#" class="w3-bar-item w3-button">Tu biblioteca</a>
          <a href="#" class="w3-bar-item w3-button">Libros</a>
          <a href="#" class="w3-bar-item w3-button">Autores y editoriales</a>
        </div>
        <a href="#" class="w3-bar-item w3-button w3-right">usuario</a><!-- here we change this text for the user avatar (or the default one) -->
        <a href="#" class="w3-bar-item w3-button w3-right">buscar</a><!-- here we change this text for a search button -->
      </div>
    </div>


    <!-- Page Content -->
    <div id="header-size"></div>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-animate-left w3-teal w3-hide" id="mySidebar">
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
    <div class="w3-teal">
      <div class="w3-container">
        <h1>My Page</h1>
      </div>
    </div>
    <div class="w3-white">
      <div class="w3-container">
        Anchura: <span id="w"></span>
        Altura: <span id="h"></span>
      </div>
    </div>

    <div class="w3-container w3-light-blue">
      <h5>Píe de página</h5>
    </div>
  </main>
	<script charset="UTF-8" src="js/menu.js"></script>
</body>
</html>