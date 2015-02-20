<?php 
    include("classes/seguridad.php");
    require_once('classes/conexionDB.php');
    //error_reporting(E_ALL);

    $conn = new ConexionDB;
    $conn->conectarDB();

    // $cedula = $_SESSION["cedula"];
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM mensajes WHERE codigo = $codigo" ;
    $retval = mysql_query( $sql, $conn->getConexionDB() );
    $row = mysql_fetch_assoc($retval);    
    
  ?>
    <h2 class="orange"><?php echo $row['titulo']?></h2>
		<ul class="redactMenu nav nav-pills ">  
		  <li role='presentation'><a onClick="redirectResponder(<?php echo $row['codigo'] ?>);">Responder</a></li>
		  <li role='presentation'><a onClick="eliminarMensaje(<?php echo $row['codigo'] ?>); " >Eliminar</a></li>  
          <li role='presentation'><?php if($row['archivo'] != "") echo "<a class='btn btn-success btn-lg' href='uploads/" . $row['archivo'] . "' download>Descargar Archivo</a>"; ?>
		</ul>	
    <textarea id="txtAnterior" class="form-control" rows="8" required placeholder='Respuesta' disabled>
    <?php echo $row['contenido'] ?></textarea>	

