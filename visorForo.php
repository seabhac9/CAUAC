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
    <h2 class="orange">Foros <?php echo $row['titulo']?></h2>
    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<!-- aqui va la ruta del video youtube -->"></iframe>
</div>
    <p><img class="img-responsive img-foro img-circle" src="uploads/<?php echo $row['archivo'] ?>"></p>
    <p><?php echo $row['contenido'] ?></p>  
    <hr>    
    <textarea id="txtComment" class="form-control" rows="15"></textarea>
    <button type="submit" class="btn btn-primary" onClick="comentarForo();">Comentar</button>
    <button type="button" class="btn btn-warning">Limpiar</button>  	
	

