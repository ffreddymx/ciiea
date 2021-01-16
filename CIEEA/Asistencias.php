<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");


$grupo = "SELECT * FROM grupo";


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
                           Asistencias
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Asistencias por grupo
                            </li>
                        </ol>
                    </div>
                </div>

<form class="form-inline" action="nuevo_objeto.php" method="post">
<input type="hidden" name="opc" value="16">
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" placeholder="Nombre del Grupo" name="grupo">

                    <select  id="inputState" class="form-control" name="turno">
                            <option selected>Seleccionar...</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Nocturna">Nocturna</option>
                    </select>

                      </div>
                      <button type="submit" class="btn btn-primary mb-2">Crear Grupo</button>
                    </form>               
                </div>	



<div class="collapse" id="BorrarGrupo" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body">
  <form action="nuevo_objeto.php" method="post" >
    <input type="hidden" name="opc" value="20">
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar el grupo? Los alumnos asignados al grupo se perderan.
  <input type="hidden" name="ID" id="ID" class="form-control">
</div>
         <button id="BorrarGrupo" type="submit" class="btn btn-danger">Eliminar grupo</button>
         <a   data-toggle="collapse" href="#BorrarGrupo" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>

    <?php
$CantidadMostrar=7;
                    // Validado de la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =$conexion->query("SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo");
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
  //Consulta SQL
  $consultavistas ="SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo
                LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=$conexion->query($consultavistas);

    echo "<table id='foo' class='table table-sm table-hover'  >";//iniciamos la tabla
    tablacuerpo::DTablalink1("$consultavistas ",1,$conexion);
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

         $(document).on('click','a[data-role=BorrarGrupo]',function(){
                var id  = $(this).data('id');
                $('#ID').val(id);
          });

    });


    </script>
    
</body>
</html>
