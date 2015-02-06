<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>    
    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/prefix.js"></script>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <div id="register_content">
    <a href="index.php"><img class="img_login" src="img/cauac.jpg"></a>

            <form class="form-horizontal indexform" action="classes/registrar.php" method="POST">         
              <div class="form-group">
                <h2 class="login_text">Registro</h2> 
                <label for="name">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" required="required" placeholder="Nombres">
              </div>
              <div class="form-group">
                <label for="lastName">Apellidos</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required="required" placeholder="Apellidos">
              </div>
              <div class="form-group">                
                <label for="bussines">Empresa</label>
                <input type="text" class="form-control" id="bussines" name="bussines" required="required" placeholder="Empresa">
              </div>
              <div class="form-group">                
                <label for="user">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" required="required" placeholder="Usuario">
              </div>
              <div class="form-group">                
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" required="required" placeholder="Contraseña">
              </div>              
              <button type="submit" class="btn btn-primary">Registrar</button>              
            </form>

            </div>
            </body>
</html>
        
