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

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="Tabla.css">


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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Alec Cornelio<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Inicio</a>
                    </li>
                    <li>
                        <a href="Asistencias.php"><i class="fa fa-fw fa-bar-chart-o"></i>Asistencias</a>
                    </li>
                    <li class="active">
                        <a href="Calificaciones.php"><i class="fa fa-fw fa-table"></i>Calificaciones</a>
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
                           Calificaciones
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="Calificaciones.php">Atras</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Calificaciones por grupo
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div id="main-container">
                    <table class="table table-hover">

<thead>
<tr>
  <th>Nombre</th><th>Asistencia</th><th>Acción</th>
</tr>
</thead>
<tr>

  <td>Alec Edgardo Hernández Cornelio</td>

  <td>Mayormente soleado</td>

  <td>Parcialmente nublado</td>

</tr>

<tr>

  <td>19°C</td>

  <td>17°C</td>

  <td>12°C</td>

</tr>

<tr>

  <td>E 13 km/h</td>

  <td>E 11 km/h</td>

  <td>S 16 km/h</td>

</tr>




</table>
</div>

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