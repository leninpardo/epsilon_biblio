<?php

define('FPDF_FONTPATH','font/');
include("comunes.php");

require_once '../model/reporte.php';
$reporte=  new reporte();
if(isset($_GET['tabla']))
{
 switch($_GET['tabla'])
 {
 
  case 'libro':
     $r=$reporte->getList("vista_libro");
	 $header=$reporte->getHead("vista_libro");
	 $title="LISTADO DE LIBROS";
	 $w=array(10,80,40,20);
  break;  
	 case 'autor':
     $r=$reporte->getList("vista_autor");
	 $header=$reporte->getHead("vista_autor");
	 $title="LISTADO DE AUTORES";
	 $w=array(10,100);
  break; 
  case 'editorial':
     $r=$reporte->getList("vista_editorial");
	 $header=$reporte->getHead("vista_editorial");
	 $title="LISTADO DE EDITORIALES";
	 $w=array(10,100);
  break; 
  case 'categoria':
     $r=$reporte->getList("vista_categoria");
	 $header=$reporte->getHead("vista_categoria");
	 $title="LISTADO DE CATEGORIAS DE LIBROS";
	 $w=array(10);
  break; 

    
  case 'lector':
     $r=$reporte->getList("vista_lector");
	 $header=$reporte->getHead("vista_lector");
	 $title="LISTADO DE LECTORES";
	 $w=array(20,80,30,20,20);
  break; 
   
  default:exit(0);
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
$pdf->SetY(30);
$pdf->SetX(70);
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
$pdf->SetX(10);
//Colores, ancho de lnea y fuente en negrita
$pdf->SetFillColor(154,228,174);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.2);
$pdf->SetFont('Arial','B',8);
//Cabecera

for($i=0;$i<count($header);$i++)
{
  if($i>0)
  {
	$pdf->Cell($w[$i],5,$header[$i],1,0,'C',1);
  }else{
     $pdf->Cell($w[$i],5,"item",1,0,'C',1); 
  }
}
	/* el 5 es para el ancho*/
    $pdf->Ln();
    $pdf->SetFont('Arial','',9);
foreach($r as $val)
 {
    $cont++;
 $pdf->SetX(10);
   foreach($header as $key=>$c)
   {
       if($key>0)
   {
     $pdf->Cell($w[$key],5,$val[$key],'LRTB',0,'L');
   }
   else{
        $pdf->Cell($w[$key],5,$cont,'LRTB',0,'L');
   }
   }
  $pdf->Ln();
 }
 
$pdf->Output("",'');

?> 

<?php
include("log.php");

?>


