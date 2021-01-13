<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ciiea";

$conexion = new  mysqli($server,$user,$pass,$db);

if($conexion->connect_errno){
die ("La conexión ha fallado" . $conexion->connect_errno);
}
else{ echo "Conectado";}

$grupo = "SELECT * FROM grupo";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="grupos.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administrador</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Alec Cornelio <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li class="active">
                        <a href="Asistencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Asistencias</a>
                    </li>
                    <li>
                        <a href="Calificaciones.php"><i class="fa fa-fw fa-table"></i> Calificaciones</a>
                    </li>
                    <li>
                        <a href="Bitacora.php"><i class="fa fa-fw fa-edit"></i>Bitacora</a>
                    </li>
                    <li>
                        <a href="Reportes.html"><i class="fa fa-fw fa-desktop"></i>Reportes</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Reportes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Reportes por grupo
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="form-group"></div>
                <form action="" method="POST">
                    <div class="container-table">
                    <div class="table_title">Grupos de clases</div>
                    <div class="table_header">Grupo</div>
                    <div class="table_header">Turno</div>
                    <div class="table_header">Eliminar</div>
                    <script> function preguntarSino(){
    alertify.confirm('Eliminar Datos', '¿Estas seguro de eliminar este grupo?',
    function(){alertify.success('Ok') }
    , function(){alertify.error('Cancel')});
}</script>

                    <?php $resultado = mysqli_query($conexion,$grupo);
                    while($row=mysqli_fetch_assoc($resultado)) { ?>
                     <div class="table_item"><?php echo $row["Nombre_Grupo"]; ?> <a href="Listas_Asistencias.php">Dir</a></div>
                     <div class="table_item"><?php echo $row["Turno"]; ?></div>
                     <button class= "btn btn-warning glyphicon glyphicon-remove"
                     onclick="preguntarSino()"></button>

                         <?php } mysqli_free_result($resultado); ?>







                    </div>
        

                </form>
                </div>	

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
<?php
                if(isset($_POST['crear']))
                {
            
               $Nombre =$_POST["Nombre"];
               $Turno =$_POST["Turno"];
               $Id_Grupo= rand();
               $Id_Maestro= rand();
               
               $insertarDatos = "INSERT INTO grupo VALUES('$Id_Grupo','$Nombre','$Turno','$Id_Maestro')";

               $ejecutarInsertar = mysqli_query($conexion,$insertarDatos);
               if(!$ejecutarInsertar){
                   echo"Error";
               }
                }    
                ?>
