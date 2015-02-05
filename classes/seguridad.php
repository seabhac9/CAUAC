<?php
session_start();
$var = isset ($_SESSION["autentificado"]) ;
if ($var == FALSE) {
    header ("Location: index.php");
    exit(); }
if ($var == TRUE AND $var != "SI") {
    include ("cauac.php");
    exit(); }
?>