<?php
    session_start();
    include('dbconn/dbconn.php');
    if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
        $id_jenishapus=$_GET['delete_id'];
    }else{
        $id_jenishapus=$_POST['delete_id'];
    }

    $sql_select="SELECT * FROM tb_jenisproduk WHERE id_jenisproduk='$id_jenishapus'";
    $result=$conn->query($sql_select);
    $row = $result->fetch_assoc();

    $sql_delete="DELETE FROM tb_jenisproduk WHERE id_jenisproduk='$id_jenishapus'";
    if($conn->query($sql_delete)===TRUE){
        echo "<script>alert('Data Berhasil Dihapus'); window.location='dashboard-jenis-produk.php';</script>";
    }else{
        echo "<script>gagal();</script>";
    }

    $conn->close();
   


?>