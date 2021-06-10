<?php

$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(20,0,20);

$pdf->Image('images/logo-300.png',10,10,-300);
$pdf->Output("","Surat Kuasa Pemakaian Agunan.pdf");
?>
