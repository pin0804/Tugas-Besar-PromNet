<?php
session_start();
include('dbconn/dbconn.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KebunKu &mdash; How To Order</title>
	<link rel="icon" href="images/branding/main-logo-icon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">




	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />



	<!-- Animate.css -->
	<link rel="stylesheet" href="pengunjung/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="pengunjung/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="pengunjung/css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="pengunjung/css/flexslider.css">


	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="pengunjung/css/owl.carousel.min.css">
	<link rel="stylesheet" href="pengunjung/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="pengunjung/css/style.css">

	<!-- Modernizr JS -->
	<script src="pengunjung/js/modernizr-2.6.2.min.js"></script>
	<script src="pengunjung/js/sweetalert.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>

	<![endif]-->

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><img src="images/branding/side-logo-5.png" width="120px"></a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="about.php">ABOUT</a></li>
							<li><a href="product.php">PRODUCT</a></li>
							<li class="active"><a href="order.php">ORDER</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li class="search">
								<div class="input-group">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"><a href="login-dashboard.php" class="cart" title="Login Petugas KebunKu"><span><i class="icon-user"></i></span>&nbsp;&nbsp;Login</a></button>
									</span>
								</div>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/branding/logo-mockup-2.png);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>Order</h1>
								<h2>KebunKu &mdash; Citapkan KebunKu Versimu</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Order Now At</h2>
						<span>KebunKu Official Store</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<a href="https://shopee.co.id/" target="_blank" title="Shopee KebunKu"><img src="images/store-logo/shopee.png" height="150px"></a>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<a href="https://www.tokopedia.com/" target="_blank" title="Tokopedia KebunKu"><img src="images/store-logo/tokopedia.png" height="150px"></a>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<a href="https://www.lazada.co.id/" target="_blank" title="Lazada KebunKu"><img src="images/store-logo/lazada.png" height="150px"></a>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<a href="https://www.blibli.com/" target="_blank" title="BliBli KebunKu"><img src="images/store-logo/blibli.png" height="150px"></a>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<a href="https://www.instagram.com/" target="_blank" title="Instagram KebunKu"><img src="images/store-logo/instagram.png" height="150px"></a>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<a href="https://wa.me/+6282297392245" target="_blank" title="WhatsApp"><img src="images/store-logo/whatsapp.png" height="150px"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="fh5co-contact-info">
							<h3>Get Close To Us</h3>
							<ul>
								<li class="address">Jl. Dr. Setiabudi No.229, Kec. Sukasari, <br>Kota Bandung, Jawa Barat 40154</li>
								<li class="phone"><a href="tel://6282297392245">+ 1235 2355 98</a></li>
								<li class="email"><a href="mailto:halo_kebunku@gmail.com">halo_kebunku@gmail.com</a></li>
							</ul>
						</div>

					</div>
					<div class="col-md-6 animate-box">
						<h3>Have a Question?</h3>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
							<div class="row form-group">
								<div class="col-md-12">
									<input type="text" name="txt_nama" id="subject" class="form-control" placeholder="Nama Anda" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<input type="email" name="txt_email" id="email" class="form-control" placeholder="Email Anda" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<textarea name="txt_pertanyaan" id="message" cols="30" rows="10" class="form-control" placeholder="Pertanyaan Anda..." required></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Kirim" class="btn btn-primary">
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>

		<div id="fh5co-started" class="mapouter">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Our Offline Store.</h2>
				</div>
			</div>
			<div class="gmap_canvas" align="center">
				<iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=upi&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				<a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a><br><br><br>
			</div>
		</div>


		<footer id="fh5co-footer" role="contentinfo">
			<div class="container">
				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy; 2021 All Rights Reserved.</small>
							<small class="block">Designed by NECode Team Computer Science Education</small>
						</p>
						<p>
						<ul class="fh5co-social-icons">
							<li><a href="http://maps.google.com/?q=Universitas+Pendidikan+Indonesia" target="_blank"><i class="icon-location"></i></a></li>
							<li><a href="https://www.facebook.com/"><i class="icon-facebook" target="_blank"></i></a></li>
							<li><a href="https://www.instagram.com/"><i class="icon-instagram" target="_blank"></i></a></li>
						</ul>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="pengunjung/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="pengunjung/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="pengunjung/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="pengunjung/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="pengunjung/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="pengunjung/js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="pengunjung/js/jquery.flexslider-min.js"></script>

	<!-- Main -->
	<script src="pengunjung/js/main.js"></script>
	<script type="text/javascript">
		function status() {
			swal({
				title: "Pertanyaan Berhasil Disimpan!	",
				text: "Terimakasih, tunggu balasan email dari kami.",
				icon: "success",
				button: "Ok",
			}).then(function() {
				window.location = 'order.php'
			});
		}
	</script>
	<?php
	$nama = $email = $pertanyaan = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (!empty($_POST['txt_nama']) && !empty($_POST['txt_email']) && !empty($_POST['txt_pertanyaan'])) {
			$nama = test_input($_POST['txt_nama']);
			$email = test_input($_POST['txt_email']);
			$pertanyaan = test_input($_POST['txt_pertanyaan']);
			$tgl_masuk = date("Y-m-d");

			$sql_insert = "INSERT INTO tb_pertanyaan (nama, email, pertanyaan, tgl_masuk, status) VALUE ('$nama', '$email', '$pertanyaan', '$tgl_masuk', 'Pending') ";
			if ($conn->query($sql_insert) ===  TRUE) {

				echo '<script type="text/javascript">status();</script>';
			} else {
				echo "Error : " . $sql_insert . "<br>" . $conn->error;
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