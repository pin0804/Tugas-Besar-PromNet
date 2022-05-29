<?php
include "../dbconn/dbconn.php";
require('fpdf.php');
//Menampilkan data dari tabel di database
$sql="SELECT * FROM tb_pertanyaan";
$result=$conn->query($sql);

//Inisiasi untuk membuat header kolom
$column_id_pertanyaan = "";
$column_nama= "";
$column_email= "";
$column_tgl_masuk = "";
$column_status = "";
$column_pertanyaan = "";



//For each row, add the field to the corresponding column
while($row=$result->fetch_assoc())
{
    $id_pertanyaan = $row["id_pertanyaan"];
    $nama = $row["nama"];
    $email = $row['email'];
    $tgl_masuk = $row['tgl_masuk'];
    $status = $row['status'];
    $pertanyaan = $row['pertanyaan'];
 
    $column_id_pertanyaan = $column_id_pertanyaan.$id_pertanyaan."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_email = $column_email.$email."\n";
    $column_tgl_masuk = $column_tgl_masuk.$tgl_masuk."\n";
    $column_status = $column_status.$status."\n";
    $column_pertanyaan = $column_pertanyaan.$pertanyaan."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('logo.png',10,5,20);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PERTANYAAN PENGUNJUNG',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'KebunKu - NECode',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 50;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(28,104,82);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(25,8,'ID Pertanyaan',1,0,'C',1);

$pdf->SetX(40);
$pdf->Cell(50,8,'Nama Penanya',1,0,'C',1);

$pdf->SetX(90);
$pdf->Cell(40,8,'Email',1,0,'C',1);

$pdf->SetX(130);
$pdf->Cell(25,8,'Tgl Masuk',1,0,'C',1);

$pdf->SetX(155);
$pdf->Cell(40,8,'Status',1,0,'C',1);


$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 58;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(25,6,$column_id_pertanyaan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(50,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(40,6,$column_email,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(25,6,$column_tgl_masuk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(40,6,$column_status,1,'L');



$pdf->Output();
?>