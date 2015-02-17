<?php 
    include("classes/seguridad.php");
    require_once('classes/conexionDB.php');
    //error_reporting(E_ALL);

    $conn = new ConexionDB;
    $conn->conectarDB();

    // $cedula = $_SESSION["cedula"];
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM foros WHERE codigo = $codigo" ;
    $retval = mysql_query( $sql, $conn->getConexionDB() );
    $row = mysql_fetch_assoc($retval);    
    
  ?>
    <h2 class="orange"><?php echo $row['titulo']?></h2>
    <p><?php echo $row['archivo'] ?></p>
    <p><?php echo $row['contenido'] ?></p>   


		<!-- <ul class="redactMenu nav nav-pills ">  
		  <li role='presentation'><a onClick="redirectResponder(<?php echo $row['codigo'] ?>);">Responder</a></li>
		  <li role='presentation'><a onClick="eliminarMensaje(<?php echo $row['codigo'] ?>); " >Eliminar</a></li>  
		</ul>	 -->	
	

