<?php
include 'capa.php';
include("tablasUniver/cuerpo.php");


$alumno = "SELECT * FROM alumno";
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
                           Calificaciones del Grupo
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="Calificaciones.php">Atras</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Listas de Calificaciones
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

    <?php

     $grupo = $_GET['id'];

        echo "<table class='table table-sm table-hover' >";//iniciamos la tabla
        tablacuerpo::DTablalink2("SELECT A.No_Alumno as id,Nombre_Grupo,Turno,Nombre_Alumno,Nombre as Profesor 
            FROM grupo as G 
            inner join alumno as A on A.Id_Grupo=G.id
            inner join maestro as M on M.Id_Maestro=G.Id_Maestro where G.id=$grupo",1,$conexion);
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
<?php
                if(isset($_POST['crearlista']))
                {
               $No_Alumno= rand();
               $Id_Grupo= rand();
               $Nombre_Alumno =$_POST["NombreA"];
               
               
               $insertarDatos = "INSERT INTO alumno VALUES('$No_Alumno','$Id_Grupo','$Nombre_Alumno')";

               $ejecutarInsertar = mysqli_query($conexion,$insertarDatos);
               if(!$ejecutarInsertar){
                   echo"Error";
               }
                }    
                ?>
