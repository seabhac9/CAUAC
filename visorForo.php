﻿<?php 
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
    $contenidoImagen = "";
    $contenidoVideo = "";

    if (strpos($row['videoURL'], 'www.youtube.com') !== FALSE)
       $contenidoVideo = $row['videoURL'];

    $temp = explode(".",$row['archivo']);
    if(end($temp) == "png" || end($temp) == "jpg" || end($temp) == "gif")
    {
        $contenidoImagen = "<img class='img-responsive img-foro img-circle' src='uploads/" . $row['archivo'] . "'>";
    }
    elseif (end($temp) == "pdf") {
        $contenidoImagen = "<br><a class='btn btn-success btn-lg' href='uploads/" . $row['archivo'] . "' target='_blank'>Ver Archivo " . $row['archivo'] . "</a>";
    }
    elseif ($row['archivo']!='') 
    {
        $contenidoImagen = "<br><a class='btn btn-success btn-lg' href='uploads/" . $row['archivo'] . "' download>*DESCARGAR ARCHIVO</a>";
    } 
    else {
        $contenidoImagen='';
    }    

    $sqlComentarios = "SELECT concat(u.nombres, ' ', apellidos) as nombre, fm.contenido as contenido FROM " .
           "foro_mensajes fm , usuarios u WHERE fm.cedula=u.cedula and fm.codigoForo=" . $row['codigo'] . " order by fm.fecha";
    $retvalComentarios = mysql_query( $sqlComentarios, $conn->getConexionDB() );
  ?>
    <h2 class="orange">Foros / <?php echo $row['titulo']?></h2>
    <?php 
    if ($contenidoVideo!=''){
     echo '<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="420" height="315" src="'.$contenidoVideo.'" frameborder="0" allowfullscreen></iframe>
    </div>';
    } 
    if($contenidoImagen!=''){      
    echo '<p>'.$contenidoImagen.'';} ?></p>
    <p><?php echo $row['contenido'] ?></p>  
    <hr> 
    <?php
        while($rowComentarios = mysql_fetch_assoc($retvalComentarios))
        {
            echo "<fieldset><legend>" . $rowComentarios['nombre'] ."</legend>" . $rowComentarios['contenido'] . "</fieldset><br>";
        }
    ?>
    <br>
    <textarea id="txtComment" class="form-control" rows="8"></textarea>
    <button type="submit" class="btn btn-primary" onClick="comentarForo('<?php echo $cedula ?>', '<?php echo  $codigo ?>');">Comentar</button>
    <button type="button" class="btn btn-warning">Limpiar</button>

	
