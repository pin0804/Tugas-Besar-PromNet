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



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard &mdash; Detail Testimoni</title>
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
                                <a class="nav-link " href="dashboard-produk.php"><i class="fa fa-list-alt" aria-hidden="true"></i>Data Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-pertanyaan.php"><i class="fa fa-question-circle" aria-hidden="true"></i>Data Pertanyaan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="dashboard-testimoni.php"><i class="fa fa-star" aria-hidden="true"></i>Data Testimoni</a>
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
                <?php
                $id_detail = $_GET['detail_id'];
                $sql_detail = "SELECT * FROM tb_testimoni t inner join tb_produk p on t.id_produk=p.id_produk inner join tb_jenisproduk j on p.id_jenisproduk=j.id_jenisproduk WHERE t.id_testimoni='$id_detail'";
                $result_detail = $conn->query($sql_detail);
                $row_detail = $result_detail->fetch_assoc();
                ?>
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Detail Testimoni</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><a href="dashboard-testimoni.php">Data Testimoni</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Testimoni</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                <div class="float-left">
                                    <h3 class="mb-0">ID Produk : <?php echo $row_detail['id_produk']; ?></h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo "<img src='images/product/" . $row_detail['foto'] . "' width='300px' >"; ?>
                                    </div>

                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center" colspan="2" style="color: #800;">DATA PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center" width="150"><b>Nama Produk</b></td>
                                                <td class="left"><?php echo $row_detail['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Jenis Produk</b></td>
                                                <td class="left"><?php echo $row_detail['id_jenisproduk'] . " &mdash; " . $row_detail['nama_jenis']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Harga</b></td>
                                                <td class="left">Rp.<?php echo $row_detail['harga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Stok</b></td>
                                                <td class="left"><?php echo $row_detail['stok']; ?> Buah</td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Keterangan</b></td>
                                                <td class="left"><?php echo $row_detail['keterangan']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center" colspan="2" style="color: #800;">DATA TESTIMONI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center" width="150"><b>Nama Pembeli</b></td>
                                                <td class="left"><?php echo $row_detail['nama_user']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Foto Pembeli</b></td>
                                                <td class="left"><?php echo "<img src='images/testimoni/" . $row_detail['foto_user'] . "' width='200px' >"; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Rate</b></td>
                                                <td class="left"><?php echo $row_detail['rate']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Testimoni</b></td>
                                                <td class="left"><?php echo $row_detail['testimoni']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0">Dilihat : <?php echo date("Y-m-d"); ?></p>
                            </div>
                        </div>
                    </div>

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
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
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
</body>

</html>