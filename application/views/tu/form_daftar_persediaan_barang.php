<?php

$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(15,0,15);
$pdf->SetTitle("Rencana Pembelian Barang");
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,7,"DAFTAR PERSEDIAAN BARANG",0,1,"C");
$pdf->Cell(0,7,"SAAT SEKARANG",0,1,"C");
$pdf->Ln();

$pdf->SetFont("Times","B",12);
$pdf->Cell(10,10,"No",1,0,"C");
$pdf->Cell(100,10,"Nama Barang",1,0,"C");
$pdf->Cell(30,10,"Jumlah Brg",1,0,"C");
$pdf->Cell(45,10,"Jumlah Harga",1,1,"C");
$pdf->SetFont("Times","",12);
for($i=1;$i<=25;$i++){
    $pdf->Cell(10,7,"",1,0,"C");
    $pdf->Cell(100,7," ",1,0,"C");
    $pdf->Cell(30,7," ",1,0,"C");
    $pdf->Cell(45,7,"Rp. ",1,1,"L");
}
$pdf->SetFont("Times","B",12);
$pdf->Cell(140,10,"JUMLAH TOTAL",1,0,"C");
$pdf->Cell(45,10,"Rp. ",1,1,"L");

$pdf->Ln(20);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,7,"DAFTAR INVENTARIS YANG ADA SEKARANG",0,1,"C");
$pdf->Ln();

$pdf->SetFont("Times","B",12);
$pdf->Cell(10,10,"No",1,0,"C");
$pdf->Cell(100,10,"Nama Barang",1,0,"C");
$pdf->Cell(30,10,"Jumlah Brg",1,0,"C");
$pdf->Cell(45,10,"Jumlah Harga",1,1,"C");
$pdf->SetFont("Times","",12);
for($i=1;$i<=7;$i++){
    $pdf->Cell(10,7,"",1,0,"C");
    $pdf->Cell(100,7," ",1,0,"C");
    $pdf->Cell(30,7," ",1,0,"C");
    $pdf->Cell(45,7,"Rp. ",1,1,"L");
}
$pdf->SetFont("Times","B",12);
$pdf->Cell(140,10,"JUMLAH TOTAL",1,0,"C");
$pdf->Cell(45,10,"Rp. ",1,1,"L");


$pdf->Output("","Daftar Rencana Pembelian Barang.pdf");
?>
