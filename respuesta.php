<?php 
    include("classes/seguridad.php");
    require_once('classes/conexionDB.php');
    //error_reporting(E_ALL);

    $conn = new ConexionDB;
    $conn->conectarDB();

    // $cedula = $_SESSION["cedula"];
    $codigo = $_GET["respuesta"];
    $sql = "SELECT * FROM mensajes WHERE codigo = $codigo" ;
    $retval = mysql_query( $sql, $conn->getConexionDB() );
    $row = mysql_fetch_assoc($retval);    
    
  ?>
    <h2 class="orange"> Responder a <?php echo $row['titulo']?></h2>
		<ul class="redactMenu nav nav-pills ">  
		  <li role="presentation"><a href="#">Responder</a></li>		  
		</ul>
		<textarea class="form-control" rows="15"></textarea>