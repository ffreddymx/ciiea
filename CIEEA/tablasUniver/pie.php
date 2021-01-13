<?php


/*
tabla universal
ESta funcion coloca la suma al final de cada tabla
Esta tabla se ajista con ayuda de la columna orden de la tabla productos de la BD
se debe ajustar la variable 
x punto inicial del producto que va iniciar de acuerdo a orden
ultimodato es el ultimo de orden
y $t400+$t110+2 se suma o resta segun el caso la cantidad de productos
$ultimodato+1 se suma o resta
*/

class tablapiemoney{
    
    public static function DTabla($a,$titulo,$ncolum,$t400,$t110)
     {//ncolum empuja la cantidad de celdas a la derecha
        $query =  mysql_query($a);
      
        $aux=3;  //iniciamo con el primer producto     
                        echo "<thead>";
                        echo "</thead>";
                        //aqui inicia el cuerpo de la tabla el contenido
                        echo "<tbody>";
            // $i=$aux;
                 echo "<tr>"; //hacen las filas
                 echo "<th colspan='".$ncolum."' ><b>".$titulo."</th>";// aqui se lee en columnas
                // echo "<td align='right'>-</td>";// aqui se lee en columnas

        while ($row=mysql_fetch_assoc($query) ) {  //qui me genera las filas el cuerpo de la tabla el array
                
                for($x=$aux;$x<=$t400+$t110+2; $x++){ //$x<=$t400+$t110+2 incremento de dos para sumar todos productos abajo

                  if($row["orden"]!=$x) // recuerda orden inicia en uno en tabla bodega
                 echo "<th align='right'>-</th>";// aqui se lee en columnas
                else{ 
                            $ultimodato = $row["orden"];
                            echo "<th align='right'><b>".$row["paquetes"]."</th>";// aqui se lee en columnas
                            $aux=$x+1;
                            break; 
                 }
               } 
        }    
                /*Teermino de dibujar las columnas de la tabla con columna vacias*/
                  for ($i=$ultimodato+1; $i <=$t400+$t110 ; $i++) { 
                           echo "<th align='right'>-</th>";
                           }

        mysql_free_result($query);
    }
}


/*ESTA FUNCION ES LA MISMA DE LA DE ARRIBA PERO EXCLUSIVO PARA LOS PAQUETES
LA DE ARRIBA PARA COLOCAR CANTIDADES DE SUBT Y TOTALES*/

class tablapiepakt{
    
    public static function DTabla($a,$titulo,$ncolum,$t400,$t110)
     {//ncolum empuja la cantidad de celdas a la derecha
        $query =  mysql_query($a);
      
        $aux=3;  //iniciamo con el primer producto    
                 /*Inicias con el numero de orden de la tabla blodega 3 corresponde al orden del producto
                 y es cacao grando 400 si agregas nuevos productos cambia el numero del producto*/ 
                        echo "<thead>";
                        echo "</thead>";
                        //aqui inicia el cuerpo de la tabla el contenido
                        echo "<tbody>";
            // $i=$aux;
                 echo "<tr>"; //hacen las filas
                 echo "<th colspan='".$ncolum."' ><b>".$titulo."</th>";// aqui se lee en columnas
                // echo "<td align='right'>-</td>";// aqui se lee en columnas

        while ($row=mysql_fetch_assoc($query) ) {  //qui me genera las filas el cuerpo de la tabla el array
                
                for($x=$aux;$x<=$t400+$t110+2; $x++){ //$t400+$t110+2 se incremnta 2 para sumar todos los productos abajo

                  if($row["orden"]!=$x) // recuerda orden inicia en uno en tabla bodega
                 echo "<th align='right'>-</th>";// aqui se lee en columnas
                else{ 
                            $ultimodato = $row["orden"];
                            echo "<th align='right'><b>".converpiezatopak($row["paquetes"],$row["contenido"])."</th>";// aqui se lee en columnas
                            $aux=$x+1;
                            break; 
                 }
               } 
        }    
                /*Teermino de dibujar las columnas de la tabla con columna vacias*/
                  for ($i=$ultimodato-1; $i <=$t400+$t110 ; $i++) { 
                           echo "<th align='right'>-</th>";
                           }

        mysql_free_result($query);
    }
}



?>
