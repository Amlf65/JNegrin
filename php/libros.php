<?php
include "conexion.php";
// $idAutor = "";
if (isset($_GET["buscar"])) {

  // echo "<script>console.log('Busca: " . $_GET['buscar'] . "' );</script>";
  /* echo "select id, currens, encabezamiento,titulo,subtitulo,edicion,lugar_publicacion,editorial,anno,
  paginas,ilustraciones,longitud_cm,deposito_legal,isbn,apellidos_1,nombre_1,
  apellidos_2, nombre_2, apellidos_3, nombre_3, serie, n_serie, notas from libros 
  where titulo like '%".$_GET['buscar']."%' or subtitulo like '%".$_GET['buscar']."%' or isbn  like '%".$_GET['buscar']."%' or apellidos_1  like '%".$_GET['buscar']."%' or apellidos_2 like '%" .$_GET['buscar']."%' or apellidos_3 like '%" .$_GET['buscar']."%' or editorial like '%" .$_GET['buscar']."%'
  order by id"; */

  $resultado = $conexion->query(
  "select id, currens, encabezamiento,titulo,subtitulo,edicion,lugar_publicacion,editorial,anno,
  paginas,ilustraciones,longitud_cm,deposito_legal,isbn,apellidos_1,nombre_1,
  apellidos_2, nombre_2, apellidos_3, nombre_3, serie, n_serie, notas from libros 
  where titulo like '%".$_GET['buscar']."%' or subtitulo like '%".$_GET['buscar']."%' or isbn  like '%".$_GET['buscar']."%' or apellidos_1  like '%".$_GET['buscar']."%' or apellidos_2 like '%" .$_GET['buscar']."%' or apellidos_3 like '%" .$_GET['buscar']."%' or editorial like '%" .$_GET['buscar']."%'
  order by id"
  ) or die("$conexion->error");
}else{
  // echo "<script>console.log('completo' );</script>";
  $resultado = $conexion->query(
    "select id, currens, encabezamiento,titulo,subtitulo,edicion,lugar_publicacion,editorial,anno,
    paginas,ilustraciones,longitud_cm,deposito_legal,isbn,apellidos_1,nombre_1,
    apellidos_2, nombre_2, apellidos_3, nombre_3, serie, n_serie, notas from libros
    order by id"
    ) or die("$conexion->error");
}
?>
<!-- isbn apellidos_1 apellidos_2 apelllidos_3  -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adm-Libros</title>

  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="icon" type="image/svg+xml" href="../img/fjn.svg" sizes="any">

    <style>
    

      @font-face {
          font-family: pie;
          src: url("../fuentes/Cheveuxdange.ttf");
          font-weight: bolder;
      }
      @font-face {
          font-family: titulo;
          src: url("../fuentes/Canterbury.ttf");
          font-weight: bolder;
      }
      body{

          background:  url("../img/sede_juannegrin.png") fixed,
          url("../img/cabildo-de-gran-canaria-logo.png") top right fixed,
          url("../img/sce.jpg") top left fixed,
          url("../img/gj.png") bottom  right fixed,
          url("../img/logopfae.png") bottom  left fixed;
          background-repeat: no-repeat;
          background-size: cover, 10%, 10%,14%,15%;
          font-weight: bolder;

        
      }
      h5{
          font-family: pie;
          font-size:1.2vw
      }
      h1{
          font-family: titulo;
          font-size:3vw;
          text-decoration: none;
        
      }
      a{
        text-decoration:none;
      }

      thead{
          font-size:1.4em;
        }
      }

      footer{
        position: fixed;
        bottom:0;
      }
      @media only screen and (max-width: 600px) {
        body {
          padding: 0 2.5em  ;
        }
      }
      
    </style>
</head>
<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="container w-75">
    <a href="../index.html"><h1 class="text-center text-shadow mt-2 mb-5 p-3 shadow text-dark mx-auto">Pfae - Garantía Juvenil - Archivo Juan Negrín</h1></a>

      <!-- Main content -->

        <div class="container-fluid">
          <?php
          if (isset($_GET['error'])) {

          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo $_GET['error']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>

          <?php
          if (isset($_GET['success'])) {

          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              El registro se ha insertado correctamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          if (isset($_GET['success2'])) {

          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              El registro se ha actualizado correctamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <table class="table table-hover table-responsive-sm mitxt">
            <thead>
              <tr>
                <th colspan="4"><input type="text" name="busqueda" id="idbusca" class="form-control"></th>
                <th colspan="2"><button type="button" class="btn btn-primary w-100" onclick="listar()">
                <i class="fa fa-search text-lg"></i>

              </tr>
              <tr>

                <th>Título</th>
                <th>Subtítulo</th>
                <th>Editorial</th>
                <th>ISBN</th>
                <!-- <th>Autor</th> -->
                <th colspan="2"><button type="button"  class="btn btn-primary w-100" data-toggle="modal" data-target="#exampleModal" >
                <i class="fa fa-plus text-lg"></i></button></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                while ($f = mysqli_fetch_array($resultado)) {
                ?>
                    <!--<td>
                      <img src="../images/<?php echo $f['imagen']; ?>" width="50px" alt="<?php echo $f['imagen']; ?>">
                    </td> -->

                  <td><?php echo $f['titulo']; ?></td>
                  <td><?php echo $f['subtitulo']; ?></td>
                  <td><?php echo $f['editorial']; ?></td>
                  <td><?php echo $f['isbn']; ?></td>
                  <!-- <td><?php echo $f['apellidos_1'] . ",". $f['nombre_1']; ?></td> -->
                  <td>

                    <button class="btn btn-primary btn-small btnEditar w-100" data-id="<?php echo $f['id']; ?>" data-currens="<?php echo $f['currens']; ?>" data-encabezamiento="<?php echo $f['encabezamiento']; ?> "
                    data-titulo="<?php echo $f['titulo']; ?>" data-subtitulo="<?php echo $f['subtitulo']; ?>" data-edicion="<?php echo $f['edicion']; ?>" data-lugar="<?php echo $f['lugar_publicacion']; ?> " 
                    data-editorial="<?php echo $f['editorial']; ?>" data-anno="<?php echo $f['anno']; ?>" data-paginas="<?php echo $f['paginas']; ?>" data-ilustraciones="<?php echo $f['ilustraciones']; ?> " 
                    data-longitud="<?php echo $f['longitud_cm']; ?>" data-deposito="<?php echo $f['deposito_legal']; ?>" data-isbn="<?php echo $f['isbn']; ?>" data-apellidos_1="<?php echo $f['apellidos_1']; ?> " 
                    data-nombre_1="<?php echo $f['nombre_1']; ?> " data-apellidos_2="<?php echo $f['apellidos_2']; ?>" data-nombre_2="<?php echo $f['nombre_2']; ?> " data-apellidos_3="<?php echo $f['apellidos_3']; ?> "
                    data-nombre_3="<?php echo $f['nombre_3']; ?>" data-notas="<?php echo $f['notas']; ?>" data-serie="<?php echo $f['serie']; ?> " data-n_serie="<?php echo $f['n_serie']; ?> "
                    data-toggle="modal" data-target="#modalEditar">
                      <i class="fa fa-edit text-md"></i>
                    </button>
                  </td>
                  <td>
                    <button class="btn btn-danger btn-small btnEliminar w-100" data-id="<?php echo $f['id']; ?>" data-toggle="modal" data-target="#modalEliminar">
                      <i class="fa fa-trash text-md"></i>
                    </button>

                  </td>
              </tr>
            <?php
                }
            ?>
            </tbody>
          </table>
        </div>

      <!-- /.content -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="./insertarLibro.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar Libro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="currens">Nº Currens</label>
                <input type="text" name="currens" id="currens" placeholder="Nº Currens" class="form-control" ><br />
                <label for="encabezamiento">Encabezamiento</label>
                <input type="text" name="encabezamiento" id="encabezamiento" placeholder="Encabezamiento" class="form-control" ><br />
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título" class="form-control" ><br />
                <label for="subtitulo">Subtítulo</label>
                <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtítulo" class="form-control" ><br />
                <label for="edicion">Edición</label>
                <input type="text" name="edicion" id="edicion" placeholder="Nº de edición" class="form-control" ><br />
                <label for="lugar">Lugar de publicación</label>
                <input type="text" name="lugar" id="lugar" placeholder="Lugar de publicación" class="form-control" ><br />
                <label for="editorial">Editorial</label>
                <input type="text" name="editorial" id="editorial" placeholder="Editorial" class="form-control" ><br />
                <label for="anno">Año</label>
                <input type="text" name="anno" id="anno" placeholder="Año de publicación" class="form-control" ><br />
                <label for="paginas">Páginas</label>
                <input type="text" name="paginas" id="paginas" placeholder="Nº de páginas" class="form-control" ><br />
                <label for="ilustraciones">Ilustraciones</label><br />
                <input type="text" name="ilustraciones" id="ilustraciones" placeholder="Ilustraciones" class="form-control"><br /><br />
                <label for="longitud">Longitud(cm)</label>
                <input type="text" name="longitud" id="longitud" placeholder="longitud en cms" class="form-control" ><br />
                <label for="deposito">Depósito Legal</label>
                <input type="text" name="deposito" id="deposito" placeholder="Depósito Legal" class="form-control" ><br />
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" placeholder="I.S.B.N" class="form-control" ><br />
               
                <label for="apellidos_1">1-Apellidos del Autor</label>
                <input type="text" name="apellidos_1" id="apellidos_1" placeholder="Apellidos del primer autor" class="form-control" ><br />
                <label for="nombre_1">1-Nombre del Autor</label>
                <input type="text" name="nombre_1" id="nombre_1" placeholder="Nombre del primer autor" class="form-control" ><br />
                <label for="apellidos_2">2-Apellidos del Autor</label>
                <input type="text" name="apellidos_2" id="apellidos_2" placeholder="Apellidos del segundo autor" class="form-control" ><br />
                <label for="nombre_2">2-Nombre del Autor</label>
                <input type="text" name="nombre_2" id="nombre_2" placeholder="Nombre del segundo autor" class="form-control" ><br />
                <label for="apellidos_3">1-Apellidos del Autor</label>
                <input type="text" name="apellidos_3" id="apellidos_3" placeholder="Apellidos del tercer autor" class="form-control" ><br />
                <label for="nombre_3">3-Nombre del Autor</label>
                <input type="text" name="nombre_3" id="nombre_3" placeholder="Nombre del tercer autor" class="form-control" ><br />
                <label for="nombre_3">Serie</label>
                <input type="text" name="serie" id="serie" placeholder="Serie" class="form-control" ><br />
                <label for="nombre_3">Nº Serie</label>
                <input type="text" name="n_serie" id="n_serie" placeholder="Número de serie" class="form-control" ><br />
                <label for="notas">Notas</label>
                <textarea name="notas" id="notas" placeholder="de contenido, de enlace, de bibliografía ..." class="form-control"  ></textarea>
               

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="./editarLibro.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditarLabel">Editar Libro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <input type="hidden" id="idEdit" name="id">
                <label for="currensEdit">Nº Currens</label>
                <input type="text" name="currens" id="currensEdit" placeholder="Nº Currens" class="form-control" ><br />
                <label for="encabezamientoEdit">Encabezamiento</label>
                <input type="text" name="encabezamiento" id="encabezamientoEdit" placeholder="Encabezamiento" class="form-control" ><br />
                <label for="tituloEdit">Título</label>
                <input type="text" name="titulo" id="tituloEdit" placeholder="Título" class="form-control" ><br />
                <label for="subtituloEdit">Subtítulo</label>
                <input type="text" name="subtitulo" id="subtituloEdit" placeholder="Subtítulo" class="form-control" ><br />
                <label for="edicionEdit">Edición</label>
                <input type="text" name="edicion" id="edicionEdit" placeholder="Nº de edición" class="form-control" ><br />
                <label for="lugarEdit">Lugar de publicación</label>
                <input type="text" name="lugar" id="lugarEdit" placeholder="Lugar de publicación" class="form-control" ><br />
                <label for="editorialEdit">Editorial</label>
                <input type="text" name="editorial" id="editorialEdit" placeholder="Editorial" class="form-control" ><br />
                <label for="annoEdit">Año</label>
                <input type="text" name="anno" id="annoEdit" placeholder="Año de publicación" class="form-control" ><br />
                <label for="paginasEdit">Páginas</label>
                <input type="text" name="paginas" id="paginasEdit" placeholder="Nº de páginas" class="form-control" ><br />
                <label for="ilustracionesEdit">Ilustraciones</label><br />
                <input type="text" name="ilustraciones" id="ilustracionesEdit" placeholder="Ilustraciones" class="form-control"><br /><br />
                <label for="longitudEdit">Longitud(cm)</label>
                <input type="text" name="longitud" id="longitudEdit" placeholder="longitud en cms" class="form-control" ><br />
                <label for="depositoEdit">Depósito Legal</label>
                <input type="text" name="deposito" id="depositoEdit" placeholder="Depósito Legal" class="form-control" ><br />
                <label for="isbnEdit">ISBN</label>
                <input type="text" name="isbn" id="isbnEdit" placeholder="I.S.B.N" class="form-control" ><br />
                <label for="apellidos_1Edit">1-Apellidos del Autor</label>
                <input type="text" name="apellidos_1" id="apellidos_1Edit" placeholder="Apellidos del primer autor" class="form-control" ><br />
                <label for="nombre_1Edit">1-Nombre del Autor</label>
                <input type="text" name="nombre_1" id="nombre_1Edit" placeholder="Nombre del primer autor" class="form-control" ><br />
                <label for="apellidos_2Edit">2-Apellidos del Autor</label>
                <input type="text" name="apellidos_2" id="apellidos_2Edit" placeholder="Apellidos del segundo autor" class="form-control" ><br />
                <label for="nombre_2Edit">2-Nombre del Autor</label>
                <input type="text" name="nombre_2" id="nombre_2Edit" placeholder="Nombre del segundo autor" class="form-control" ><br />
                <label for="apellidos_3Edit">1-Apellidos del Autor</label>
                <input type="text" name="apellidos_3" id="apellidos_3Edit" placeholder="Apellidos del tercer autor" class="form-control" ><br />
                <label for="nombre_3Edit">3-Nombre del Autor</label>
                <input type="text" name="nombre_3" id="nombre_3Edit" placeholder="Nombre del tercer autor" class="form-control" ><br />
                <label for="nombre_3">Serie</label>
                <input type="text" name="serie" id="serieEdit" placeholder="Serie" class="form-control" ><br />
                <label for="nombre_3">Nº Serie</label>
                <input type="text" name="n_serie" id="n_serieEdit" placeholder="Número de serie" class="form-control" ><br />
                <label for="notasEdit">Notas</label>
                <textarea name="notas" id="notasEdit" placeholder="de contenido, de enlace, de bibliografía ..." class="form-control"  ></textarea>


              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar Libro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="idEdit" name="id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
          </div>
        </div>
      </div>
    </div>

  <script src="../js/jquery-3.3.1.min.js"></script>

<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- <script src="../js/adminlte.min.js"></script>  -->
<script src="../js/all.min.js"></script>

  <script>
    $(document).ready(function() {
      var idEliminar = -1;
      var idEditar = -1;
      var fila;
      $(".btnEliminar").click(function() {
        //alert("eliminar")
        idEliminar = $(this).data('id');
        fila = $(this).parent('td').parent('tr');
      });
      $(".eliminar").click(function() {
        $.ajax({
          url: './eliminarLibro.php',
          method: 'POST',
          data: {
            id: idEliminar
          }
        }).done(function(res) {
          $(fila).fadeOut(1000);
        });
      });
      $(".btnEditar").click(function() {
        //alert($(this).data('genero'))
        var idEditar = $(this).data('id');
        var ncurrens = $(this).data('currens');
        var encabezamiento = $(this).data('encabezamiento');
        var titulo = $(this).data('titulo');
        var subtitulo = $(this).data('subtitulo');
        var edicion = $(this).data('edicion');
        var lugar = $(this).data('lugar');
        var editorial = $(this).data('editorial');
        var anno = $(this).data('anno');
        var paginas = $(this).data('paginas');
        var ilustraciones = $(this).data('ilustraciones');
        var longitud = $(this).data('longitud');
        var deposito = $(this).data('deposito');
        var isbn = $(this).data('isbn');
        var apellido1 = $(this).data('apellidos_1');
        var nombre1 = $(this).data('nombre_1');
        var apellido2 = $(this).data('apellidos_2');
        var nombre2 = $(this).data('nombre_2');
        var apellido3 = $(this).data('apellidos_3');
        var nombre3 = $(this).data('nombre_3');
        var serie = $(this).data('serie');
        var n_serie = $(this).data('n_serie');
        var notas = $(this).data('notas');

        $("#idEdit").val(idEditar);
        $("#currensEdit").val(ncurrens);
        $("#encabezamientoEdit").val(encabezamiento);
        $("#tituloEdit").val(titulo);
        $("#subtituloEdit").val(subtitulo);
        $("#edicionEdit").val(edicion);
        $("#lugarEdit").val(lugar);
        $("#editorialEdit").val(editorial);
        $("#annoEdit").val(anno);
        $("#paginasEdit").val(paginas);
        $("#ilustracionesEdit").val(ilustraciones);
        $("#longitudEdit").val(longitud);
        $("#depositoEdit").val(deposito);
        $("#isbnEdit").val(isbn);
        $("#apellidos_1Edit").val(apellido1);
        $("#nombre_1Edit").val(nombre1);
        $("#apellidos_2Edit").val(apellido2);
        $("#nombre_2Edit").val(nombre2);
        $("#apellidos_3Edit").val(apellido3);
        $("#nombre_3Edit").val(nombre3);
        $("#sereieEdit").val(serie);
        $("#n_serieEdit").val(n_serie);
        $("#notasEdit").text(notas);
      
      })
    });

    function listar(){
      var texto=$("#idbusca").val();
      var miurl=location.href;
      var mipos=miurl.indexOf("?");
      // alert(miurl);
      if (mipos>0){
        miurl=miurl.slice(0,mipos);
      }
      // alert(miurl);
      if (texto==""){
        location.href = miurl.substring(0,miurl.length);
      }else{
        location.href = miurl+"?buscar="+ texto;
      }
    };
  </script>


</body>

</html>