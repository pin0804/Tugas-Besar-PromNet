<?php
include "../dbconn/dbconn.php";
require('fpdf.php');
//Menampilkan data dari tabel di database
$sql="SELECT * FROM tb_produk p inner join tb_jenisproduk j on p.id_jenisproduk = j.id_jenisproduk";
$result=$conn->query($sql);

//Inisiasi untuk membuat header kolom
$column_id_produk = "";
$column_nama_produk = "";
$column_harga = "";
$column_nama_jenis = "";
$column_stok = "";



//For each row, add the field to the corresponding column
while($row=$result->fetch_assoc())
{
    $id_produk = $row["id_produk"];
    $nama_produk = $row['nama'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $nama_jenis = $row["nama_jenis"];
 
    $column_id_produk = $column_id_produk.$id_produk."\n";
    $column_nama_produk = $column_nama_produk.$nama_produk."\n";
    $column_harga = $column_harga.$harga."\n";
    $column_stok = $column_stok.$stok."\n";
    $column_nama_jenis = $column_nama_jenis.$nama_jenis."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('logo.png',10,5,20);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PRODUK',0,0,'C');
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
$pdf->Cell(25,8,'ID Produk',1,0,'C',1);

$pdf->SetX(40);
$pdf->Cell(70,8,'Nama Produk',1,0,'C',1);

$pdf->SetX(110);
$pdf->Cell(25,8,'Jenis Produk',1,0,'C',1);

$pdf->SetX(135);
$pdf->Cell(25,8,'Harga',1,0,'C',1);

$pdf->SetX(160);
$pdf->Cell(30,8,'Stok',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 58;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(25,6,$column_id_produk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(70,6,$column_nama_produk,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(25,6,$column_nama_jenis,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(25,6,$column_harga,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(30,6,$column_stok,1,'L');


$pdf->Output();
?>