<?php
include "../dbconn/dbconn.php";
require('fpdf.php');
//Menampilkan data dari tabel di database
$sql="SELECT * FROM tb_testimoni t inner join tb_produk p on t.id_produk=p.id_produk";
$result=$conn->query($sql);

//Inisiasi untuk membuat header kolom
$column_id_testimoni = "";
$column_nama_produk= "";
$column_nama_user= "";
$column_rate = "";



//For each row, add the field to the corresponding column
while($row=$result->fetch_assoc())
{
    $id_testimoni = $row["id_testimoni"];
    $nama_produk = $row["nama"];
    $nama_user = $row['nama_user'];
    $rate = $row['rate'];

 
    $column_id_testimoni = $column_id_testimoni.$id_testimoni."\n";
    $column_nama_produk = $column_nama_produk.$nama_produk."\n";
    $column_nama_user = $column_nama_user.$nama_user."\n";
    $column_rate = $column_rate.$rate."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('logo.png',10,5,20);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA TESTIMONI',0,0,'C');
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
$pdf->SetX(25);
$pdf->Cell(25,8,'ID Testimoni',1,0,'C',1);

$pdf->SetX(50);
$pdf->Cell(50,8,'Nama Pembeli',1,0,'C',1);

$pdf->SetX(100);
$pdf->Cell(50,8,'Nama Produk',1,0,'C',1);

$pdf->SetX(150);
$pdf->Cell(25,8,'Rate',1,0,'C',1);



$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 58;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(25,6,$column_id_testimoni,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(50,6,$column_nama_user,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(50,6,$column_nama_produk,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(25,6,$column_rate,1,'C');


$pdf->Output();
?>