<?php
session_start();
include('dbconn/dbconn.php');
if (!isset($_SESSION['username']) and !isset($_SESSION['nama']) and !isset($_SESSION['id_petugas']) and !isset($_SESSION['foto'])) {
    header('Location: login-dashboard.php');
}
$id_petugas = $_SESSION['id_petugas'];

$sql_petugas = "SELECT * FROM tb_petugas WHERE id_petugas='$id_petugas'";
$result_petugas = $conn->query($sql_petugas);
$row_petugas = $result_petugas->fetch_assoc();
$nama_petugas = $row_petugas['nama'];
$username = $row_petugas['username'];
$foto_petugas = $row_petugas['foto'];

if (isset($_GET['update_id']) && !empty($_GET['update_id'])) {
    $id_produkedit = $_GET['update_id'];
} else {
    $id_produkedit = $_POST['update_id'];
}

$sql_select = "SELECT * FROM tb_produk p inner join tb_jenisproduk j on p.id_jenisproduk=j.id_jenisproduk WHERE id_produk='$id_produkedit'";
$result_select = $conn->query($sql_select);
$row_select = $result_select->fetch_assoc();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard &mdash; Edit Produk</title>
    <link rel="icon" href="images/branding/main-logo-icon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dashboard/vendor/bootstrap/css/bootstrap.min.css">
    <link href="dashboard/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard/libs/css/style.css">
    <link rel="stylesheet" href="dashboard/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="dashboard/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="dashboard/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="dashboard/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dashboard/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="dashboard/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboard/libs/js/dashboard-js.php">
    <script src="pengunjung/js/sweetalert.min.js"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <img src="images/branding/side-logo-5.png" height="30px" style="padding-left: 30px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo "<img src='images/petugas/" . $foto_petugas . "' class='user-avatar-md rounded-circle' >"; ?></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $nama_petugas; ?></h5>
                                </div>
                                <?php echo "<a class='dropdown-item' href='edit-profil.php' ><i class='fas fa-edit mr-2'></i>Edit Profil</a>"; ?>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-jenis-produk.php"><i class="fa fa-th-list" aria-hidden="true"></i>Data Jenis Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link  active" href="dashboard-produk.php"><i class="fa fa-list-alt" aria-hidden="true"></i>Data Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-pertanyaan.php"><i class="fa fa-question-circle" aria-hidden="true"></i>Data Pertanyaan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-testimoni.php"><i class="fa fa-star" aria-hidden="true"></i>Data Testimoni</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-petugas.php"><i class="fa fa-fw fa-user-circle" aria-hidden="true"></i>Data Petugas</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Edit Data Produk</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard-produk.php">Data Produk</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="validationform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Produk</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" disabled required="" placeholder="ID" class="form-control" name="txt_id_produk" value="<?php echo $row_select['id_produk']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Produk</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" required="" placeholder="Nama.." class="form-control" name="txt_nama_produk" value="<?php echo $row_select['nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jenis Produk</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control" name="txt_jenis">
                                                <?php

                                                $sql_jp = "SELECT * FROM tb_jenisproduk";
                                                $result_jp = $conn->query($sql_jp);
                                                if ($result_jp->num_rows > 0) {
                                                    while ($row_jp = $result_jp->fetch_assoc()) {
                                                        $id_jenis = $row_jp['id_jenisproduk'];
                                                        if ($id_jenis == $row_select['id_jenisproduk']) {
                                                            echo "<option value='" . $id_jenis . "' selected='selected'>" . $row_jp['nama_jenis'] . "</option>";
                                                        } else {
                                                            echo "<option value='" . $id_jenis . "'>" . $row_jp['nama_jenis'] . "</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Harga (Rp)</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="number" required="" placeholder="Harga.." class="form-control" name="txt_harga" value="<?php echo $row_select['harga']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Stok</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="number" required="" placeholder="Stok.." class="form-control" name="txt_stok" value="<?php echo $row_select['stok']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Keterangan Produk</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea name="txt_ket" required="" placeholder="Keterangan.." class="form-control" cols="30" rows="5"><?php echo $row_select['keterangan']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Foto Profil</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="file" name="txt_file" value="<?php echo $row_select['foto']; ?>"><br><br>
                                            <img src="images/product/<?php echo $row_select['foto']; ?>" height="100" />&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <input type="hidden" name="update_id" value="<?php echo $row_select['id_produk'] ?>">
                                            <button type="submit" name="btn_tambah" class="btn btn-space btn-primary">Edit Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end valifation types -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2021. All rights reserved. Dashboard by NECode &mdash; KebunKu</a>.
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->

        <!-- jquery 3.3.1 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Untuk Keluar ? </h5>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <a href="login-dashboard.php" class="btn btn-primary">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="dashboard/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="dashboard/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="dashboard/libs/js/main-js.js"></script>
        <!-- chart chartist js -->
        <script src="dashboard/vendor/charts/chartist-bundle/chartist.min.js"></script>
        <!-- sparkline js -->
        <script src="dashboard/vendor/charts/sparkline/jquery.sparkline.js"></script>
        <!-- morris js -->
        <script src="dashboard/vendor/charts/morris-bundle/raphael.min.js"></script>
        <script src="dashboard/vendor/charts/morris-bundle/morris.js"></script>
        <!-- chart c3 js -->
        <script src="dashboard/vendor/charts/c3charts/c3.min.js"></script>
        <script src="dashboard/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
        <script src="dashboard/vendor/charts/c3charts/C3chartjs.js"></script>
        <script type="text/javascript" src="dashboard/libs/js/Chart.js"></script>
        <script type="text/javascript">
            function berhasil() {
                swal({
                    title: "Data Berhasil disimpan",
                    text: "Silahkan Melanjutkan Pekerjaan",
                    icon: "success",
                    button: "Ok",
                }).then(function() {
                    window.location = 'dashboard-produk.php'
                });
            }

            function gagal() {
                swal({
                    title: "Gagal Mengubah Data",
                    text: "Harap Coba Kembali",
                    icon: "error",
                    button: "Ok",
                }).then(function() {
                    window.location = 'dashboard-produk.php'
                });
            }
        </script>
        <?php
        $nama = $id_jp = $harga = $stok = $ket = $image_name = "";
        $namaErr = $id_jpErr = $hargaErr = $stokErr = $ketErr = $imageErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["txt_nama_produk"])) {
                $namaErr = "Nama harus diisi";
            } else {
                $nama = test_input($_POST['txt_nama_produk']);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
                    $namaErr = "Hanya huruf besar, kecil dan spasi putih yang diizinkan";
                }
            }

            if (empty($_POST["txt_jenis"])) {
                $id_jpErr = "Jenis harus diisi";
            } else {
                $id_jp = test_input($_POST['txt_jenis']);
            }

            if (empty($_POST["txt_harga"])) {
                $hargaErr = "Harga harus diisi";
            } else {
                $harga = test_input($_POST['txt_harga']);
            }

            if (empty($_POST["txt_stok"])) {
                $stokErr = "Stok harus diisi";
            } else {
                $stok = test_input($_POST['txt_stok']);
            }

            if (empty($_POST["txt_ket"])) {
                $ketErr = "Keterangan produk harus diisi";
            } else {
                $ket = test_input($_POST['txt_ket']);
            }

            $image_name = "init";
            if (!empty($_FILES['txt_file']['name'])) {
                $nama_dir = "images/product/";
                $nama_file = $nama_dir . basename($_FILES['txt_file']['name']);
                $status_upload = 1;
                $imageFileType = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES['txt_file']['tmp_name']);

                if ($check !== false) {
                    if (file_exists($nama_file)) {
                        $imageErr = "File dengan nama yang sama telah ada.";
                        $status_upload = 0;
                    } else {
                        if ($_FILES['txt_file']['size'] < 500000) {
                            if ($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg' || $imageFileType == 'gif') {
                                unlink("images/product/" . $row_select['foto']);
                                $image_name = addslashes($_FILES['txt_file']['name']);
                                move_uploaded_file($_FILES['txt_file']['tmp_name'], $nama_file);
                                $status_upload = 1;
                            } else {
                                $pasfotoErr = "File bukan gambar (jpg/jpeg/png/gif)";
                                $status_upload = 0;
                            }
                        } else {
                            $pasfotoErr = "File terlalu besar, harap kuraang dari 5MB";
                            $status_upload = 0;
                        }
                    }
                }
            }
            $id_edit = test_input($_POST['update_id']);
            if (!empty($nama) && !empty($id_jp) && !empty($harga) && !empty($stok) && !empty($ket) && !empty($image_name)) {
                $sql_update = "UPDATE tb_produk SET nama = '$nama', id_jenisproduk = '$id_jp', harga= '$harga', stok= '$stok', keterangan= '$ket'";

                if (!empty($_FILES['txt_file']['name'])) {
                    $sql_update = $sql_update . ", foto='$image_name'";
                }
                $sql_update = $sql_update . " WHERE id_produk = '$id_edit'";

                if ($conn->query($sql_update) === TRUE) {
                    echo "<script>berhasil();</script>";
                    // echo $conn->error;
                } else {
                    echo "<script>gagal();</script>";
                    //echo $conn->error;
                }
                $conn->close();
            }
        }
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
</body>

</html>