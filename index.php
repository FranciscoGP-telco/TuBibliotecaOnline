<!DOCTYPE html>
<html lang="es">
<head>
	<title>DWEC06_formulario</title>
	<meta charset="UTF-8">
	<meta name="author" content="García Pozo, Francisco">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/w3.css">	
</head>
<body>
  <main>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right w3-animate-left" id="mySidebar">
  <button class="w3-bar-item w3-large" id="closeButton">☰</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" id="menuButton">☰</button>
  <div class="w3-container">
    <h1>My Page</h1>
  </div>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     

	<div class="w3-container w3-light-blue">
		<h5>Píe de página</h5>
	</div>
  </main>
	<script charset="UTF-8" src="js/menu.js"></script>
</body>
</html>