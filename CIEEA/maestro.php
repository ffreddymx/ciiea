<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");
include 'save_objeto.php';


$grupo = "SELECT * FROM grupo";

$view = new stdClass();
$view->grupo =Aprende::getGrupos();

?>
<?php include 'header.php'?>
<?php include 'elnav.php'?>

    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Profesores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="inicio.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Profesores
                            </li>
                        </ol>
                    </div>
                </div>



   <div  align="right" style="margin-bottom: 0px; margin-top: 0px;">
      <a class="btn btn-primary mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
     Agregar profesor
   </a>
    </div>

    <div class="collapse" id="collapseExample" style="margin-bottom: 10px; margin-top: 10px;">
      <div class="card card-body">
          <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                <form name="form" action="nuevo_objeto.php" method="post" >
                  <input type="hidden" name="opc" value="6" id="opc">
                  <input type="hidden" name="idprofesor"  id="idprofesor">
                  <label >Profesor</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" required >
              </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                  <label >Email</label>
                  <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" required >
              </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                  <label >Contraseña</label>
                  <input type="text" class="form-control" id="pass" name="pass" placeholder="Contraseña" required >
              </div>
            </div>


      <div class="col-sm-3">
                                  <label ></label>
            <div class="form-group">
         <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                         <a  class="btn btn-danger" data-toggle="collapse" href="#collapseExample">Cancelar</a>

           </form>
       </div>
     </div>
</div></div></div>



<div class="collapse" id="BorrarProfe" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body">
  <form action="nuevo_objeto.php" method="post" >
    <input type="hidden" name="opc" value="18">
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar el profesor ?
  <input type="hidden" name="ID" id="ID" class="form-control">
</div>
         <button id="BorrarProfe" type="submit" class="btn btn-danger">Eliminar profesor</button>
         <a   data-toggle="collapse" href="#BorrarProfe" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>


            
                </div>	

    <?php
        echo "<table class='table table-sm table-hover' >";//iniciamos la tabla
        tablacuerpo::DTablaprofesor("SELECT Id_Maestro as id, Nombre, Correo, Contraseña FROM maestro ",1,$conexion);
         ?>
        </tbody>
    </table>
            </div>
           <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



 <script>


      $(document).ready(function(){
        //  Se agregan la compra de las llantas updateLLanta
          $(document).on('click','a[data-role=myModAlumno]',function(){

                var id  = $(this).data('id');
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var correo  = $('#'+id).children('td[data-target=Correo]').text();
                var pass  = $('#'+id).children('td[data-target=Contraseña]').text();

                var opc = 7

                $('#opc').val(opc);
                $('#nombre').val(nombre);
                $('#correo').val(correo);
                $('#pass').val(pass);
                $('#idprofesor').val(id);

          });


         $(document).on('click','a[data-role=BorrarProfe]',function(){
                var id  = $(this).data('id');
                $('#ID').val(id);
          });




    });


    </script>




</body>
</html>
