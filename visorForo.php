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
    <iframe class="embed-responsive-item" width="420" height="315" src="https://www.youtube.com/embed/WeYsTmIzjkw" frameborder="0" allowfullscreen></iframe>
    </div>  
    <p><img class="img-responsive img-foro img-circle" src="uploads/<?php echo $row['archivo'] ?>"></p>
    <p><?php echo $row['contenido'] ?></p>  
    <hr> 
    <fieldset>
        <legend>Lucia</legend>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel dignissim diam, sed tincidunt ipsum. 
        Cras imperdiet lobortis tortor eget auctor. Sed varius eleifend justo a pretium. Vivamus vulputate nisl 
        a tempus euismod. Sed ullamcorper nibh in est cursus, vestibulum molestie ligula consectetur. 
        In libero est, venenatis a vestibulum varius, feugiat nec mauris. Praesent condimentum mauris metus, vel 
        tempus quam tempor eu. Vivamus eget leo eu purus egestas ultrices. Mauris ac tellus id leo laoreet accumsan. 
        Donec volutpat lacinia nunc ac egestas. Pellentesque suscipit ante tellus.
    </fieldset>
    <br>
    <fieldset>
        <legend>Roberto</legend>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel dignissim diam, sed tincidunt ipsum. 
        Cras imperdiet lobortis tortor eget auctor. Sed varius eleifend justo a pretium. Vivamus vulputate nisl 
        a tempus euismod. Sed ullamcorper nibh in est cursus, vestibulum molestie ligula consectetur. 
        In libero est, venenatis a vestibulum varius, feugiat nec mauris. Praesent condimentum mauris metus, vel 
        tempus quam tempor eu. Vivamus eget leo eu purus egestas ultrices. Mauris ac tellus id leo laoreet accumsan. 
        Donec volutpat lacinia nunc ac egestas. Pellentesque suscipit ante tellus.
    </fieldset>
    <br>
    <fieldset>
        <legend>Laura</legend>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel dignissim diam, sed tincidunt ipsum. 
        Cras imperdiet lobortis tortor eget auctor. Sed varius eleifend justo a pretium. Vivamus vulputate nisl 
        a tempus euismod. Sed ullamcorper nibh in est cursus, vestibulum molestie ligula consectetur. 
        In libero est, venenatis a vestibulum varius, feugiat nec mauris. Praesent condimentum mauris metus, vel 
        tempus quam tempor eu. Vivamus eget leo eu purus egestas ultrices. Mauris ac tellus id leo laoreet accumsan. 
        Donec volutpat lacinia nunc ac egestas. Pellentesque suscipit ante tellus.
    </fieldset>
    <br>
    <br>
    <textarea id="txtComment" class="form-control" rows="10"></textarea>
    <button type="submit" class="btn btn-primary" onClick="comentarForo();">Comentar</button>
    <button type="button" class="btn btn-warning">Limpiar</button>  	
	
