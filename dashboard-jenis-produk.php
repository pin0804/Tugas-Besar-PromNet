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

    <title>Dashboard &mdash; Jenis Produk</title>
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
                                <a class="nav-link active" href="dashboard-jenis-produk.php"><i class="fa fa-th-list" aria-hidden="true"></i>Data Jenis Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-produk.php"><i class="fa fa-list-alt" aria-hidden="true"></i>Data Produk</a>
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">KebunKu</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Dashboard</li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Jenis Produk</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr class="hide_all">
                                            <form method="post" action="dashboard-jenis-produk.php">
                                                <td colspan="2"></td>
                                                <td style="width:50%;" align="right">
                                                    <input type="text" name="txt_cari" placeholder="Cari...." class="form-control">
                                                </td>
                                                <td align="right" colspan="3">
                                                    <input type="submit" name="btn_cari" value="Cari" class="btn btn-brand btn-sm" style="width: 100px;">
                                                </td>
                                            </form>
                                        </tr>
                                        <tr class="hide_all">
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#examplePDF" title="Export Data ke File PDF" class='btn btn-danger active btn-sm'><i class=" fas fa-file-pdf"></i>&nbsp;&nbsp;PDF</a>
                                            </td>
                                            <td align="left" colspan="4">
                                                <a href="tambah-jenis-produk.php"><i class="fas fa-plus-circle mr-2"></i>Tambah Data</a>&nbsp;&nbsp;
                                                <a href="dashboard-jenis-produk.php" title="Refresh Table"><i class="fas fa-redo mr-2"></i>
                                                    Refresh Table</a>
                                            </td>
                                        </tr>
                                        <tr class="hide_all">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr align="center">
                                            <th>NO</th>
                                            <th colspan="2" style="width:100%;">Nama Jenis Produk</th>
                                            <th colspan="3" style="width:50%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['btn_cari'])) {
                                            if (!empty($_POST['txt_cari'])) {
                                                $cari = $_POST['txt_cari'];
                                                $sql = "SELECT * FROM tb_jenisproduk WHERE id_jenisproduk LIKE '%" . $cari . "%' 
                                                              OR nama_jenis LIKE '%" . $cari . "%'";
                                            } else {
                                                echo "<script>alert('Data Tersebut Tidak Ada !'); window.location='dashboard-jenis-produk.php';</script>";
                                            }
                                        } else {
                                            //Query SQL
                                            $sql = "SELECT * FROM tb_jenisproduk";
                                        }
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td align='center'>" . $row['id_jenisproduk'] . "</td>";
                                                echo "<td colspan='2'>" . $row['nama_jenis'] . "</td>";
                                                echo "<td colspan='3' width='50' align='center'>
                                                    <a href='edit-jenis-produk.php?update_id=" . $row['id_jenisproduk'] . "' class='badge badge-pill badge-edit'>
                                                    <i class='fas fa-edit'></i></a> &nbsp; &nbsp;";
                                                echo "<a href='hapus-jenis-produk.php?delete_id=" . $row['id_jenisproduk'] . "' class='badge badge-pill badge-delete' 
                                                    onClick=\"return confirm('Anda Yakin Ingin Menghapus Data Ini ?')\">
                                                    <i class='fas fa-trash'></i>
                                                    </a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>Data Tersebut Tidak Ada</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
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
    <!-- Modal PDF -->
    <div class="modal fade" id="examplePDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unduh Data ke Dokumen PDF ? </h5>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <a href="pdf/jenis-produk.php" class="btn btn-primary">Unduh</a>
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