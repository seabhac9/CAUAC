<?php 
	include("classes/seguridad.php");
	require_once('classes/conexionDB.php');
	//error_reporting(E_ALL);

	$conn = new ConexionDB;
	$conn->conectarDB();

	$cedula = $_SESSION["cedula"];

	$sql = "SELECT cedula, CONCAT(nombres ,' ',apellidos) as nombreCompleto FROM usuarios";
	$retval = mysql_query( $sql, $conn->getConexionDB() );
	
?>
<h2 class="orange">Crear Foro</h2>
<ul class="nav nav-pills ">
<li role="presentation"><a onclick="redirectCreaforo()">Crear Foro</a></li>
</ul>

<form id="foroForm" class="form-horizontal">
  <div class="form-group">
    <label for="titleForo" class="col-sm-2 control-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="titleForo" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="textForo">Contenido</label>
    <textarea class="form-control" name="contentForo" id="textForo" rows="15" placeholder="Contenido"></textarea>
	<input type="file" name="fileElem" id="fileElem" style="display:none" onchange="handleFile(this.files)"/>
	<button id="fileSelect">Adjuntar Archivo</button> <div id="fileList">¡No se han seleccionado archivos!</div>

	<div class="col-sm-2">
		<h3 class="text-primary">Agregar a:</h3>
	</div>
	<div id="users" class="col-sm-2">
	<?php
  		while($row = mysql_fetch_assoc($retval))
		{
			echo "<div class='checkbox'><label><input id='check" . $row['cedula'] . "' type='checkbox' value='" . $row['cedula'] . "'>" . $row['nombreCompleto'] . "</label></div>";
		}
	?>
	
	</div>	
  </div>
<button type="submit" class="btn btn-primary" onClick="publicarForo();">Publicar</button>

<button type="button" class="btn btn-warning">Limpiar</button>

</form> 
