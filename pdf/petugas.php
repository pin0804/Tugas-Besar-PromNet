<?php
include "../dbconn/dbconn.php";
require('fpdf.php');
//Menampilkan data dari tabel di database
$sql="SELECT * FROM tb_petugas";
$result=$conn->query($sql);

//Inisiasi untuk membuat header kolom
$column_id_petugas = "";
$column_nama = "";
$column_username = "";



//For each row, add the field to the corresponding column
while($row=$result->fetch_assoc())
{
    $id_petugas = $row["id_petugas"];
    $nama = $row["nama"];
    $username = $row["username"];

    $column_id_petugas = $column_id_petugas.$id_petugas."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_username = $column_username.$username."\n";

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('logo.png',10,5,20);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PETUGAS',0,0,'C');
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
$pdf->Cell(25,8,'ID',1,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(50,8,'Nama ',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(50,8,'Username ',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 58;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(25,6,$column_id_petugas,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(75);
$pdf->MultiCell(50,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(50,6,$column_username,1,'L');


$pdf->Output();
?>