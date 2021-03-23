        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio.php">Administrador</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["nombre"] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="inicio.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li >
                        <a href="escuela.php"><i class="fa fa-fw fa-bar-chart-o"></i> Escuela</a>
                    </li>
                    <li >
                        <a href="maestro.php"><i class="fa fa-fw fa-bar-chart-o"></i> Profesores</a>
                    </li>
                    <li >
                        <a href="alumnos.php"><i class="fa fa-fw fa-bar-chart-o"></i> Alumnos</a>
                    </li>
                    <li >
                        <a href="actividades.php"><i class="fa fa-fw fa-bar-chart-o"></i> Actividades</a>
                    </li>
                    <li >
                        <a href="Asistencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Asistencias</a>
                    </li>
                    <li>
                        <a href="Calificaciones.php"><i class="fa fa-fw fa-table"></i> Calificaciones</a>
                    </li>
                    <li>
                        <a href="calendario.php"><i class="fa fa-fw fa-edit"></i>Bitacora</a>
                    </li>
                    <li>
                        <a href="creditos.php"><i class="fa fa-fw fa-table"></i> Créditos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>