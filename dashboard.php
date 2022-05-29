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

//count jenis produk
$sql_jp = "SELECT COUNT(*) as total_jp FROM tb_jenisproduk";
$result_jp = $conn->query($sql_jp);
$row_jp = $result_jp->fetch_assoc();

//count produk
$sql_jproduk = "SELECT COUNT(*) as total_jproduk FROM tb_produk";
$result_jproduk = $conn->query($sql_jproduk);
$row_jproduk = $result_jproduk->fetch_assoc();

//count pertanyaan
$sql_jpertanyaan = "SELECT COUNT(*) as total_jpertanyaan FROM tb_pertanyaan";
$result_jpertanyaan = $conn->query($sql_jpertanyaan);
$row_jpertanyaan = $result_jpertanyaan->fetch_assoc();

//count petugas
$sql_jpetugas = "SELECT COUNT(*) as total_jpetugas FROM tb_petugas";
$result_jpetugas = $conn->query($sql_jpetugas);
$row_jpetugas = $result_jpetugas->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard &mdash; KebunKu</title>
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
                                <a class="nav-link active" href="dashboard.php"><i i class="fa fa-home fa-fw" aria-hidden="true"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-jenis-produk.php"><i i class="fa fa-th-list" aria-hidden="true"></i>Data Jenis Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-produk.php"><i i class="fa fa-list-alt" aria-hidden="true"></i>Data Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-pertanyaan.php"><i i class="fa fa-question-circle" aria-hidden="true"></i>Data Pertanyaan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-testimoni.php"><i i class="fa fa-star" aria-hidden="true"></i>Data Testimoni</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-petugas.php"><i i class="fa fa-fw fa-user-circle" aria-hidden="true"></i>Data Petugas</a>
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
                                        <li class="breadcrumb-item active" aria-current="page">KebunKu Sistem Informasi</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">


                    <div class="row">

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted"><i class="fa fa-fw fa-users"></i> Jenis Produk </h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo $row_jp['total_jp']; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted"><i class="fa fa-list-alt"></i> Produk</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo $row_jproduk['total_jproduk']; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted"><i class="fa fa-question-circle"></i> Pertanyaan</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo $row_jpertanyaan['total_jpertanyaan']; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted"><i i class="fas fa-bell"></i> Petugas</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo $row_jpetugas['total_jpetugas']; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header text-muted"><b>&mdash; Ciptakan KebunKu Versimu</b></h5>
                                <div class="card-body p-0">
                                    <p>Kebunku merupakan perusahaan berbasis IT yang bergerak di bidang UMKM. Kebunku di dirikan tahun 2021 dengan nama tim NECode. Berdasarkan namanya Kebunku merupakan
                                        perusahaan yang mengumpulkan supplier untuk mendistribusikan dan menawarkan produk produk berupa tanaman hias. Perusahaan Kebunku mempunyai slogan “Ciptakan Kebunku Versimu”.
                                        Kami menciptakan perusahaan berharap nantinya UMKM menjadi lebih maju dan bisa bersaing dengan pesat.
                                        Untuk membeli produk kami dapat didapatkan dari e-commerce seperti shopee tokopedia dan lainnya. Dan untuk lebih lengkapnya dapat di cari pada website kami</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header text-muted"><b>&mdash; Stok Product < 20</b>
                                </h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr align="center">
                                                    <th>NO</th>
                                                    <th>Nama Produk</th>
                                                    <th>Jenis</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM tb_produk p inner join tb_jenisproduk j on p.id_jenisproduk=j.id_jenisproduk WHERE p.stok<=20";
                                                $i = 0;
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $i++;
                                                        echo "<tr>";
                                                        echo "<td align='center'>" . $i . "</td>";
                                                        echo "<td width='300'>" . $row['nama'] . "</td>";
                                                        echo "<td width='200'>" . $row['nama_jenis'] . "</td>";
                                                        echo "<td> Rp." . $row['harga'] . "</td>";
                                                        echo "<td align='center'>" . $row['stok'] . "</td>";
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