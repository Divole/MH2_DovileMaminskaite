<?php
require("fpdf/fpdf.php");

$pdf = new FPDF( );
$pdf->AddPage();
$pdf->SetFont('Verdana','B',16);
$pdf->Cell(0,0,'MH2 Webshop',0,0,'C');
$pdf->Ln(30);
$pdf->Cell(0,0,'Adress 1');
$pdf->Ln(8);
$pdf->Cell(0,0,'Adress 2');
$pdf->Ln(8);
$pdf->Cell(0,0,'Adress 3');
$pdf->Output();