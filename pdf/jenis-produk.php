<?php
include "../dbconn/dbconn.php";
require('fpdf.php');
//Menampilkan data dari tabel di database
$sql="SELECT * FROM tb_jenisproduk";
$result=$conn->query($sql);

//Inisiasi untuk membuat header kolom
$column_id_jenis = "";
$column_nama_jenis = "";



//For each row, add the field to the corresponding column
while($row=$result->fetch_assoc())
{
    $id_jenis = $row["id_jenisproduk"];
    $nama_jenis = $row["nama_jenis"];
 
    $column_id_jenis = $column_id_jenis.$id_jenis."\n";
    $column_nama_jenis = $column_nama_jenis.$nama_jenis."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('logo.png',10,5,20);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA JENIS PRODUK',0,0,'C');
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
$pdf->SetX(50);
$pdf->Cell(25,8,'ID Jenis',1,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(90,8,'Nama Jenis',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 58;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(25,6,$column_id_jenis,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(75);
$pdf->MultiCell(90,6,$column_nama_jenis,1,'L');


$pdf->Output();
?>