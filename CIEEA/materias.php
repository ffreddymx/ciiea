<?php
error_reporting(0);
include 'capa.php';
include 'save_objeto.php';
include("tablasUniver/cuerpo.php");

$idalu = $_GET["gr"];

$view = new stdClass();
$view->tabla2 =Aprende::getProfesor();
$view->mates =Aprende::getMaterias();
$view->tareas =Aprende::getTareas();


//$conexion = new  mysqli($server,$user,$pass,$db);
?>

<?php include 'header.php'?>
<?php include 'elnav.php'?>

    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

<p class="lead" style="margin-top: 0px" >Calificaciones del alumno</p> <hr class="my-1" >
    <div  align="right" style="margin-bottom: 5px; margin-top: 0px;">
      <a  class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
     Agregar materias
   </a>
<a  class="btn btn-warning" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
     Nueva Materia
   </a>

  <a  class="btn btn-danger" href="calificacion_pdf.php?idalu=<?php echo $idalu  ?>" >
     Imprimir
   </a>

    </div>



<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Actividad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form name="form" action="nuevo_objeto.php" method="post" >
       <input type="hidden" name="opc" id="opc" value="">
       <input type="hidden" name="idx" id="idx" value="">
       <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >

<h2>Confirme si desea eliminar la activiad ?</h2>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Eliminar Actividad</button>
                </div>
              </div>
            </form>
            </div>
          </div>




    <div class="collapse" id="collapseExample" style="margin-bottom: 10px; margin-top: 10px;">
      <div class="card card-body">
          <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
              <form name="form" action="nuevo_objeto.php" method="post" >
                 <input type="hidden" name="opc" id="opc" value="3">
                 <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >
             </div></div>     

              <div class="col-sm-3">
                <div class="form-group">
              <select class="form-control" id="materia" name="materia" required="" >
                   <option selected disabled >Materia</option>
                     <?php    foreach ($view->mates as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['Materia'] ?></option>
                      <?php } ?>  
              </select>
            </div></div>
             <div class="col-sm-3">
                <div class="form-group">
                 <button type="submit" class="btn btn-info">Guardar</button>
                 <a  class="btn btn-danger" data-toggle="collapse" href="#collapseExample">Cancelar</a>
               </div></div>  
           </form>
</div></div></div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actividades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form name="form" action="nuevo_objeto.php" method="post" >
       <input type="hidden" name="opc" id="opc" value="5">
       <input type="hidden" name="opcx" id="opcx" >
       <input type="hidden" name="IDxx" id="IDxx" >
       <input type="hidden" name="IDac" id="IDac" >
       <input type="hidden" name="IDma" id="IDma" >
       <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >


            <select class="form-control "  name="periodo" id="periodo" >
              <option selected>Periodo...</option>
              <?php 
              for ($i=1; $i <= 3 ; $i++) { 
              echo "<option value='$i'>$i</option> ?>";
              } ?>

            </select>
              <br>

              <select class="form-control"  name="actividad" id="actividad">
                   <option selected>Seleccione la actividad</option>
                 <?php    foreach ($view->tareas as $value) { ?>
                    <option value="<?php echo $value['Tarea'] ?>"><?php echo $value['Tarea'] ?></option>
                  <?php } ?>  
              
               </select>


              <br>
            <select class="form-control "  name="nota" id="nota" >
              <option selected>Calificación...</option>
              <?php 
              for ($i=0; $i <= 10 ; $i++) { 
              echo "<option value='$i'>$i</option> ?>";
              } ?>

            </select>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar Actividad</button>
                </div>
              </div>
            </form>
            </div>
          </div>






    <div class="collapse" id="collapseExample2" style="margin-bottom: 10px; margin-top: 10px;">
      <div class="card card-body">
          <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
              <form name="form" action="nuevo_objeto.php" method="post" >
                 <input type="hidden" name="opc" id="opc" value="21">
                 <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >
             </div></div>     

              <div class="col-sm-3">
                <div class="form-group">

             <input type="text" class="form-control" id="materia" name="materia" placeholder="Nombre de la materia..." required >

            </div></div>
             <div class="col-sm-3">
                <div class="form-group">
                 <button type="submit" class="btn btn-info">Guardar</button>
                 <a  class="btn btn-danger" data-toggle="collapse" href="#collapseExample2">Cancelar</a>
               </div></div>  
           </form>




</div></div>
</div>

            <?php

            echo "<table class='table table-sm table-hover'  >";//iniciamos la tabla
            tablacuerpo::DTablalink4("SELECT I.id,M.id as M, Nombre_Alumno,M.Materia,GA.Nombre_Grupo,GA.Ciclo
              FROM alumno as A 
              inner join grupo as GA on GA.id = A.Id_Grupo
              inner join inscrito as I on A.No_Alumno=I.idalumno 
              inner join materias as M on M.id = I.idmateria
              where A.No_Alumno = $idalu ",1,$conexion);
             ?>
            </tbody>
            </table>


<h3 >Evaluación</h3>

<ul class="nav nav-tabs" >
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Periodo 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Periodo 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Periodo 3</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class=" tab-pane active"><br>
      <h3 style="margin-top: 0px;" >Periodo 1</h3>

            <?php
            echo "<table class='table table-sm table-hover'  >";//iniciamos la tabla
            tablacuerpo::DTablalink5(" SELECT A.id,M.Materia,A.Actividad,A.Periodo, A.Nota as Calificacion 
                                        from actividades as A 
                                        inner join materias as M on M.id = A.idmateria
                                        where A.idalumno = $idalu and A.Periodo=1",1,$conexion,1,$idalu);
           
             ?>
            


            </tbody>
            </table>


    </div>
    <div id="menu1" class=" tab-pane fade"><br>
      <h3>Periodo 2</h3>
            <?php
            echo "<table class='table table-sm table-hover'  >";//iniciamos la tabla
            tablacuerpo::DTablalink5(" SELECT A.id,M.Materia,A.Actividad,A.Periodo, A.Nota as Calificacion 
                                        from actividades as A 
                                        inner join materias as M on M.id = A.idmateria
                                        where A.idalumno = $idalu and A.Periodo=2",1,$conexion,2,$idalu);
             ?>
            
            </tbody>
            </table>
    </div>


    <div id="menu2" class=" tab-pane fade"><br>
      <h3>Periodo 3</h3>

            <?php
            echo "<table class='table table-sm table-hover'  >";//iniciamos la tabla
            tablacuerpo::DTablalink5(" SELECT A.id,M.Materia,A.Actividad,A.Periodo, A.Nota as Calificacion 
                                        from actividades as A 
                                        inner join materias as M on M.id = A.idmateria
                                        where A.idalumno = $idalu and A.Periodo=3",1,$conexion,3,$idalu);
             ?>
            
            </tbody>
            </table>




    </div>
  </div>


    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



      <script>
      $(document).ready(function(){


          $(document).on('click','a[data-role=evaluacion]',function(){

                var id  = $(this).data('id');
                var actividad  = $('#'+id).children('td[data-target=Actividad]').text();
                var nota  = $('#'+id).children('td[data-target=Calificacion]').text();
                var periodo  = $('#'+id).children('td[data-target=Periodo]').text();
                var idma  = $('#'+id).children('td[data-target=M]').text();

                var opc = 25;
                $('#actividad > option[value="'+actividad+'"]').attr('selected', 'selected');
                $('#nota > option[value="'+nota+'"]').attr('selected', 'selected');
                $('#periodo > option[value="'+periodo+'"]').attr('selected', 'selected');

                $('#opcx').val(opc);
                $('#IDac').val(id);

          });


          $(document).on('click','a[data-role=calificar]',function(){
                var id  = $(this).data('id');
                var idma  = $('#'+id).children('td[data-target=M]').text();
                $('#IDxx').val(id);
                $('#IDma').val(idma);
          });


          $(document).on('click','a[data-role=incidenciaxx]',function(){
                var id  = $(this).data('id');
                var idma  = $('#'+id).children('td[data-target=M]').text();
                $('#IDxxx').val(id);
                $('#IDmaa').val(idma);
          });

          $(document).on('click','a[data-role=eliminareva]',function(){
                var id  = $(this).data('id');
                var opc = 26;

                $('#idx').val(id);
                $('#opc').val(opc);

          });


    });
    </script>

