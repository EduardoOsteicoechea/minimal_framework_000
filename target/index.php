<?php
require('../_/vendor/fpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', 'Letter'); // 'P' for portrait, 'mm' for millimeters, 'Letter' for US Letter size
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Place text at x=10mm, y=20mm
$pdf->SetXY(10, 20);
$pdf->Cell(0, 10, 'This text is positioned at 10mm and 20mm.');

// Place another text element at x=50mm, y=50mm
$pdf->SetXY(50, 50);
$pdf->Cell(0, 10, 'This is another text at 50mm and 50mm.');

$pdf->SetXY(100, 100);
$pdf->Cell(0, 10, 'This is another text at 50mm and 50mm.');

$pdf->Output();
?>