<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");


$grupo = "SELECT * FROM grupo";
?>

<?php include 'header.php'?>
<?php include 'elnav.php'?>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Bitacora
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Bitacora por grupos
                            </li>
                        </ol>
                    </div>
                </div>

            <button type="submit" name="crear" class="btn btn-primary btn-flat">Crear Grupo</button>

                
                </div>  

    <?php
        echo "<table class='table table-sm table-hover' >";//iniciamos la tabla
        tablacuerpo::DTablalink1("SELECT id, Nombre_Grupo as Grupo,Turno FROM grupo",1,$conexion);
         ?>
        </tbody>
    </table>
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
