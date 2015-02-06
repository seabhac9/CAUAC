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
<div id="login_content">
        <img class="img_login" src="img/cauac.jpg">

        <form class="form-horizontal indexform" action="classes/control.php" method="POST">      
            <?php
                if (isset($_GET["errorusuario"])){
                    if ($_GET["errorusuario"]=="si"){
                        echo '<b>Datos incorrectos</b>';
                    }
                    else
                    {
                        echo '<b>Esperando datos</b>';
                    }
                }
            if (isset($_GET["errorusuario"])){
            if ($_GET["errorusuario"]=="si"){
            echo '<b>Datos incorrectos</b>';
            }
                else {
                    echo "esperando datos";
                }
            }
            if (isset($_GET["userExist"])){
            if ($_GET["userExist"]=="si")
                {
            echo '<b>El usuario ya existe</b>';
            }
            else{
                echo '<b>Registro satisfactorio, por favor ingrese con sus datos.</b>';
            } 
            }          
            //     else
            //     {
            // echo '<b>Esperando datos</b>';
            // }
            ?>   

            <div class="form-group">
                <h2 class="login_text">Ingreso</h2> 
                <label for="user">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" required="required" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="pass">Clave</label>
                <input type="password" class="form-control" id="pass" name="pass" required="required" placeholder="Clave">
            </div>  
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <a href="registro.php">Registrarse</a>
        </form>

    </div>
</body>
</html>
        
