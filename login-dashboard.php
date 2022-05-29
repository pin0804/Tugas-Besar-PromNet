<?php
session_start();
include('dbconn/dbconn.php');
session_destroy();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Dashboard &mdash; KebunKu</title>
    <link rel="icon" href="images/branding/main-logo-icon.ico">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dashboard/vendor/bootstrap/css/bootstrap.min.css">
    <link href="dashboard/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard/libs/css/style.css">
    <link rel="stylesheet" href="dashboard/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="pengunjung/js/sweetalert.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background: url(images/branding/logo-mockup-1.png)no-repeat center fixed;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <img src="images/branding/side-logo-5.png" height="40px">
                <div class="card-body">
                    <form action="login-dashboard.php" method="POST">
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="txt_username" type="text" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="txt_password" type="password" placeholder="Password" required>
                        </div>
                        <button type="submit" name="btn_masuk" class="btn btn-primary btn-lg btn-block">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="dashboard/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.js"></script>

        <script type="text/javascript">
            function status() {
                swal({
                    title: "Username atau Password Salah	",
                    text: "Silahkan login ulang.",
                    icon: "error",
                    button: "Ok",
                }).then(function() {
                    window.location = 'login-dashboard.php'
                });
            }
        </script>
        <?php

        if (isset($_POST['btn_masuk'])) {
            session_start();
            if (!empty($_POST['txt_username']) && !empty($_POST['txt_password'])) {
                $username = $_POST['txt_username'];
                $password = $_POST['txt_password'];

                $sql = "SELECT * FROM tb_petugas WHERE username='$username' AND password='$password' limit 1";
                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0) {
                    $cek = mysqli_fetch_array($result);
                    $_SESSION['id_petugas'] = $cek['id_petugas'];
                    $_SESSION['nama'] = $cek['nama'];
                    $_SESSION['foto'] = $cek['foto'];
                    $_SESSION['username'] = $cek['username'];
                    $_SESSION['password'] = $cek['password'];
                    echo "<script type='text/javascript'>window.location='dashboard.php'; </script>";
                } else {
                    echo '<script type="text/javascript">status();</script>';
                }
            }
        }

        ?>
</body>

</html>