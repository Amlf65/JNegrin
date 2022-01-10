<?php
include "conexion.php";

if(!isset($_POST['currens'])){
    $t_currens="";
} else{
    $t_currens=$_POST['currens'];
}
if(!isset($_POST['encabezamiento'])){
    $t_encabezamiento="";
} else{
    $t_encabezamiento=$_POST['encabezamiento'];
}
if(!isset($_POST['titulo'])){
    $t_titulo="";
} else{
    $t_titulo=$_POST['titulo'];
}
if(!isset($_POST['subtitulo'])){
    $t_subtitulo="";
} else{
    $t_subtitulo=$_POST['subtitulo'];
}
if(!isset($_POST['edicion'])){
    $t_edicion="";
} else{
    $t_edicion=$_POST['edicion'];
}
if(!isset($_POST['lugar'])){
    $t_lugar="";
} else{
    $t_lugar=$_POST['lugar'];
}
if(!isset($_POST['editorial'])){
    $t_editorial="";
} else{
    $t_editorial=$_POST['editorial'];
}
if(!isset($_POST['anno'])){
    $t_anno="";
} else{
    $t_anno=$_POST['anno'];
}
if(!isset($_POST['paginas'])){
    $t_paginas="";
} else{
    $t_paginas=$_POST['paginas'];
}
if(!isset($_POST['ilustraciones'])){
    $t_ilustraciones="";
} else{
    $t_ilustraciones=$_POST['ilustraciones'];
}
if(!isset($_POST['longitud'])){
    $t_longitud="";
} else{
    $t_longitud=$_POST['longitud'];
}
if(!isset($_POST['deposito'])){
    $t_deposito="";
} else{
    $t_deposito=$_POST['deposito'];
}
if(!isset($_POST['isbn'])){
    $t_isbn="";
} else{
    $t_isbn=$_POST['isbn'];
}
if(!isset($_POST['apellidos_1'])){
    $t_apellidos_1="";
} else{
    $t_apellidos_1=$_POST['apellidos_1'];
}
if(!isset($_POST['nombre_1'])){
    $t_nombre_1="";
} else{
    $t_nombre_1=$_POST['nombre_1'];
}

if(!isset($_POST['apellidos_2'])){
    $t_apellidos_2="";
} else{
    $t_apellidos_2=$_POST['apellidos_2'];
}
if(!isset($_POST['nombre_2'])){
    $t_nombre_2="";
} else{
    $t_nombre_2=$_POST['nombre_2'];
}
if(!isset($_POST['apellidos_3'])){
    $t_apellidos_3="";
} else{
    $t_apellidos_3=$_POST['apellidos_3'];
}
if(!isset($_POST['nombre_3'])){
    $t_nombre_3="";
} else{
    $t_nombre_3=$_POST['nombre_3'];
}
if(!isset($_POST['serie'])){
    $t_serie="";
} else{
    $t_n_serie=$_POST['serie'];
}
if(!isset($_POST['n_serie'])){
    $t_serie="";
} else{
    $t_n_serie=$_POST['n_serie'];
}
if(!isset($_POST['notas'])){
    $t_notas="";
} else{
    $t_notas=$_POST['notas'];
}

   
echo (    "insert into libros (currens, encabezamiento,titulo,subtitulo,edicion,lugar_publicacion,editorial,anno, paginas, ilustraciones, longitud_cm, deposito_legal, isbn, apellidos_1,nombre_1,apellidos_2,nombre_2,apellidos_3,nombre_3,notas)
values( 
    '" .$t_currens. "', 
    '".$t_encabezamiento."',
    '".$t_titulo."',
    '".$t_subtitulo."',
    '".$t_edicion."',
    '".$t_lugar."',
    '".$t_editorial."',
    '".$t_anno."',
    '".$t_paginas."',
    '".$t_ilustraciones."',
    '".$t_longitud."', 
    '".$t_deposito."',
    '".$t_isbn."',
    '".$t_apellidos_1."',
    '".$t_nombre_1."',
    '".$t_apellidos_2."',
    '".$t_nombre_2."',
    '".$t_apellidos_3."',
    '".$t_nombre_3."',
    '".$t_serie."',
    '".$t_n_serie."',
    '".$t_notas."')");

$conexion->query(
    
    "insert into libros (currens, encabezamiento,titulo,subtitulo,edicion,lugar_publicacion,editorial,anno, paginas, ilustraciones, longitud_cm, deposito_legal, isbn, apellidos_1,nombre_1,apellidos_2,nombre_2,apellidos_3,nombre_3,notas)
    values( 
        '" .$t_currens. "', 
        '".$t_encabezamiento."',
        '".$t_titulo."',
        '".$t_subtitulo."',
        '".$t_edicion."',
        '".$t_lugar."',
        '".$t_editorial."',
        '".$t_anno."',
        '".$t_paginas."',
        '".$t_ilustraciones."',
        '".$t_longitud."', 
        '".$t_deposito."',
        '".$t_isbn."',
        '".$t_apellidos_1."',
        '".$t_nombre_1."',
        '".$t_apellidos_2."',
        '".$t_nombre_2."',
        '".$t_apellidos_3."',
        '".$t_nombre_3."',
        '".$t_serie."',
        '".$t_n_serie."',
        '".$t_notas."')") or die($conexion->error);
    header('Location: libros.php?success');

?>

