<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");
include 'save_objeto.php';

$profesor =  $_SESSION["idprofe"];

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
                           Escuela
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="inicio.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Escuelas
                            </li>
                        </ol>
                    </div>
                </div>



   <div  align="right" style="margin-bottom: 0px; margin-top: 0px;">
      <a class="btn btn-primary mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
     Agregar escuela
   </a>
    </div>

    <div class="collapse" id="collapseExample" style="margin-bottom: 10px; margin-top: 10px;">
      <div class="card card-body">
          <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                <form name="form" action="nuevo_objeto.php" method="post" >
                  <input type="hidden" name="opc" value="28" id="opc">
                  <input type="hidden" name="idalumno"  id="idalumno">
                  <label >Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la escuela" required >
              </div>
            </div>

            <div class="col-sm-3">
            <label >Domicilio</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" required >
             </div> 

            <div class="col-sm-3">
            <label >C.C.T:</label>
                  <input type="text" class="form-control" id="cct" name="cct" placeholder="C.C.T" required >

              </div>

            <div class="col-sm-3">
            <label >Zona</label>
                  <input type="text" class="form-control" id="zona" name="zona" placeholder="Zona" required >

              </div>

            <div class="col-sm-3">
            <label >Municipio</label>
                  <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" required >

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


<div class="collapse" id="BorrarAlu" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body">
  <form action="nuevo_objeto.php" method="post" >
    <input type="hidden" name="opc" value="29">
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar la escuela ?
  <input type="hidden" name="ID" id="ID" class="form-control">
</div>
         <button id="BorrarAlu" type="submit" class="btn btn-danger">Eliminar escuela</button>
         <a   data-toggle="collapse" href="#BorrarAlu" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>

            
   </div>	


    <?php
$CantidadMostrar=7;
                    // Validado de la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =$conexion->query("SELECT * from escuela ");
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
  //Consulta SQL
  $consultavistas ="SELECT * from escuela
                LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=$conexion->query($consultavistas);

    echo "<table id='foo' class='table table-sm table-hover'  >";//iniciamos la tabla
    tablacuerpo::maestros("$consultavistas ",1,$conexion);
    echo " </tbody></table>";
    require_once 'paginador.php';
  ?>

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
                var nombre  = $('#'+id).children('td[data-target=Nombre_Alumno]').text();
                var grupo  = $('#'+id).children('td[data-target=id_grupo]').text();
                var curp  = $('#'+id).children('td[data-target=CURP]').text();

                var opc = 2

                $('#opc').val(opc);
                $('#nombre').val(nombre);
                $('#idalumno').val(id);
                $('#curp').val(curp);

              $('#grupo > option[value="'+grupo+'"]').attr('selected', 'selected');
          });


         $(document).on('click','a[data-role=BorrarEscuela]',function(){
                var id  = $(this).data('id');
                $('#ID').val(id);
          });

    });
    </script>
</body>
</html>
