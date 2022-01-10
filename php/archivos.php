<?php
include "conexion.php";
$idAutor = "";

$resultado = $conexion->query(
  "select id,titulo,contenido,digital,imagen,fechas from documentos order by id"
) or die("$conexion->error");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adm-Archivos</title>

  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/adminlte.css">
  <link rel="stylesheet" href="../recursos/estilos.css">
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
        url("../img/logo1.0.png") bottom  left fixed;
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

<body >

    <div class="container">
    <a href="../index.html"><h1 class="text-center text-shadow mt-2 mb-5 p-3 shadow text-dark mx-auto">Pfae - Garantía Juvenil - Archivo Juan Negrín</h1></a>

      <!-- Main content -->
      <div class="content">
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
                <th class="text-center"><i class="fas fa-images"></i></th>
                <th >id</th>
                <th>Título</th>
                <th>contenido</th>
                <th>Copia Digital</th>
                <th>fechas</th>
                <th><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus text-sm"></i>&nbsp;&nbsp;&nbsp;Insertar
              </button></th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                while ($f = mysqli_fetch_array($resultado)) {
                ?>
                  <td>
                    <img src="../images/<?php echo $f['imagen']; ?>" width="50px" alt="<?php echo $f['imagen']; ?>">
                  </td>
                  <td><?php echo $f['id']; ?></td>
                  <td><?php echo $f['titulo']; ?></td>
                  <td><?php echo $f['contenido']; ?></td>
                  <td><?php echo $f['digital']; ?></td>
                  <td><?php echo $f['fechas']; ?></td>
                  <td>
                    <button class="btn btn-primary btn-small btnEditar" data-id="<?php echo $f['id']; ?>" data-titulo="<?php echo $f['titulo']; ?>" data-contenido="<?php echo $f['contenido']; ?>" data-digital="<?php echo $f['digital']; ?>" data-imagen="<?php echo $f['imagen']; ?>" data-fechas="<?php echo $f['fechas']; ?>" data-toggle="modal" data-target="#modalEditar">
                      <i class="fa fa-edit text-md"></i>
                    </button>

                    <button class="btn btn-danger btn-small btnEliminar" data-id="<?php echo $f['id']; ?>" data-toggle="modal" data-target="#modalEliminar">
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
              </div>
      <!-- /.content -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="./insertarDoc.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar Documento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" placeholder="titulo del documento" class="form-control" required><br />
                <label for="contenido">Contenido</label>
                <input type="text" name="contenido" id="contenido" placeholder="Contenido del documento" class="form-control" required><br />
                <label>Copia digital</label><br/>
                <div class="form-check">
                  <label class="form-check-label" for="si">Si</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="digital" id="si" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="form-check-label" for="no">No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="digital" id="no" value="0">
                </div>
                <br/>
                <label for="imagen">Seleccione digitalización </label><br />
                <input type="file" name="imagen" id="imagen" placeholder="Imagen" ><br /><br />
                <label for="fechas">Fechas </label>
                <input type="text" name="fechas" id="fechas" class="form-control" required>
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
          <form action="./editarDoc.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditarLabel">Editar Documento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
              <input type="hidden" id="idEdit" name="id">
                <label for="tituloEdit">Título</label>
                <input type="text" name="titulo" id="tituloEdit" placeholder="titulo del documento" class="form-control" required><br />
                <label for="contenidoEdit">Contenido</label>
                <input type="text" name="contenido" id="contenidoEdit" placeholder="Contenido del documento" class="form-control" required><br />
                <label>Copia digital</label><br/>
                <div class="form-check"">
                  <label class="form-check-label" for="siEdit">Si</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="digital" id="siEdit" value="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="form-check-label" for="noEdit">No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="digital" id="noEdit" value="0">
                </div>
                <br/>
                <label for="imagenEdit">Seleccione digitalización </label><br />
                <input type="file" name="imagen" id="imagenEdit"  ><br /><br />
                <label for="fechasEdit">Fechas </label>
                <input type="text" name="fechas" id="fechasEdit" placeholder="Fechas del documento" class="form-control" required>
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
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar Documento</h5>
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

  </div>
  <!-- ./wrapper -->

  <script src="../js/jquery-3.3.1.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/adminlte.min.js"></script> 
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
          url: './eliminarDoc.php',
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
        var titulo = $(this).data('titulo');
        var contenido = $(this).data('contenido');
        var copiadigital = $(this).data('digital');
        var fechas = $(this).data('fechas');
        var imagen = $(this).data('imagen');
        $("#idEdit").val(idEditar);
        $("#tituloEdit").val(titulo);
        $("#contenidoEdit").val(contenido);
        if(copiadigital){
          alert("si");
          $("#siEdit").prop("checked", true);
        }else{
          alert("no");
          $("#noEdit").prop("checked", true);
        }
        $("#fechasEdit").val(fechas);
        $("#imagenEdit").val(imagen);
        
      })
    });
  </script>
</body>

</html>