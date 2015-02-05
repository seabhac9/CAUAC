<?php
//vemos si el usuario y contraseña es váildo
if ($_POST["user"]=="admin" && $_POST["pass"]=="admin"){
    //usuario y contraseña válidos
    //defino una sesion y guardo datos
    session_start();
    $_SESSION["autentificado"]= "SI";
    header ("Location: ../cauac.php");
}else {
    //si no existe le mando otra vez a la portada
    header("Location: ../index.php?errorusuario=si");
}
?> 