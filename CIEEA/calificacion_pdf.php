<?php
//error_reporting(0);
require('pdf/fpdf.php');

class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

//==========================================================================                Configuracion de tablas
function Row($data,$alinea)
{
    //Calculate the height of the row
    $nb=0;
    for($i=1;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=6*$nb;//alto de la fila
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    $fill = true;
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        if($i<=0)// verifico menor que 5 para alinear las columnas
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        else // verifico si es encabezado para alinearlo a la izquierda
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border

        $this->Rect($x,$y,$w,$h);
        $this->MultiCell($w,6,$data[$i],8,$a,'true'); //aqui modifique ante 5,1
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);

    }
    //Go to the next line
    $this->Ln($h);
}

//==========================================================================                Configuracion de tablas

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

//==========================================================================             Encabezados

function Header()
{
//include 'capa.php';

$conexion = mysqli_connect('localhost' , 'root' ,'' ,'ciiea');
                  mysqli_set_charset($conexion,'utf8');


   $alumno = $_GET["idalu"];

   $cliente = "SELECT *
               from alumno
               WHERE No_Alumno ='$alumno' ";
   $cli =  mysqli_query($conexion,$cliente);
   $fil =  mysqli_fetch_array($cli);
//$mysqli -> set_charset("utf8");

   $clienteee = "SELECT *
               from escuela ";
   $cliii =  mysqli_query($conexion,$clienteee);
   $filx =  mysqli_fetch_array($cliii);


    $this->SetFont('Arial','B',12);
    $this->Cell(0,6,utf8_decode("REGISTRO DE ACTIVIDADES"),0,1,'L');
    $this->SetFont('Arial','',7);
    $this->Ln(-2);
    $this->Cell(0,6,utf8_decode("Calificación y Activiades"),0,1,'L');

    $this->SetFont('Arial','',11);
    $this->Cell(0,6,utf8_decode("Nombre de la escuela : ".$filx['Nombre']),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode("Direccion : ".$filx['Direccion']),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode("Ciudad : ".$filx['Municipio']),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode("Clave SEP : ".$filx['CCT']),0,1,'L');
    $this->Ln(2);

    $this->SetFont('Arial','B',11);
    $this->Cell(0,6,utf8_decode("ALUMNO :"),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode($fil['Nombre_Alumno']),0,1,'L');
    $this->Ln(-1);

    $this->SetFont('Arial','B',11);
    $this->SetXY(170,10);
    //if($fil["Tipo"]==1)
    //$this->Cell(30,6,"PAGO CONTADO",0,1,'C');
    //else if($fil["Tipo"]==0) $this->Cell(30,6,"PAGO CREDITO",0,1,'C');
    //else if($fil["Tipo"]==2) $this->Cell(30,6,"COTIZACION",0,1,'C');

/*
    $this->SetFont('Arial','',11);
    $this->SetXY(140,16);
    $this->Cell(30,6,"FECHA",0,1,'R');
    $this->SetXY(170,16);
    $this->Cell(30,6,$fil["Fecha"],1,1,'C');

    $this->SetXY(140,22);
    $this->Cell(30,6,"FOLIO",0,1,'R');
    $this->SetXY(170,22);
    $this->Cell(30,6,$fil["Factura"],1,1,'C');

    $this->SetXY(140,28);
    $this->Cell(30,6,"PLAZO",0,1,'R');
    $this->SetXY(170,28);
    //$this->Cell(30,6,$fil["Plazo"],1,1,'C');
    $this->Ln(30);


    $this->SetFont('Arial','B',11);
    $this->SetFillColor(1,113,185);//color blanco rgb
    $this->SetTextColor(255);
    $this->Cell(70,6,utf8_decode("CLIENTE"),1,1,'L',TRUE);

    $this->SetFillColor(255,255,255);//color blanco rgb
    $this->SetTextColor(0);
    $this->SetFont('Arial','',11);
    $this->Cell(0,6,utf8_decode($fil["Nombre"]),0,1,'L');
    $this->Cell(0,6,utf8_decode($fil["Direccion"]),0,1,'L');
    $this->Cell(0,6,utf8_decode($fil["Ciudad"]),0,1,'L');
    if (!empty($fil["Telefono"])) {$this->Cell(0,6,$fil["Telefono"],0,1,'L'); }
    if (!empty($fil["RFC"])) {$this->Cell(0,6,$fil["RFC"],0,1,'L');}
    if (!empty($fil["CP"])) {$this->Cell(0,6,$fil["CP"],0,1,'L');}
    if (!empty($fil["Email"])) {$this->Cell(0,6,$fil["Email"],0,1,'L');}

*/
}

//==========================================================================             Pie de la pagina

function Footer()
{


  $this->Ln(50);
  $this->Cell(187,10,'ATTE',0,0,'C');
  $this->Ln(5);
  $this->Cell(187,10,'',0,0,'C');
  $this->Ln(10);
  $this->Cell(187,10,'_____________________________________________',0,0,'C');
  $this->Ln(9);
  $this->SetFont('Arial','I',9);
  $this->Cell(187,10,'Director',0,0,'C');
  $this->Ln(4);
  $this->Cell(187,10,'Impreso:'.date("d/m/Y").', Hora:'.date("G:i:s"),0,0,'C');




   $this->SetY(-15);
   $this->SetFont('Arial','I',8);
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}


//==========================================================================      Cuerpo del programas

}

    $pdf=new PDF('P','mm','Letter'); //P es verical y L horizontal
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetMargins(10,10,10);

$conexion = mysqli_connect('localhost' , 'root' ,'' ,'ciiea');
                  mysqli_set_charset($conexion,'utf8');


   $alumno = $_GET["idalu"];



    $pdf->Ln(2);



//ACTIVIDADDES DEL CHAMACO
  $pdf->Cell(187,100,'ACTIVIDADES DEL ALUMNO',0,0,'C');

       $strConsulta = " SELECT A.id,M.Materia,A.Actividad,A.Nota as Calificacion 
                                        from actividades as A 
                                        inner join materias as M on M.id = A.idmateria
                                        where A.idalumno =  $alumno  ";
    $historial  =  mysqli_query($conexion,$strConsulta);
    //$fila =  mysqli_fetch_array($historial);

    $pdf->Ln(55);

     $pdf->SetWidths(array(40,120,25,22));
     $pdf->SetFont('Arial','B',10,'L');
     $pdf->SetFillColor(1,113,185);//color blanco rgb
     $pdf->SetTextColor(255);
     $pdf->SetLineWidth(.3);
    for($i=0;$i<1;$i++)
            {
                $pdf->Row(array('Materia','Actividad',utf8_decode('Calificación')),'L');
            }

    //***************-------------------------encabezados de las tablas
    $pdf->SetWidths(array(40,120,25,22));
    $pdf->SetFont('Arial','',10,'L');
  //  $pdf->SetFillColor(224,235,255);
    $pdf->SetFillColor(255,255,255);//color blanco rgb
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','',11);

        while ($fila = mysqli_fetch_array($historial)){
        $pdf->Row(array(utf8_decode($fila['Materia']),utf8_decode($fila['Actividad']),$fila['Calificacion']),'L');
        }
 
       $pdf->Ln(-15);

//////////////////////////////////////////////////
//incidencias del chamaco




$pdf->Output();
?>
