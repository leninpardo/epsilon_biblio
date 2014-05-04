<?php

define('FPDF_FONTPATH','font/');
include("comunes2.php");

require_once '../model/reporte.php';
$reporte=  new reporte();
if(isset($_GET['tabla']))
{
 switch($_GET['tabla'])
 {
   
  case 'prestamo':
     $r=$reporte->getList("v_prestado");
	 $header=$reporte->getHead("v_prestado");
	 $title="LISTADO DE PRESTAMO";
	 $w=array(20,70,25,25,90);
  break;
	
	case 'libro':
     $r=$reporte->getList("vista_libro");
	 $header=$reporte->getHead("vista_libro");
	 $title="LISTADO DE LIBROS";
	 $w=array(20,70,40,50,70);
   break; 
   
   
   default:exit(0);
//
}

}else
{
exit(0);
}
$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();

//Nombre del Listado
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B','U',16);
$pdf->SetY(30);//mover al titulo en orientacion a Y
$pdf->SetX(120);//mover al titulo en orientacion a X
$pdf->MultiCell(100,7,$title,0,1,'C',false);//titulo
$pdf->Cell(0,0.1,'',1,1,'C',false); //Titulo
$pdf->SetFont('Arial','',7);
$pdf->Cell(0,5,'FECHA : '.date('d/m/Y'),0,1,'R',false); //Titulo
$pdf->SetY(37);
$pdf->Ln();    
//Restauracin de colores y fuentes
 $pdf->SetFillColor(224,235,255);
 $pdf->SetTextColor(0);
 $pdf->SetFont('Arial','B',7);
//Ttulos de las columnas
$pdf->SetX(5);
//Colores, ancho de lnea y fuente en negrita
$pdf->SetFillColor(154,228,174);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.2);
$pdf->SetFont('Arial','B',8);
//Cabecera

for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],5,$header[$i],1,0,'C',1);
	/* el 5 es para el ancho*/
    $pdf->Ln();
    $pdf->SetFont('Arial','',9);
foreach($r as $val)
 {
 $pdf->SetX(5);
   foreach($header as $key=>$c)
   {
     $pdf->Cell($w[$key],5,$val[$key],'LRTB',0,'L');
   }
  $pdf->Ln();
 }
 
$pdf->Output();

?> 

<?php
include("log.php");
?>


