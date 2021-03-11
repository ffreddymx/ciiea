<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");

$profesor =  $_SESSION["idprofe"];

$grupo = "SELECT * FROM grupo";
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'?>
<?php include 'elnav.php'?>

    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Calificaciones
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Calificaciones por grupo
                            </li>
                        </ol>
                    </div>
                </div>

             
                </div>  


    <?php
$CantidadMostrar=7;


if($_SESSION['tipo']==1){

                    // Validado de la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =$conexion->query("SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo ");
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
  //Consulta SQL
  $consultavistas ="SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo 
                LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=$conexion->query($consultavistas);

    echo "<table id='foo' class='table table-sm table-hover'  >";//iniciamos la tabla
    tablacuerpo::DTablalink11("$consultavistas ",1,$conexion);
    echo " </tbody></table>";
    require_once 'paginador.php';
}
 else {
                        // Validado de la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =$conexion->query("SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo ");
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
  //Consulta SQL
  $consultavistas ="SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo 
                LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=$conexion->query($consultavistas);

    echo "<table id='foo' class='table table-sm table-hover'  >";//iniciamos la tabla
    tablacuerpo::DTablalink11("$consultavistas ",1,$conexion);
    echo " </tbody></table>";
    require_once 'paginador.php';
 }




  ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
