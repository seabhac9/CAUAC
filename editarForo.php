<?php 
	include("classes/seguridad.php");
	require_once('classes/ConexionDB.php');
	//error_reporting(E_ALL);

	$conn = new ConexionDB;
	$conn->conectarDB();

	$cedula = $_SESSION["cedula"];
	$codigo = $_GET["codigo"];
	$sql = "SELECT * FROM foros WHERE codigo = $codigo" ;
    $retval = mysql_query( $sql, $conn->getConexionDB() );
    $row = mysql_fetch_assoc($retval);
    $sql2 = "SELECT cedula, CONCAT(nombres ,' ',apellidos) as nombreCompleto FROM usuarios";
	$retval2 = mysql_query( $sql2, $conn->getConexionDB() );
	$row2 = mysql_fetch_assoc($retval2);
	
	
?>
<h2 class="orange">Editar Foro / <?php echo $row['titulo'] ?> </h2>
<ul class="nav nav-pills ">
</ul>

<form id="foroForm" class="form-horizontal">
  <div class="form-group">
    <label for="titleForo" class="col-sm-2 control-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="titleForo" value="<?php echo $row['titulo'] ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="textForo">Contenido</label>
    <textarea class="form-control" name="contentForo" id="textForo" rows="15" required><?php echo $row['contenido'] ?></textarea>
	<input type="file" name="fileElem" id="fileElem" style="display:none" onchange="handleFile(this.files)"/><br />
	<ul class="redactMenu nav nav-pills ">  
	  <li role="presentation"><button type="button" class="btn-info" id="fileSelect">Cambiar Archivo</button></li>
	  <li role="presentation"><button type="button" class="btn-info" id="youtubeSelect" onClick="adjuntarVideo()">Cambiar enlace Enlace Youtube</a></li>
	  <li role="presentation"><input type="text" class="form-control" id="videoURL"  value="<?php echo $row['videoURL'] ?>" style="width:350px;display:none;"></li>
    </ul>
	<div id="fileList"><?php echo $row['archivo'] ?></div>

	<div class="col-xs-3">
		<h3 class="text-primary">Agregar a:</h3>
	</div>
	<div id="users" class="col-sm-2">
	<?php
  		while($row2 = mysql_fetch_assoc($retval2))
		{
			echo "<div class='checkbox'><label><input id='check" . $row2['cedula'] . "' type='checkbox' value='" . $row2['cedula'] . "' ";
			$sqlUsuario = "SELECT codigo from foro_usuarios where codigoForo=$codigo and cedula=" . $row2['cedula'];
			$retvalUsuario = mysql_query( $sqlUsuario, $conn->getConexionDB() );
			if(mysql_num_rows($retvalUsuario) >= 1)
			 	echo "checked";

			echo " >" . $row2['nombreCompleto'] . "</label></div>";
		}
	?>
	
	</div>	
  </div>
  <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>">
<button type="submit" class="btn btn-primary" onClick="editarForo();">Terminar Edición</button>

<button type="button" class="btn btn-warning" onclick="clearCrearForo();">Limpiar</button>

</form> 
