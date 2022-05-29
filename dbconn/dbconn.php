<?php
$namaserver = "localhost";
$username = "root";
$password = "";
$namadb = "db_kebunku"; 

//Membuat koneksi
$conn = new mysqli($namaserver,$username,$password,$namadb);

//Mencek Koneksi
if(!$conn)
{
    die("Koneksi gagal : " . $conn->connect_error);
}
?>