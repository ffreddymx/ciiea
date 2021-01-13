<?php
include 'capa.php';
include 'save_objeto.php';
include("tablasUniver/cuerpo.php");

$idalu = $_GET["gr"];

$view = new stdClass();
$view->tabla2 =Aprende::getProfesor();
$view->mates =Aprende::getMaterias();


?>

<?php include 'header.php'?>
<?php include 'elnav.php'?>

    <div id="wrapper">
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">


<p class="lead" style="margin-top: 0px" >Asistencias del alumno</p> <hr class="my-1" >
    <div  align="right" style="margin-bottom: 5px; margin-top: 0px;">
      <a  class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
     Agregar asistencia
   </a>

  <a  class="btn btn-danger" href="calificacion_pdf.php?idalu=<?php echo $idalu  ?>" >
     Imprimir
   </a>

    </div>



    <div class="collapse" id="collapseExample" style="margin-bottom: 10px; margin-top: 10px;">
      <div class="card card-body">
          <div class="row">

              <form name="form" action="nuevo_objeto.php" method="post" >
                 <input type="hidden" name="opc" id="opc" value="13">
                 <input type="hidden"  name="alumno" id="alumno" value="<?php echo $idalu ?>" >

      <div class="col-sm-3">
        <div class="form-group">
          <label>Fecha</label>
          <input type="date" id="fecha" name="fecha" id="fecha" class="form-control" required>
        </div>
      </div>

              <div class="col-sm-3">
                <div class="form-group">
                          <label> Asistencia </label>

              <select class="form-control " name="asistio" id="asistio" >
              <option selected>Asistio a clases ?</option>
                <option value="Asistio">Asistio</option>
                <option value="Retardo">Retardo</option>
                <option value="Falta">Falta</option>
              </select>
            </div>
          </div>

              <div class="col-sm-3">
                <div class="form-group">
                <label> Ingresar justificación </label>

                 <textarea name="justifi" id="justifi" class="form-control " id="validationTextarea" placeholder="Describa la justificación" ></textarea>
          </div>
        </div>

                 <button type="submit" class="btn btn-info">Guardar</button>
                 <a  class="btn btn-danger" data-toggle="collapse" href="#collapseExample">Cancelar</a>
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
            tablacuerpo::lasasistencia("SELECT * from asistencia ",1,$conexion);
             ?>
            </tbody>
            </table>




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