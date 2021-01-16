<?php
include 'save_objeto.php';
include("tablasUniver/cuerpo.php");

$idalu = $_GET["gr"];

$view = new stdClass();
$view->tabla2 =Aprende::getProfesor();
$view->mates =Aprende::getMaterias();


$server = "localhost";
$user = "root";
$pass = "";
$db = "ciiea";

$conexion = new  mysqli($server,$user,$pass,$db);

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

  <a  class="btn btn-danger" href="calificacion_pdf.php?idalu=<?php echo $idalu  ?>" >
     Imprimir
   </a>

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
       <input type="hidden" name="IDxx" id="IDxx" >
       <input type="hidden" name="IDma" id="IDma" >
       <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >

              <textarea name="actividad" class="form-control " id="validationTextarea" placeholder="Describa la actividad a evaluar..." required></textarea>
              <br>
              <select class="form-control " name="tinota" id="tinota" >
              <option selected>Evaluar la Calificación ?</option>
                <option value="C1">Calificación 1</option>
                <option value="C2">Calificación 2</option>
                <option value="C3">Calificación 3</option>
              </select>
              <br>
            <select class="form-control " id="inputGroupSelect01" name="nota" id="nota" >
              <option selected>Calificación...</option>
              <?php 
              for ($i=0; $i <= 10 ; $i++) { 
              echo "<option value='$i'>$i</option> ?>";
              } ?>

            </select>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar notas</button>
                </div>
              </div>
            </form>
            </div>
          </div>


<div class="modal fade" id="exampleIncidencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Incidencias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form name="form" action="nuevo_objeto.php" method="post" >
       <input type="hidden" name="opc" id="opc" value="10">
       <input type="hidden" name="IDxxx" id="IDxxx" >
       <input type="hidden" name="IDmaa" id="IDmaa" >
       <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >

          <div class="input-group input-group-sm mb-3">
              <textarea name="incidencia" class="form-control " id="validationTextarea" placeholder="Describa la Incidencia" required></textarea>
          </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar Incidencia</button>
                </div>
              </div>
            </form>
            </div>
          </div>




            <?php
            echo "<table class='table table-sm table-hover'  >";//iniciamos la tabla
            tablacuerpo::DTablalink4("SELECT I.id,M.id as M, Nombre_Alumno,M.Materia,GA.Nombre_Grupo,GA.Ciclo,I.Cal1,I.Cal2,I.Cal3, FORMAT(((I.Cal1+I.Cal2+I.Cal3)/3),2) as Calificacion 
              FROM alumno as A 
              inner join grupo as GA on GA.id_alumno = A.No_Alumno
              inner join inscrito as I on A.No_Alumno=I.idalumno 
              inner join materias as M on M.id = I.idmateria
              where A.No_Alumno = $idalu ",1,$conexion);
             ?>
            </tbody>
            </table>


<h5>Actividades del Alumno</h5>

            <?php
            echo "<table class='table table-sm table-hover'  >";//iniciamos la tabla
            tablacuerpo::DTablalink5(" SELECT A.id,M.Materia,A.Actividad, A.Tiponota,A.Nota as Calificacion 
                                        from actividades as A 
                                        inner join materias as M on M.id = A.idmateria
                                        where A.idalumno = $idalu ",0,$conexion);
             ?>
            </tbody>
            </table>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



      <script>
      $(document).ready(function(){


          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var apellido  = $('#'+id).children('td[data-target=Apellido]').text();
                var tutor  = $('#'+id).children('td[data-target=Tutor]').text();
                var grupo  = $('#'+id).children('td[data-target=Grupo]').text();
                var direccion  = $('#'+id).children('td[data-target=Direccion]').text();
                var idprof  = $('#'+id).children('td[data-target=idprof]').text();
                var opc = 2;

                $('#ID').val(id);
                $('#nombre').val(nombre);
                $('#apellido').val(apellido);
                $('#tutor').val(tutor);                
                $('#grupo').val(grupo);                
                $('#direccion').val(direccion);                
                $('#idprof').val(idprof);
                $('#opc').val(opc);


                $('#profesor > option[value="'+idprof+'"]').attr('selected', 'selected');
                $('#grupo > option[value="'+grupo+'"]').attr('selected', 'selected');
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

    });
    </script>

