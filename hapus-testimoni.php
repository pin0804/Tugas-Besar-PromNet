<?php
    include('dbconn/dbconn.php');
    if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
        $id_testimoni=$_GET['delete_id'];
    }else{
        $id_testimoni=$_POST['delete_id'];
    }

    $sql_select="SELECT * FROM tb_testimoni WHERE id_testimoni='$id_testimoni'";
    $result=$conn->query($sql_select);
    $row = $result->fetch_assoc();
    unlink("images/testimoni/".$row['foto_user']);

    $sql_delete="DELETE FROM tb_testimoni WHERE id_testimoni='$id_testimoni'";
    if($conn->query($sql_delete)===TRUE){
        echo "<script>alert('Data Berhasil Diubah');window.location='dashboard-testimoni.php';</script>";
    }else{
        echo "Error : ".$sql_delete."<br>".$conn->error;
    }

    $conn->close();
   


?>