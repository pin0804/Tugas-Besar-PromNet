<?php
session_start();
include('dbconn/dbconn.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KebunKu &mdash; About Us</title>
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
							<li class="active"><a href="about.php">ABOUT</a></li>
							<li><a href="product.php">PRODUCT</a></li>
							<li><a href="order.php">ORDER</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li class="search">
								<div class="input-group">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"><a href="login-dashboard.php" class="cart"><span><i class="icon-user"></i></span>&nbsp;&nbsp;Login</a></button>
									</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/branding/logo-mockup-1.png);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>About Us</h1>
								<h2>KebunKu &mdash; Citapkan KebunKu Versimu</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-about">
			<div class="container">
				<div class="about-content">
					<div class="row animate-box">
						<div class="col-md-6">
							<div class="desc">
								<h3>KebunKu</h3>
								<p>Kebunku merupakan perusahaan berbasis IT yang bergerak di bidang UMKM. Kebunku di dirikan tahun 2021 dengan nama tim NECode. Berdasarkan namanya Kebunku merupakan perusahaan yang mengumpulkan supplier untuk mendistribusikan dan menawarkan produk produk berupa tanaman hias. </p>
							</div>
							<div class="desc">
								<h3>Motto KebunKu</h3>
								<p>Perusahaan Kebunku mempunyai slogan “Ciptakan Kebunku Versimu”. Kami menciptakan perusahaan berharap nantinya UMKM menjadi lebih maju dan bisa bersaing dengan pesat.
									Untuk membeli produk kami dapat didapatkan dari e-commerce seperti shopee tokopedia dan lainnya. Dan untuk lebih lengkapnya dapat di cari pada website kami</p>
							</div>
						</div>
						<div class="col-md-6">
							<img class="img-responsive" src="images/branding/logo-mockup-2.png" alt="about">
						</div>
					</div>
				</div>
				<div class="about-content">
					<div class="row animate-box">
						<div class="col-md-6">
							<img class="img-responsive" src="images/branding/building-logo-team.png" alt="about">
						</div>
						<div class="col-md-6">
							<div class="desc">
								<h3>NECode</h3>
								<p>Berhubungan dengan tema yang kita angkat yaitu UMKM yang bergerak di bidang tanaman, komponen bunga yang dianggap “krusial”, yakni nektar. Dari kata ‘nektar’ tersebut, kami pelesetkan menjadi NECode yang merupakan singkatan dari Native Educator’s Code. </p>
								<p>Nama NECode sendiri jika dibaca akan terdengar menjadi kata “Nekad/Nekat”, hal tersebut menunjukkan usaha kami dalam pembuatan web UMKM ini.</p>
							</div>
						</div>
					</div>
				</div>


				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Meet Our Team</h2>
						<span>NECode Staff</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
						<div class="fh5co-staff">
							<img src="images/necode-team/johannes.png" alt="Free HTML5 Templates by gettemplates.co">
							<h3>Johannes Alexander Putra</h3>
							<strong class="role">Team Leader</strong>
							<ul class="fh5co-social-icons">
								<li><a href="https://www.facebook.com/profile.php?id=100073165925671" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/johannesap_/" target="_blank"><i class="icon-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/johannes-alexander-putra-044833201?originalSubdomain=id" target="_blank"><i class="icon-linkedin"></i></a></li>
								<li><a href="https://github.com/Itsjohanes" target="_blank"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
						<div class="fh5co-staff">
							<img src="images/necode-team/nadira.png" alt="Free HTML5 Templates by gettemplates.co">
							<h3>Nadira Arevia Hermawan</h3>
							<strong class="role">Web Programmer</strong>
							<ul class="fh5co-social-icons">
								<li><a href="https://www.facebook.com/nadira.a.hermawan/" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/nadiraarevia/" target="_blank"><i class="icon-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/nadiraarevia/" target="_blank"><i class="icon-linkedin"></i></a></li>
								<li><a href="https://github.com/nadiraarevia" target="_blank"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
						<div class="fh5co-staff">
							<img src="images/necode-team/hanum.png" alt="Free HTML5 Templates by gettemplates.co">
							<h3>Hanum Salsabila</h3>
							<strong class="role">Graphic Designer</strong>
							<ul class="fh5co-social-icons">
								<li><a href="https://www.instagram.com/hanumsalsabilla/" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/nadiraarevia/" target="_blank"><i class="icon-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/hanum-salsabilla/" target="_blank"><i class="icon-linkedin"></i></a></li>
								<li><a href="https://github.com/hanumsalsabilla" target="_blank"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div><br><br><br>
				<div class="row">
					<div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeIn">
						<div class="fh5co-staff">
							<img src="images/necode-team/agfina.png" alt="Free HTML5 Templates by gettemplates.co">
							<h3>Agfina Aliarahma</h3>
							<strong class="role">Content Writer</strong>
							<ul class="fh5co-social-icons">
								<li><a href="https://www.facebook.com/agfina.aliarahma/" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/agfin.a/" target="_blank"><i class="icon-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/agfina-aliarahma/" target="_blank"><i class="icon-linkedin"></i></a></li>
								<li><a href="https://github.com/pin0804" target="_blank"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeIn">
						<div class="fh5co-staff">
							<img src="images/necode-team/viona.png" alt="Free HTML5 Templates by gettemplates.co">
							<h3>Viona Rosen</h3>
							<strong class="role">Content Writer</strong>
							<ul class="fh5co-social-icons">
								<li><a href="https://www.facebook.com/viona.rosen.9" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/vionarosen_/" target="_blank"><i class="icon-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/viona-rosen-245283227" target="_blank"><i class="icon-linkedin"></i></a></li>
								<li><a href="https://github.com/vionarosen" target="_blank"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
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

</body>

</html>