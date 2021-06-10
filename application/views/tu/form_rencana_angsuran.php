<?php

$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(15,0,15);
$pdf->SetTitle("Rencana Angsuran");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"RENCANA ANGSURAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,"Nama",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Alamat",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Jumlah Pinjaman",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Jangka Waktu",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Sistem Angsuran",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Persentase Jasa Pinjaman",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Jumlah Jasa Pinjaman",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);
$pdf->Cell(60,7,"Jaminan (Agunan",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,"",0,1);

$pdf->Ln();
$pdf->SetFont("Arial","B",12);
$pdf->Cell(0,7,"Rencana Angsuran",0,1);
$pdf->Cell(30,7,"Angsuran Ke",1,0,"C");
$pdf->Cell(30,7,"Tanggal",1,0,"C");
$pdf->Cell(40,7,"Angsuran Pokok",1,0,"C");
$pdf->Cell(40,7,"Jasa",1,0,"C");
$pdf->Cell(40,7,"Jumlah",1,1,"C");
for($i=1;$i<=36;$i++){
    $pdf->Cell(30,5,$i,1,0,"C");
    $pdf->Cell(30,5,"",1,0,"C");
    $pdf->Cell(40,5,"",1,0,"C");
    $pdf->Cell(40,5,"",1,0,"C");
    $pdf->Cell(40,5,"",1,1,"C");
}
$pdf->Ln();
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Bengkalis,",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"Disetujui Oleh:",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Dibuat Oleh:",0,1,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"Ketua UED-SP",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pemanfaat Dana",0,1,"C");
$pdf->Ln(20);
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"(_________________________)",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"(_________________________)",0,1,"C");





$pdf->Output("","Surat Kuasa Penjualan.pdf");
?>
