  <?php
  /**
 * Autor: Rodrigo Chambi Q.
 * Mail:  filvovmax@gmail.com
 * web:   www.gitmedio.com
 * Script para hacer Paginacion en PHP, Mysql y HTML5
 */

     
    /*Sector de Paginacion */
    //Operacion matematica para botón siguiente y atrás 
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
  	$DecrementNum =(($compag -1))<1?1:($compag -1);

    echo "<nav aria-label='Page navigation example'>";

	echo "<ul class='pagination'><li class='page-item'><a class='page-link' href=\"?pag=".$DecrementNum."\">Atras</a></li>";
    //Se resta y suma con el numero de pag actual con el cantidad de 
    //números  a mostrar
     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
     
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
     //Se muestra los números de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
     	//Se valida la paginacion total
     	//de registros
     	if($i<=$TotalRegistro){
     		//Validamos la pag activo
     	  if($i==$compag){
           echo "<li class='page-item active'><a class='page-link' href=\"?pag=".$i."\">".$i."</a></li>";
     	  }else {
     	  	echo "<li class='page-item'><a class='page-link' href=\"?pag=".$i."\">".$i."</a></li>";
     	  }     		
     	}
     }
	echo "<li class='page-item' ><a class='page-link' href=\"?pag=".$IncrimentNum."\">Siguiente</a></li>";
  echo '</ul>';
  echo '<nav>';

?>