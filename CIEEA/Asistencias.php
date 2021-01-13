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

<form class="form-inline">

  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="inputPassword2" placeholder="Nombre del Grupo">

                    <select  id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Nocturna">Nocturna</option>
                    </select>

                      </div>
                      <button type="submit" class="btn btn-primary mb-2">Crear Grupo</button>
                    </form>               
                </div>	

    <?php
        echo "<table class='table table-sm table-hover' >";//iniciamos la tabla
        tablacuerpo::DTablalink1("SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo",1,$conexion);
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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>
    <script src="js/Funciones.js"></script>
    
</body>
</html>
