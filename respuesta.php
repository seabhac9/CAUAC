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
    
    $conn->desconectarDB();
  ?>
    <h2 class="orange"> Responder <?php echo $row['titulo']?></h2>
		<ul class="redactMenu nav nav-pills ">  
		  <li role="presentation"><a onClick="enviarRespuesta('<?php echo $row['emisor']?>','<?php echo $row['receptor']?>','<?php echo $row['titulo']?>');">Responder</a></li> 
		</ul>
        Mensaje de Respuesta:<br>
        <textarea id="txtRespuesta" class="form-control" rows="8" required placeholder='...'></textarea>
        <br>
        Mensaje Recibido:<br>
        <textarea id="txtAnterior" class="form-control" rows="8" required placeholder='Respuesta' disabled>__________________________
        <?php echo $row['contenido'] ?></textarea>

