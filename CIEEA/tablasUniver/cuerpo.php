<?php



class tablacuerpo{


            public static function DTablaprofesor($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";

                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";


                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Editar</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2


             for($i=1;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

           <td><a data-role="myModAlumno"  aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample" data-id="<?php echo $row["id"] ?>"><i class="fa fa-edit "></i></a></td>

          <td><a data-role="BorrarProfe"  aria-controls="BorrarProfe" data-toggle="collapse" href="#BorrarProfe" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }



 public static function DTablaactividades($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";



                                      for($i=0;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Editar</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas



             for($i=0;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

           <td><a data-role="myModAlumno"  aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample" data-id="<?php echo $row["id"] ?>"><i class="fa fa-edit "></i></a></td>

          <td><a data-role="BorrarAlu"  aria-controls="BorrarAlu" data-toggle="collapse" href="#BorrarAlu" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }




 public static function ProfeGrupo($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";

                                      for($i=0;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Editar</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


             for($i=0;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

           <td><a data-role="myModAlumno"  aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample" data-id="<?php echo $row["id"] ?>"><i class="fa fa-edit "></i></a></td>

          <td><a data-role="BorrarAlu"  aria-controls="BorrarAlu" data-toggle="collapse" href="#BorrarAlu" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }



 public static function maestros($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";




                                      for($i=0;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Borrar</th>";
                                         echo "</tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


             for($i=0;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

         <td><a data-role="BorrarEscuela"  aria-controls="BorrarEscuela" data-toggle="collapse" href="#BorrarAlu" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }




 public static function DTablaalumno($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";


                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";
                                        echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,1)->name); 
                                         echo"</th>";


                                      for($i=2;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Editar</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 1)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,1)->name]); 
                                        echo "</td>"; //finparte2


             for($i=2;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

           <td><a data-role="myModAlumno"  aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample" data-id="<?php echo $row["id"] ?>"><i class="fa fa-edit "></i></a></td>

          <td><a data-role="BorrarAlu"  aria-controls="BorrarAlu" data-toggle="collapse" href="#BorrarAlu" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }


            public static function DTablalink1($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";


                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";


                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Profesor</th>";
                                         echo "<th width='20px'>Alumnos</th>";
                                         echo "<th width='20px'>Calificaciones</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2



             for($i=1;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

      <td align="center" ><a data-role="agrprofesor"  aria-controls="BorrarCliente"
        href="agr_profesor.php?id=<?php echo $row["id"]?>&g=<?php echo $row["Grupo"]?>&c=<?php echo $row["Ciclo"]?>&t=<?php echo $row["Turno"]?>"  data-id="<?php echo $row["id"] ?>"><i class="fa fa-child "></i></a></td>

      <td align="center" ><a data-role="Asistencia"  aria-controls="BorrarCliente"
        href="Listas_Asistencias.php?id=<?php echo $row["id"] ?>"   data-id="<?php echo $row["id"] ?>"><i class="fa fa-child "></i></a></td>


      <td align="center" ><a data-role="calificacion"  aria-controls="calificacionpdf"
        href="reg_calif_pdf.php?id=<?php echo $row["id"]?>&g=<?php echo $row["Grupo"]?>&c=<?php echo $row["Ciclo"]?>&t=<?php echo $row["Turno"]?>&gr=<?php echo $row["Grado"]?>"    data-id="<?php echo $row["id"] ?>"><i class="fa fa-child "></i></a></td>


         <td align="center" ><a data-role="BorrarGrupo"  aria-controls="BorrarGrupo" data-toggle="collapse" href="#BorrarGrupo" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }



            public static function DTablalink11($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";


                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";



                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Alumnos</th>";
                                         echo "</tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2


             for($i=1;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>

      <td align="center" ><a data-role="Asistencia"  aria-controls="BorrarCliente"
        href="Listas_Calificaciones.php?id=<?php echo $row["id"] ?>"   data-id="<?php echo $row["id"] ?>"><i class="fa fa-child "></i></a></td>

                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }



            public static function DTablalink2($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";

                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";



                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th>Asistencia</th><th>Calificación</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2




             for($i=1;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>
           <td><a class="btn btn-danger btn-sm"   href="lasasistencias.php?gr=<?php echo $row['id']?>" data-id="<?php echo $row["id"] ?>">Asistencia</a></td>
 
          <td><a class="btn btn-info btn-sm" href="materias.php?gr=<?php echo $row['id']?>"  data-id="<?php echo $row["id"] ?>">Calificación</a></td>               

                 <?php       }
            echo "</tr>";
                                                                            }
            mysqli_free_result($query);
                 }


                 #asistencias
            public static function DTablalink22($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";

                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";



                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th>Asistencia</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2


             for($i=1;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>
 
          <td><a class="btn btn-info btn-sm" href="lasasistencias.php?gr=<?php echo $row['id']?>"  data-id="<?php echo $row["id"] ?>">Asistencias</a></td>               

                 <?php       }
            echo "</tr>";
                                                                            }
            mysqli_free_result($query);
                 }


public static function DTablalink3($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";
                                         
                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";
                                        echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,1)->name); 
                                         echo"</th>";
                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,2)->name); 
                                         echo"</th>";

                                      for($i=2;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th>Acción</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 1)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,1)->name]); 
                                        echo "</td>"; //finparte2

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 2)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,2)->name]); 
                                        echo "</td>"; //finparte2


             for($i=2;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>
           <td><a data-role="myModCliente"  aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample" data-id="<?php echo $row["id"] ?>"><i class="fa fa-edit "></i></a></td>
                 <?php       }
            echo "</tr>";
                                                                            }
            mysqli_free_result($query);
                 }




                 public static function DTablalink4($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";
                                         
                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";
                                        echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,1)->name); 
                                         echo"</th>";


                                      for($i=2;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th>Evaluar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 1)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,1)->name]); 
                                        echo "</td>"; //finparte2

                                     // echo "</td>"; //finparte2

             for($i=2;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>


           <td><a class="btn btn-info btn-sm" data-role="calificar" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row["id"] ?>">Evaluar</a></td>

                 <?php       }
            echo "</tr>";
                                                                            }
            mysqli_free_result($query);
                 }


                 public static function lasasistencia($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";
                                         
                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";
                                        echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,1)->name); 
                                         echo"</th>";



                                      for($i=2;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th >Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2

                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 1)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,1)->name]); 
                                        echo "</td>"; //finparte2

             for($i=2;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
            if($link!=0){
          ?>


<td ><a data-role="BorrarAsis"  aria-controls="BorrarAsis" data-toggle="collapse" href="#BorrarAsis" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>


                 <?php       }
            echo "</tr>";
                                                                            }
            mysqli_free_result($query);
                 }


  public static function DTablalink5($a,$link,$conexion,$per,$idalu)
                {
                  $suma = 0;
                  $contador = 0;
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";

                                         echo "<th scope='col' style='display:none;' >"; 
                                         print_r(mysqli_fetch_field_direct($query,0)->name); 
                                         echo"</th>";

                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                        
                                         echo "<th width='20px'>Editar</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas


                                        echo "<td style='display:none;' data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, 0)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,0)->name]); 
                                        echo "</td>"; //finparte2
           
             for($i=1;$i<mysqli_num_fields($query);$i++) //parte2
                                      {
                                        echo "<td data-target='"; 
                                        print_r(mysqli_fetch_field_direct($query, $i)->name);
                                        echo "' >";
                                        print_r($row[mysqli_fetch_field_direct($query,$i)->name]); 
                                        echo "</td>"; //finparte2
                                      }
             if($link!=0){
          ?>

                    <td><a class="btn btn-info btn-sm" data-role="evaluacion" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row["id"] ?>"><i class="fa fa-edit "></i></a></td>

                    <td><a class="btn btn-info btn-sm" data-role="eliminareva" data-toggle="modal" data-target="#exampleModal2" data-id="<?php echo $row["id"] ?>"><i class="fa fa-trash "></i></a></td>

                 <?php       }
            echo "</tr>";

                            $suma = $suma + $row['Calificacion'];
                            $contador += 1;
                            $promedio = number_format($suma/$contador,2);



        if($per == 1)
        $result  = mysqli_query($conexion, "UPDATE alumno SET Prom1='$promedio' WHERE No_Alumno='$idalu' ");

        if($per == 2)
        $result  = mysqli_query($conexion, "UPDATE alumno SET Prom2='$promedio' WHERE No_Alumno='$idalu' ");

        if($per == 3)
        $result  = mysqli_query($conexion, "UPDATE alumno SET Prom3='$promedio' WHERE No_Alumno='$idalu' ");

                            }

    //mysqli_close($conexion);

            echo "<tr><td></td><td></td>
             <td align='right'>Prmedio General</td><td>".number_format($suma/$contador,2)."</td></tr>  ";

            mysqli_free_result($query);
                 }





}



?>
