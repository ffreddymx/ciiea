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
$idgrupo = $_GET['id'];
$grupo = $_GET['g'];
$ciclo = $_GET['c'];
$turno = $_GET['t'];
$grado = $_GET['gr'];

$conexion = mysqli_connect('localhost' , 'root' ,'' ,'ciiea');
                  mysqli_set_charset($conexion,'utf8');



$this->Image('img/logo.jpg',4,2,30,30);

 /*
    $this->Image('footer.png' ,1,180,276,35);
   */

   //$alumno = $_GET["idalu"];

   $cliente = "SELECT *
               from escuela ";
   $cli =  mysqli_query($conexion,$cliente);
   $fil =  mysqli_fetch_array($cli);
//$mysqli -> set_charset("utf8");

    $this->SetFont('Arial','',10);
    $this->Cell(0,6,utf8_decode("SISTEMA EDUCATIVO NACIONAL"),0,1,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(0,6,utf8_decode("SECRETARÍA DE EDUCACIÓN DEL GOBIERNO DEL ESTADO DE TABASCO "),0,1,'C');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode("DIRECCIÓN DE CONTROL ESCOLAR E INCORPORACIÓN"),0,1,'C');
    $this->Ln(-1);
    $this->SetFont('Arial','B',10);
    $this->Cell(0,6,utf8_decode("REGISTRO DE CALIFICACIONES"),0,1,'C');
    
  
    $this->Ln(1);
    $this->SetFont('Arial','',10);
    $this->Cell(0,6,utf8_decode("NOMBRE : ".$fil['Nombre']),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode("DOMICILIO : ".$fil['Direccion']),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode('C.C.T : '.$fil['CCT']),0,1,'L');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode('ZONA : '.$fil['Zona']),0,1,'L');

    $this->SetFont('Arial','',9);
    $this->SetXY(85,10);
    $this->Cell(180,3,"CICLO ESCOLAR : ".$ciclo ,0,1,'R');
    $this->SetXY(85,14);
    $this->Cell(180,3,utf8_decode("EDUCACIÓN SECUNDARIA") ,0,1,'R');
    $this->SetXY(159,15);
    $this->Cell(180,10,date("d/m/Y").' '.date("G:i:s"),0,0,'C');
    $this->SetXY(168,19);
    $this->Cell(180,10,'HOJA '.$this->PageNo().'/{nb}',0,0,'C');

    $this->SetFont('Arial','',10);
    $this->SetXY(45,21);
    $this->Cell(30,60,"GRADO : ".$grado,0,1,'R');
       $this->SetXY(80,21);
    $this->Cell(30,60,"TURNO : ".$turno,0,1,'R'); 
       $this->SetXY(120,21);
    $this->Cell(30,60,"GRUPO : ".$grupo,0,1,'R'); 

    $this->SetXY(170,0);

}

//==========================================================================             Pie de la pagina

function Footer()
{


  $this->Ln(50);
  $this->Ln(5);
  $this->Ln(10);
  //    $this->SetXY(45,21);
  $this->SetXY(10,175);
  $this->Cell(187,10,'PEDRO CORNELIO RODRIGUEZ',0,0,'L');
  $this->Ln(4);
  $this->SetFont('Arial','I',9);
  $this->SetXY(30,180);
  $this->Cell(200,12,'Director',0,0,'L');
  $this->Ln(4);
  $this->SetY(-15);
  $this->SetFont('Arial','I',8);



  $this->SetXY(115,175);
  $this->Cell(187,10,'____________________________',0,0,'L');
  $this->SetXY(120,180);
  $this->Cell(187,10,'FIRMA DEL DOCENTE',0,0,'L');

    $this->SetXY(215,175);
  $this->Cell(187,10,'____________________________',0,0,'L');
  $this->SetXY(220,180);
  $this->Cell(187,10,'SELLO DE LA ESCUELA',0,0,'L');
}


//==========================================================================      Cuerpo del programas

}

$idgrupo = $_GET['id'];
$grupo = $_GET['g'];
$ciclo = $_GET['c'];
$turno = $_GET['t'];

$con = 0;

    $pdf=new PDF('L','mm','Letter'); //P es verical y L horizontal
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetMargins(10,10,10);
$pdf->AliasNbPages();
$conexion = mysqli_connect('localhost' , 'root' ,'' ,'ciiea');
                  mysqli_set_charset($conexion,'utf8');



    $strConsulta = " SELECT Nombre_Alumno,A.CURP,GA.Ciclo,A.Prom1,A.Prom2,A.Prom3, FORMAT(((A.Prom1+A.Prom2+A.Prom3)/3),2) as Calificacion 
              FROM alumno as A 
              inner join grupo as GA on GA.id = A.Id_Grupo
              where GA.id = '$idgrupo'
               ";
    $historial  =  mysqli_query($conexion,$strConsulta);
    //$fila =  mysqli_fetch_array($historial);

    $pdf->Ln(55);

     $pdf->SetWidths(array(12,60,130,12,12,12,15));
     $pdf->SetFont('Arial','B',10,'L');
     $pdf->SetFillColor(1,113,185);//color blanco rgb
     $pdf->SetTextColor(255);
     $pdf->SetLineWidth(.3);
    for($i=0;$i<1;$i++)
            {
                $pdf->Row(array('NUM','C.U.R.P.','NOMBRE DEL ALUMNO(A) PRIMER APELLIDO/SEGUNDO APELLIDO * NOMBRE(S)','PER1','PER2','PER3','PROM'),'L');
            }

    //***************-------------------------encabezados de las tablas
    $pdf->SetWidths(array(12,60,130,12,12,12,15));
    $pdf->SetFont('Arial','',10,'L');
    $pdf->SetFillColor(255,255,255);//color blanco rgb
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','',11);

        while ($fila = mysqli_fetch_array($historial)){
        $pdf->Row(array($con+=1,utf8_decode($fila['CURP']),utf8_decode($fila['Nombre_Alumno']),$fila['Prom1'],$fila['Prom2'],$fila['Prom3'],number_format($fila['Calificacion'],2)),'L');
        }
 


 
       $pdf->Ln(-15);

//////////////////////////////////////////////////
//incidencias del chamaco




$pdf->Output();
?>
