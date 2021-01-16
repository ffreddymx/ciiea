<?php



class tablacuerpo{


            public static function DTablaprofesor($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";
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



 public static function DTablaalumno($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";
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
                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                         echo "<th width='20px'>Alumnos</th>";
                                         echo "<th width='20px'>Eliminar</th></tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas
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
        href="Listas_Asistencias.php?id=<?php echo $row["id"] ?>"   data-id="<?php echo $row["id"] ?>"><i class="fa fa-child "></i></a></td>

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


  public static function DTablalink5($a,$link,$conexion)
                {
                                    $query =  mysqli_query($conexion,$a); //parte1
                                      echo "<thead class='thead-dark'> <tr>";
                                      for($i=1;$i<mysqli_num_fields($query);$i++) 
                                      {
                                         echo "<th scope='col'>"; 
                                         print_r(mysqli_fetch_field_direct($query,$i)->name); 
                                         echo"</th>";
                                       }
                                        
                                         echo "</tr></thead><tbody>";
                                         while ($row=mysqli_fetch_assoc($query)) //finparte1
                                       {  
           echo "<tr id=".$row['id'].">"; //hacen las filas
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

               
                 <?php  }

            echo "</tr>";
                            }
            mysqli_free_result($query);
                 }





}



?>
