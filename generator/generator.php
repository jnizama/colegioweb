<?php
require('fpdf.php');

$numTicket = $_GET['ticketNumber'];

$pdf = new FPDF();
$pdf->AddPage('P',array(90,140));
//$pdf->SetDisplayMode('real');
$pdf->SetLeftMargin(2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,'Restaurant Mi Pollo',0,2,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,7,'Av. Lima 123',0,2,'C');
$pdf->Cell(0,0,'Independencia - Lima',0,2,'C');
$pdf->Cell(0,7,'RUC 406798594',0,2,'C');
$pdf->Cell(0,0,'Nuestros Precios Incluye IGV',0,2,'C');
$pdf->Cell(0,7,'Boleta Electronica',0,2,'C');

$pdf->Cell(40,12,'Local: ',0,0,'L');
$pdf->Cell(0,12,'Pedido Num: ',0,1,'L');
$pdf->Cell(0,0,'Fecha: ',0,0,'L');


$pdf->Line(3,5,85,5);
$pdf->Line(3,5,3,135);
$pdf->Line(3,135,85,135);
$pdf->Line(85,135,85,5);

$pdf->Output();
?>
