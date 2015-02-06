<?php
include("classes/seguridad.php");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>    
    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/prefix.js"></script>
    <script src="js/functions.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <div id="menu">       
       <img src="img/cauac.jpg">  
    <nav>    
        <ul class="nav nav-pills nav-stacked"> 
          <li role="presentation"  id="foros"><a>Foros</a></li>
          <li role="presentation" id="message"><a>Mensajes</a></li>
          <li role="presentation" id="redact"><a>Redactar</a></li>
          <li role="presentation" id="exit"><a>Salir</a></li>
        </ul>
        </nav>
        </div>
        <div id="content">
            <h2 class="orange">Bienvenido, <?php echo $_SESSION["nombres"] . ' ' . $_SESSION["apellidos"]; ?></h2>
        </div>
    </body>
</html>