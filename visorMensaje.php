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
		  <?php echo "<li role='presentation'><a onClick='redirectResponder(" . $row['codigo'] .  ")'>Responder</a></li>"; ?>
		  <li role="presentation"><a href="#">Eliminar</a></li>  
		</ul>		
	<p><?php echo $row['contenido'] ?></p>   
