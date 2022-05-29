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
    $id_pertedit = $_GET['update_id'];
} else {
    $id_pertedit = $_POST['update_id'];
}

$sql_select = "SELECT * FROM tb_pertanyaan WHERE id_pertanyaan='$id_pertedit'";
$result_select = $conn->query($sql_select);
$row_select = $result_select->fetch_assoc();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard &mdash; Edit Jenis Produk</title>
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
                                <a class="nav-link " href="dashboard-jenis-produk.php"><i class="fa fa-th-list" aria-hidden="true"></i>Data Jenis Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="dashboard-produk.php"><i class="fa fa-list-alt" aria-hidden="true"></i>Data Produk</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="dashboard-pertanyaan.php"><i class="fa fa-question-circle" aria-hidden="true"></i>Data Pertanyaan</a>
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
                            <h2 class="pageheader-title">Edit Pertanyaan</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard-pertanyaan.php">Data Pertanyaan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                <div class="float-left">
                                    <h3 class="mb-0">ID Pertanyaan : <?php echo $row_select['id_pertanyaan']; ?></h3>
                                </div>
                                <div class="float-right">
                                    <a href="#" data-toggle="modal" data-target="#exampleUnduh" title="Export Data ke File PDF" class='btn btn-primary active btn-sm'>
                                        <i class=" fas fa-print"></i>&nbsp;&nbsp;Print</a>&nbsp;&nbsp;
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center" colspan="2" style="color: #800;">
                                                    <?php
                                                    if ($row_select['status'] == "Pending") {
                                                        echo "<p style='color:red;'>" . $row_select['status'] . "</p>";
                                                    } else {
                                                        echo "<p style='color:green;'>" . $row_select['status'] . "</p>";
                                                    }
                                                    ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center" width="150"><b>Nama Penanya</b></td>
                                                <td class="left"><?php echo $row_select['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Jenis Produk</b></td>
                                                <td class="left"><?php echo "<a href='mailto:" . $row_select['email'] . "' target='_blank'>" . $row_select['email'] . "</a>"; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Tanggal Masuk</b></td>
                                                <td class="left"><?php echo $row_select['tgl_masuk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="150"><b>Pertanyaan</b></td>
                                                <td class="left"><?php echo $row_select['pertanyaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <form id="validationform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                                                    <td class="center" width="150"><b>Status</b></td>
                                                    <td><label class="custom-control custom-radio">
                                                            <input type="radio" name="txt_status" value="Pending" <?php if ($row_select['status'] == "Pending") {
                                                                                                                        echo "checked";
                                                                                                                    } ?> class="custom-control-input">
                                                            <span class="custom-control-label">Pending</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" name="txt_status" value="Dijawab" <?php if ($row_select['status'] == "Dijawab") {
                                                                                                                        echo "checked";
                                                                                                                    } ?> class="custom-control-input">
                                                            <span class="custom-control-label">Dijawab</span>
                                                        </label>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <input type="hidden" name="update_id" value="<?php echo $row_select['id_pertanyaan'] ?>">
                                                <td colspan="2" align="right">
                                                    <button type="submit" name="btn_edit" class="btn btn-space btn-primary">Ubah Status</button>
                                                </td>
                                            </tr>
                                            </form>
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
                        window.location = 'dashboard-pertanyaan.php'
                    });
                }

                function gagal() {
                    swal({
                        title: "Gagal Mengubah Data",
                        text: "Harap Coba Kembali",
                        icon: "error",
                        button: "Ok",
                    }).then(function() {
                        window.location = 'dashboard-pertanyaan.php'
                    });
                }
            </script>
            <?php
            $status = $id_edit = $statusErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["txt_status"])) {
                    $statusErr = "Status produk harus diisi";
                } else {
                    $status = test_input($_POST['txt_status']);
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $status)) {
                        $statusErr = "Hanya huruf besar, kecil dan spasi putih yang diizinkan";
                    }
                }
                $id_edit = test_input($_POST['update_id']);
                if (!empty($status)) {
                    $sql_update = "UPDATE tb_pertanyaan SET status = '$status' WHERE id_pertanyaan = '$id_edit' ";
                    if ($conn->query($sql_update) === TRUE) {
                        echo "<script>berhasil();</script>";
                    } else {
                        echo "<script>gagal();</script>";
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