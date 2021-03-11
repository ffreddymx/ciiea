<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");
include 'save_objeto.php';

$idgrupo = $_GET['id'];

$grupo = "SELECT * FROM grupo";

$view = new stdClass();
$view->grupo =Aprende::getGrupos();
$view->profesor =Aprende::getProfesor();

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
                        <h2 >
                          Grupo : <?php echo $_GET['g'] ?> 
                        </h2>
                        <h2 >
                          Turno: <?php echo $_GET['t'] ?>
                        </h2>
                        <h2 >
                          Ciclo: <?php echo $_GET['c'] ?>
                        </h2>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="Asistencias.php">Regresar</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Profesor a cargo del grupo
                            </li>
                        </ol>
                    </div>
                </div>



   <div  align="right" style="margin-bottom: 0px; margin-top: 0px;">
      <a class="btn btn-primary mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
     Agregar profesor al grupo
   </a>
    </div>

    <div class="collapse" id="collapseExample" style="margin-bottom: 10px; margin-top: 10px;">
      <div class="card card-body">
          <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                <form name="form" action="nuevo_objeto.php" method="post" >
                  <input type="hidden" name="opc" value="27" id="opc">
                  <input type="hidden" name="idgrupo"  id="idgrupo" value="<?php echo $idgrupo; ?>">
                  <input type="hidden" name="g" value="<?php echo $_GET['g'] ?>" >
                  <input type="hidden" name="t" value="<?php echo $_GET['t'] ?>" >
                  <input type="hidden" name="c" value="<?php echo $_GET['c'] ?>" >



            <div >
              <label >Profesor</label>
              <select class="form-control"  name="profesor" id="profesor">
            <option selected>Seleccione el profesor</option>
                 <?php    foreach ($view->profesor as $value) { ?>
    <option value="<?php echo $value['Id_Maestro'] ?>"><?php echo $value['Nombre']." ".$value['Correo'] ?></option>
                  <?php } ?>  
          </select>
              </div>


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


<div class="collapse" id="BorrarAlu" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body">
  <form action="nuevo_objeto.php" method="post" >
    <input type="hidden" name="opc" value="17">
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar el alumno ?
  <input type="hidden" name="ID" id="ID" class="form-control">
</div>
         <button id="BorrarAlu" type="submit" class="btn btn-danger">Eliminar alumno</button>
         <a   data-toggle="collapse" href="#BorrarAlu" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>

            
   </div>	


    <?php
$CantidadMostrar=7;

                    // Validado de la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =$conexion->query("SELECT M.Id_Maestro as id, M.Nombre,M.Correo  FROM maestro as M 
     inner join grupo as G on G.Id_Maestro=M.Id_Maestro where G.id = '$idgrupo'  ");
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
  //Consulta SQL
  $consultavistas ="SELECT M.Id_Maestro as id, M.Nombre,M.Correo  FROM maestro as M 
     inner join grupo as G on G.Id_Maestro=M.Id_Maestro where G.id = '$idgrupo'

     LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=$conexion->query($consultavistas);

    echo "<table id='foo' class='table table-sm table-hover'  >";//iniciamos la tabla
    tablacuerpo::ProfeGrupo("$consultavistas ",1,$conexion);
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


         $(document).on('click','a[data-role=BorrarAlu]',function(){
                var id  = $(this).data('id');
                $('#ID').val(id);
          });

    });
    </script>
</body>
</html>