<?php
    include('dbconn/dbconn.php');
    if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
        $id_produk=$_GET['delete_id'];
    }else{
        $id_produk=$_POST['delete_id'];
    }

    $sql_select="SELECT * FROM tb_produk WHERE id_produk='$id_produk'";
    $result=$conn->query($sql_select);
    $row = $result->fetch_assoc();
    unlink("images/product/".$row['foto']);

    $sql_delete="DELETE FROM tb_produk WHERE id_produk='$id_produk'";
    if($conn->query($sql_delete)===TRUE){
        echo "<script>alert('Data Berhasil Diubah');window.location='dashboard-produk.php';</script>";
    }else{
        echo "Error : ".$sql_delete."<br>".$conn->error;
    }

    $conn->close();
   


?>