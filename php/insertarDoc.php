<?php
include "conexion.php";

if(isset($_POST['titulo']) &&
isset($_POST['contenido']) &&
isset($_POST['digital']) &&
isset($_POST['fechas'])){
    $carpeta="../images/";
    $nombre=$_FILES['imagen']['name'];

    $temp=explode('.',$nombre);
    $extension=end($temp);
    $nombreFinal=time().'.'.$extension;
    if($extension=='jpg' || $extension=='png'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreFinal)){
            $conexion->query(
                "insert into documentos ( titulo, contenido, digital,fechas,imagen)
                values( 
                    '".$_POST['titulo']."',
                    '".$_POST['contenido']."',
                    '".$_POST['digital']."',
                    '".$_POST['fechas']."',
                    '$nombreFinal')")or die($conexion->error);
            header('Location: ./archivos.php?success');
        }else{

            header('Location: ./archivos.php?error=Error de transferencia.');
        }
    }else{
        header('Location: ./archivos.php?error=Imagen incorrecta (jpg o png).');
    }
}else{
    header('Location: ./archivos.php?error=Campos incompletos.');
}
?>