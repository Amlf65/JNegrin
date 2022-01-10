<?php

include "conexion.php";

if(isset($_POST['id']) &&
isset($_POST['titulo']) &&
isset($_POST['contenido']) &&
isset($_POST['digital']) &&
isset($_POST['fechas'])
   ){

        if($_FILES['imagen']['name']!=''){
            $carpeta="../images/";
            $nombre=$_FILES['imagen']['name'];

            $temp=explode('.',$nombre);
            $extension=end($temp);
            $nombreFinal=time().'.'.$extension;


            if($extension=='jpg' || $extension=='png'){
                if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreFinal)){
                    
                    
                    $fila=$conexion->query("select imagen from documentos where id=".$_POST['id']);
                    $id=mysqli_fetch_row($fila);
                    if(file_exists($carpeta.$id[0])){
                        unlink(($carpeta.$id[0]));
                    }
                    $conexion->query("update documentos set
                        imagen ='".$nombreFinal."' where id=".$_POST['id'])or die($conexion->error); 
                }
            }else{
                header('Location: ./archivos.php?error=Imagen incorrecta (jpg o png).');
            }
               
               
        }
        //  else{
        //     header('Location: ../admin/productos.php?error=Imagen vacía.');
        // } 
    

        echo "update documentos set
        id ='".$_POST['id']."', 
        titulo ='".$_POST['titulo']."',
        contenido ='".$_POST['contenido']."',
        digital ='".$_POST['digital']."',
        fechas ='".$_POST['fechas']."'
        where id=".$_POST['id'];


        $conexion->query("update documentos set
        titulo ='".$_POST['titulo']."',
        contenido ='".$_POST['contenido']."',
        digital ='".$_POST['digital']."',
        fechas ='".$_POST['fechas']."'
        where id=".$_POST['id']) or die($conexion->error); 
        //echo "actualizado";
        header('Location: ./archivos.php?success2');
    }else{
        header('Location: ./farchivos.php?error=Campos incompletos.');
}
?>