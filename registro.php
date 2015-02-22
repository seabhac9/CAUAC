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

 <?php

/** Validate captcha */
session_start();

if (!empty($_REQUEST['captcha'])) {
  if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
    $captcha_message = "<p class='bg-danger'> Invalid captcha</p>";
    // $style = "background-color: #FF606C";
  } 
  else {
    $captcha_message = "Valid captcha";
    $style = "background-color: #CCFF99";
    header("Location: classes/registrar.php?name=" . $_POST['name'] . "&lastName=" . $_POST['lastName'] . "&cedula=" . $_POST['cedula'] . "&bussines=" . $_POST['bussines'] . "&user=" . $_POST['user'] . "&pass=". $_POST['pass']);
  }
}
?>
</head>
<body>
    <div id="register_content">
    <a href="index.php"><img class="img_login" src="img/cauac.jpg"></a>

            <form class="form-horizontal indexform"  method="POST" >         
              <div class="form-group">
                <h2 class="login_text">Registro</h2> 
                <!-- <label for="name">Nombres</label> -->
                <input type="text" class="form-control" id="name" name="name" required="required" placeholder="Nombres" value="<?php if( isset($_POST['name']) ) echo $_POST['name']; else echo'';  ?>">
              </div>
              <div class="form-group">
                <!-- <label for="lastName">Apellidos</label> -->
                <input type="text" class="form-control" id="lastName" name="lastName" required="required" placeholder="Apellidos" value="<?php if( isset($_POST['lastName']) ) echo $_POST['lastName']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="cedula">Cédula</label> -->
                <input type="number" class="form-control" id="cedula" name="cedula" required="required" placeholder="Cédula" value="<?php if( isset($_POST['cedula']) ) echo $_POST['cedula']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="bussines">Empresa</label> -->
                <input type="text" class="form-control" id="bussines" name="bussines" required="required" placeholder="Empresa" value="<?php if( isset($_POST['bussines']) ) echo $_POST['bussines']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="cargo">Cargo</label> -->
                <input type="text" class="form-control" id="cargo" name="cargo" required="required" placeholder="Cargo" value="<?php if( isset($_POST['cargo']) ) echo $_POST['cargo']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="email">Email</label> -->
                <input type="email" class="form-control" id="email" name="email" required="required" placeholder="Correo@electronico" value="<?php if( isset($_POST['email']) ) echo $_POST['email']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="tel">Teléfono</label> -->
                <input type="tel" class="form-control" id="tel" name="tel" required="required" placeholder="Teléfono" value="<?php if( isset($_POST['tel']) ) echo $_POST['tel']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="user">Usuario</label> -->
                <input type="text" class="form-control" id="user" name="user" required="required" placeholder="Usuario" value="<?php if( isset($_POST['user']) ) echo $_POST['user']; else echo'';  ?>">
              </div>
              <div class="form-group">                
                <!-- <label for="pass">Contraseña</label> -->
                <input type="password" class="form-control" id="pass" name="pass" required="required" placeholder="Contraseña">
              </div> 
              <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Póliticas de habeas data</h4>
      </div>
      <div class="modal-body">
        Curabitur efficitur leo vitae mi rhoncus, ac placerat augue tincidunt. Donec sit amet dolor eu massa sodales mattis sit amet vel nunc. Sed mollis felis id elit porttitor, eget rhoncus enim fermentum. Quisque ullamcorper interdum sapien, non finibus ante semper eget. Pellentesque vulputate purus quis nisl feugiat, eget mattis ex tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis purus porta, commodo ligula sed, tincidunt nisi. Sed rhoncus nisl eu eros volutpat faucibus. In at commodo diam. Cras vehicula ligula non sapien cursus, sit amet dictum turpis faucibus. Suspendisse in mollis quam. Cras facilisis metus nec sollicitudin maximus. Proin tristique metus posuere, aliquet velit id, volutpat justo. Ut scelerisque magna id nisi sagittis, eget molestie lorem accumsan. Morbi nisl leo, viverra ultricies lorem at, tempor consectetur massa. Donec non magna placerat, auctor sem quis, semper erat.
        Curabitur efficitur leo vitae mi rhoncus, ac placerat augue tincidunt. Donec sit amet dolor eu massa sodales mattis sit amet vel nunc. Sed mollis felis id elit porttitor, eget rhoncus enim fermentum. Quisque ullamcorper interdum sapien, non finibus ante semper eget. Pellentesque vulputate purus quis nisl feugiat, eget mattis ex tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis purus porta, commodo ligula sed, tincidunt nisi. Sed rhoncus nisl eu eros volutpat faucibus. In at commodo diam. Cras vehicula ligula non sapien cursus, sit amet dictum turpis faucibus. Suspendisse in mollis quam. Cras facilisis metus nec sollicitudin maximus. Proin tristique metus posuere, aliquet velit id, volutpat justo. Ut scelerisque magna id nisi sagittis, eget molestie lorem accumsan. Morbi nisl leo, viverra ultricies lorem at, tempor consectetur massa. Donec non magna placerat, auctor sem quis, semper erat.
        Curabitur efficitur leo vitae mi rhoncus, ac placerat augue tincidunt. Donec sit amet dolor eu massa sodales mattis sit amet vel nunc. Sed mollis felis id elit porttitor, eget rhoncus enim fermentum. Quisque ullamcorper interdum sapien, non finibus ante semper eget. Pellentesque vulputate purus quis nisl feugiat, eget mattis ex tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis purus porta, commodo ligula sed, tincidunt nisi. Sed rhoncus nisl eu eros volutpat faucibus. In at commodo diam. Cras vehicula ligula non sapien cursus, sit amet dictum turpis faucibus. Suspendisse in mollis quam. Cras facilisis metus nec sollicitudin maximus. Proin tristique metus posuere, aliquet velit id, volutpat justo. Ut scelerisque magna id nisi sagittis, eget molestie lorem accumsan. Morbi nisl leo, viverra ultricies lorem at, tempor consectetur massa. Donec non magna placerat, auctor sem quis, semper erat.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>
              <a class="text-sucess" style='cursor:pointer;' data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;Dando click en Registrar usted acepta nuestra política de habeas data</a><br /><br />
             
<?php
if (!empty($_REQUEST['captcha'])) {
    $request_captcha = htmlspecialchars($_REQUEST['captcha']);

    echo <<<HTML
        <div id="result">
          <h2>$captcha_message</h2>
        </div>
HTML;
    unset($_SESSION['captcha']);
}

?>
<p class="text-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>&nbsp;Digite la siguiente palabra:</p>
<img src="captcha.php" id="captcha" /><br/>
<!-- CHANGE TEXT LINK -->   

<input type="text" name="captcha" id="captcha" autocomplete="off" required /><br/> <br />
<a class='btn btn-default' onclick="document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">¿No es legible? Cambie la Palabra</a><br/><br/>
 <button type="submit" class="btn btn-primary">Registrar</button>          
             
                         
            </form>

            </div>
            </body>
</html>
        
