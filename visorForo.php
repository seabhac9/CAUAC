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
    <h4>Comentario 1</h4>
    <p id="coment1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel dignissim diam, sed tincidunt ipsum. Cras imperdiet lobortis tortor eget auctor. Sed varius eleifend justo a pretium. Vivamus vulputate nisl a tempus euismod. Sed ullamcorper nibh in est cursus, vestibulum molestie ligula consectetur. In libero est, venenatis a vestibulum varius, feugiat nec mauris. Praesent condimentum mauris metus, vel tempus quam tempor eu. Vivamus eget leo eu purus egestas ultrices. Mauris ac tellus id leo laoreet accumsan. Donec volutpat lacinia nunc ac egestas. Pellentesque suscipit ante tellus.</p>
    <h4>Comentario 2</h4>
    <p id="coment2">Cras enim tellus, tincidunt vitae odio ut, posuere consectetur diam. Sed non libero eget urna semper rhoncus. Quisque dignissim sed purus eu elementum. Phasellus ultricies lectus non massa tempus, id vestibulum nulla maximus. Nam placerat interdum erat sed rutrum. Vestibulum ut tortor pretium, consequat augue luctus, viverra nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam placerat quam eu massa efficitur blandit. Mauris nec interdum lectus. Proin porttitor euismod nisi ut ullamcorper. In tempus risus felis, in accumsan ante pharetra et. Mauris id ipsum sit amet erat placerat ullamcorper sed eget sem.</p>
    <h4>Comentario 3</h4>
    <p id="coment3">Cras sagittis urna turpis, eu aliquam metus bibendum nec. Phasellus convallis sollicitudin ligula. Curabitur rutrum dolor eu laoreet fringilla. Proin sed orci vitae ipsum placerat lacinia eget vulputate purus. Cras non risus dignissim, lacinia dolor eget, rhoncus arcu. Sed eget tempor sem, et congue urna. Ut ac finibus magna. Proin sed risus placerat, lobortis ligula eget, placerat nibh. Phasellus erat ante, posuere vitae mi ut, dignissim malesuada est. Aenean sed finibus ipsum. Phasellus porta nec elit eu dapibus. Mauris imperdiet varius massa in pharetra.</p>   
    <textarea id="txtComment" class="form-control" rows="15"></textarea>
    <button type="submit" class="btn btn-primary" onClick="comentarForo();">Comentar</button>
    <button type="button" class="btn btn-warning">Limpiar</button>  	
	
