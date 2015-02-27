<?php 
    include("classes/seguridad.php");
    require_once('classes/ConexionDB.php');
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
		<form id="mensajeForm">
        <ul class="redactMenu nav nav-pills ">  
		  <li role="presentation"><button type="submit" class="btn btn-primary" onClick="enviarRespuesta();">Responder</button></li> 
          <li role="presentation">
            <input type="file" name="fileElem" id="fileElem" style="display:none" onchange="handleFile(this.files)"/>
            <button type="button" class="btn-info" id="fileSelect">Adjuntar Archivo</button>
          <div id="fileList">¡No se han seleccionado archivos!</div>
        </li>
		</ul>
        Mensaje de Respuesta:<br>
        <textarea id="txtRespuesta" class="form-control" rows="8" required placeholder='...'></textarea>
        <input type="file" name="fileElem" id="fileElem" style="display:none" onchange="handleFile(this.files)"/>
    <ul class="redactMenu nav nav-pills "> 
        <li role="presentation"><button type="button" class="btn-info" id="fileSelect">Adjuntar Archivo</button></li>
    </ul>
    <div id="fileList">¡No se han seleccionado archivos!</div>
        <br>
        Mensaje Recibido:<br>
        <textarea id="txtAnterior" class="form-control" rows="8" required placeholder='Respuesta' disabled>__________________________
        <?php echo $row['contenido'] ?></textarea>
            Mensaje de Respuesta:<br>
            <textarea id="txtRespuesta" class="form-control" rows="8" required placeholder='...'></textarea>
            <br>
            Mensaje Recibido:<br>
            <textarea id="txtAnterior" class="form-control" rows="8" required placeholder='Respuesta' disabled>__________________________
            <?php echo $row['contenido'] ?></textarea>
            <input type="hidden" name="emisor" id="emisor" value="<?php echo $row['emisor']?>">
            <input type="hidden" name="receptor" id="receptor" value="<?php echo $row['receptor']?>">
            <input type="hidden" name="titulo" id="titulo" value="<?php echo $row['titulo']?>">
           
        </form>


