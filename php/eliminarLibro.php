<?php
include "conexion.php";
if(isset($_POST['id'])) {
    /* $fila=$conexion->query("select imagen from libros where id=".$_POST['id']);
    $id=mysqli_fetch_row($fila);
    if(file_exists('../images/'.$id[0])){
        unlink(('../images/'.$id[0]));
    } */
    $conexion->query("delete from libros where id=".$_POST['id']) or die($conexion->error);
    header('Location: libros.php?success');
}
