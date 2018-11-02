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
	<div class="w3-container w3-light-blue">
		<h1>Tienda de discos y películas</h1>
	</div>
	<div class="w3-bar w3-black">
		<button id="botonlistar" class="w3-bar-item w3-button w3-black" disabled>Listar productos</button>
		<button id="botonbuscar" class="w3-bar-item w3-button w3-black">Buscar productos</button> 
		<button id="botoninsertarpeli" class="w3-bar-item w3-button w3-black">Insertar película</button> 
		<button id="botoninsertardisco" class="w3-bar-item w3-button w3-black">Insertar Disco</button> 
	</div>
	<div id="listadoproductos" class="w3-container">
		<h2>Listar productos</h2>
		<form class="w3-container">
			<div class="w3-third">
				<label for="checktodos">Ver: </label>
				<input class="w3-radio" type="radio" name="listar" value="todos" id="checktodos" checked>
				<label>Todos</label>
			</div>
			<div class="w3-third">
				<input class="w3-radio" type="radio" name="listar" value="peliculas" id="checkpelis">
				<label>Peliculas</label>
			</div>
			<div class="w3-third">
				<input class="w3-radio" type="radio" name="listar" value="discos" id="checkdiscos">
				<label>Discos</label>
			</div>
			<div class="w3-row-padding" id="listadopeliculas">
				<h3>Películas</h3>
				<table class="w3-table-all" id="tablapeliculas">
					<thead>
						<tr class="w3-light-blue">
							<th>Título</th>
							<th>Año</th>
							<th>Num. Copias</th>
							<th>Genero</th>
							<th>Fecha Act.</th>
							<th>Director</th>
							<th>Actor</th>
							<th>Actriz</th>
							<th>Distribuidora</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="w3-row-padding" id="listadodiscos">
				<h3>Discos</h3>
				<table class="w3-table-all" id="tabladiscos">
					<thead>
						<tr class="w3-light-blue">
							<th>Título</th>
							<th>Año</th>
							<th>Num. Copias</th>
							<th>Género</th>
							<th>Fecha Act.</th>
							<th>Grupo</th>
							<th>Productora</th>
						</tr>
					</thead>
				</table>
			</div>
		</form>
	</div>
	<div id="buscarproductos" class="w3-container w3-hide">
		<h2>Buscar productos</h2>
		<form class="w3-container">
			<div class="w3-row-padding">
				<div class="w3-third">
					<label for="articulobuscar">Título a buscar: </label>
				</div>
				<div class="w3-third">
					<input class="w3-input w3-border" name="articulobuscar" type="text" id="articulobuscar">
				</div>
				<div class="w3-third">
					<button type="button" class="w3-btn w3-light-blue" id="buscar">Buscar</button>
				</div>
			</div> 
		</form>
	</div>
	<div class="w3-row-padding w3-hide" id="resultadobusqueda">
		<table class="w3-table-all" id="tablabuscar">
			<thead>
				<tr class="w3-light-blue">
					<th>Título</th>
					<th>Año</th>
					<th>Num. Copias</th>
					<th>Fecha Act.</th>
					<th>Acciones</th>
				</tr>
			</thead>
		</table>				
	</div>
	<div class="w3-row-padding w3-hide" id="detallearticulo">
		<h3 id="resultadotitulo"></h3>
		<div class="w3-half w3-container">
			<p id="resultado01" class="resultadodetalle"></p>
			<p id="resultado02" class="resultadodetalle"></p>
			<p id="resultado03" class="resultadodetalle"></p>
			<p id="resultado04" class="resultadodetalle"></p>
			<p id="resultado05" class="resultadodetalle"></p>		
		</div>
		<div class="w3-half w3-container">
			<p id="resultado06" class="resultadodetalle"></p>
			<p id="resultado07" class="resultadodetalle"></p>
			<p id="resultado08" class="resultadodetalle"></p>
			<p id="resultado09" class="resultadodetalle"></p>
		</div>
	</div>
	<div id="insertarpelicula" class="w3-container w3-hide">
	<form class="w3-container w3-card-4">
			<h2>Insertar pelicula</h2>
			<div class="w3-row">
				<div class="3-container w3-quarter">
					<label for="titulopelicula">Título: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errortitulopelicula"></span>
					<input class="w3-input w3-border" name="titulopelicula" id="titulopelicula" type="text">
					<label for="directorpelicula">Director: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errordirector"></span>
					<input class="w3-input w3-border" name="directorpelicula" id="directorpelicula" type="text">
					<label for="fechapelicula">Fecha Act.: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errorfechapelicula"></span>
					<input class="w3-input w3-border" name="fechapelicula" id="fechapelicula" type="date">

				</div>
				<div class="w3-container w3-quarter">
					<label for="aniopelicula">Año: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="erroraniopelicula"></span>
					<input class="w3-input w3-border" name="aniopelicula" id="aniopelicula" type="number">
					<label for="actorpelicula">Actor: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="erroractor"></span>
					<input class="w3-input w3-border" name="actorpelicula" id="actorpelicula" type="text">
		
				</div>
				<div class="w3-container w3-quarter">
					<label for="copiaspelicula">Numero de copias: </label><span id="numerocopiaspelicula">6</span>
					<input class="w3-input w3-border" name="copiaspelicula" id="copiaspelicula" type="range" min="1" max="10">
					<label for="actrizpelicula">Actriz: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="erroractriz"></span>
					<input class="w3-input w3-border" name="actrizpelicula" id="actrizpelicula" type="text">
				</div>
				<div class="w3-container w3-quarter">
					<label for="generopelicula">Género: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errorgeneropelicula"></span>
					<input list="generopeliculas" class="w3-input w3-border" name="generopelicula" id="generopelicula">
					<datalist id="generopeliculas">
						<option value="Comedia">
						<option value="Drama">
						<option value="Ciencia ficción">
						<option value="Documental">
						<option value="Musical">
					</datalist>
					<label for="distribuidorapelicula">Distribuidora: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errordistribuidora"></span>
					<select class="w3-input w3-border" name="distribuidorapelicula" id="distribuidorapelicula">
						<option value="una" selected>Seleccione una...</option>
						<option value="universal">Universal</option>
						<option value="warner">Warner Bros</option>
						<option value="disney">Disney</option>
						<option value="fox">Fox</option>
						<option value="vertigo">Vertigo Films</option>
					</select>
					<button type="button" class="w3-btn w3-light-blue" id="botoninsertarpelicula">Insertar película</button>							
				</div>
				<div class="w3-row">
					<h2>Resultado: </h2>
					<div class="w3-panel w3-red w3-round w3-hide" id="errorinsertarpelicula"></div>
					<div class="w3-panel w3-green w3-round w3-hide" id="resultadoinsertarpelicula"></div>
				</div>
			</div> 
		</form>
	</div>
	<div id="insertardisco" class="w3-container w3-hide">
		<form class="w3-container w3-card-4">
			<h2>Insertar Disco</h2>
			<div class="w3-row">
				<div class="3-container w3-quarter">
					<label for="titulodisco">Título: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errortitulodisco"></span>
					<input class="w3-input w3-border" name="titulodisco" id="titulodisco" type="text">
					<label for="artista">Artista: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errorartista"></span>
					<input class="w3-input w3-border" name="artista" id="artista" type="text">
				</div>
				<div class="w3-container w3-quarter">
					<label for="aniodisco">Año: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="erroraniodisco"></span>
					<input class="w3-input w3-border" name="aniodisco" id="aniodisco" type="number">
					<label for="fechadisco">Fecha Act.: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errorfechadisco"></span>
					<input class="w3-input w3-border" name="fechadisco" id="fechadisco" type="date">
				</div>
				<div class="w3-container w3-quarter">
					<label for="copiasdisco">Numero de copias: </label><span id="numerocopiasdisco">6</span>
					<input class="w3-input w3-border" name="copiasdisco" id="copiasdisco" type="range" min="1" max="10">
					<label for="productora">Productora: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errorproductora"></span>
					<select class="w3-input w3-border" name="productora" id="productora">
						<option value="una" selected>Seleccione una...</option>
						<option value="universal">Universal</option>
						<option value="warner">Warner Bros</option>
						<option value="rockestatal">Rock Estatal</option>
						<option value="epitaphrecords">Epitaph Records</option>
						<option value="malditorecords">Maldito Records</option>
					</select>
				</div>
				<div class="w3-container w3-quarter">
					<label for="generodisco">Género: </label><span class="w3-tag w3-padding w3-tiny w3-red w3-center w3-hide" id="errorgenerodisco"></span>
					<input list="generodiscos" class="w3-input w3-border" name="generodisco" id="generodisco">
					<datalist id="generodiscos">
						<option value="Rock">
						<option value="Metal">
						<option value="Ska">
						<option value="Punk">
						<option value="Pop">
					</datalist>
					<button type="button" class="w3-btn w3-light-blue" id="botonanadirdisco">Insertar Disco</button>							
				</div>
				<div class="w3-row">
					<h2>Resultado: </h2>
					<div class="w3-panel w3-red w3-round w3-hide" id="errorinsertardisco"></div>
					<div class="w3-panel w3-green w3-round w3-hide" id="resultadoinsertardisco"></div>
				</div>
			</div> 
		</form>
	</div>
	<div class="w3-container w3-light-blue">
		<h5>Pagína para la tarea DWEC06 desarrollada por Francisco García</h5>
	</div>
  </main>
	<script charset="UTF-8" src="js/articulo.js"></script>
	<script charset="UTF-8" src="js/disco.js"></script>
	<script charset="UTF-8" src="js/lista.js"></script>
	<script charset="UTF-8" src="js/pelicula.js"></script>
	<script charset="UTF-8" src="js/tienda.js"></script>
	<script charset="UTF-8" src="js/excepciones.js"></script>
	<script charset="UTF-8" src="js/formularios.js"></script>
</body>
</html>