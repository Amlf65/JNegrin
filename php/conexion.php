<?php
    //$servidor="sql308.epizy.com";
    //$nombreBd="epiz_28715707_biblio";
    //$usuario="epiz_28715707";
    //$pass="Ytop3AqA9m";
    //$servidor="localhost";
    //$nombreBd="id17478588_pfjn";
    //$usuario="id17478588_usuario";
    //$pass="Zn82Fj(A_>Znp]AW";
    $servidor="localhost";
    $nombreBd="pfae";
    $usuario="root";
    $pass="";
    $conexion= new mysqli($servidor,$usuario,$pass,$nombreBd);
    mysqli_set_charset($conexion,"utf8");
    if($conexion->connect_error){
        die("No se pudo establecer la conexión");
    }
?>