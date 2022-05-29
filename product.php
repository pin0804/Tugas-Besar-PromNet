<?php
include('dbconn/dbconn.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KebunKu &mdash; Our Products</title>
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
							<li><a href="about.php">ABOUT</a></li>
							<li class="active"><a href="product.php">PRODUCT</a></li>
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

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/branding/logo-mockup-3.png);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>Product</h1>
								<h2>KebunKu &mdash; Citapkan KebunKu Versimu</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Our Products.</h2><span>Kami hanya menawarkan produk-produk berkualitas premium</span>
					</div>
				</div>

				<?php
				$i = 1;
				$sql_product = "SELECT * FROM tb_produk p inner join tb_jenisproduk j on p.id_jenisproduk=j.id_jenisproduk";
				$result_product = $conn->query($sql_product);
				if ($result_product->num_rows > 0) {
					while ($row_product = $result_product->fetch_assoc()) {
						if ($i == 1) {
							echo "<div class='row'>";
						}
				?>
						<div class="col-md-4 text-center animate-box">
							<div class="product">
								<div class="product-grid" style="background-image:url(images/product/<?php echo $row_product['foto']; ?>);"></div>
								<div class="desc">
									<h3><a href="detail-product.php?id_detail=<?php echo $row_product['id_produk']; ?>"><?php echo $row_product['nama']; ?></a></h3>
									<span class="price">Rp, <?php echo $row_product['harga']; ?></span>
								</div>
							</div>
						</div>
				<?php
						if ($i <= 3) {
							$i++;
							if ($i == 4) {
								$i = 1;
							}
						}
						if ($i == 1) {
							echo "</div>";
						}
					}
				}
				?>

			</div>
		</div>
		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-thumbs-up"></i>
							</span>
							<h3>Kualitas Premium</h3>
							<p>Ratusan pelanggan kami membuktikan bahwa produk tanaman hias, bibit tanaman, pupuk, pot, dan alat berkebun yang kami tawarkan berkualitas premium.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<h3>Harga Bersahabat</h3>
							<p>Kini semua orang dapat menciptakan KebunKu sendiri dirumahnya masing-masing, tanpa harus khawatir dompet terkuras. Kami menawarkan produk-produk premium dengan harga yang besahabat karena produk kami asli berasal dari Indonesia.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-paper-plane"></i>
							</span>
							<h3>Siap Kirim</h3>
							<p>Kami siap membantu Anda menciptakan KebunKu dirumah Anda masing-masing dimanapun Anda berada, tanpa perlu khawatir mengenai pengiriman produk. Kami menjamin produk sampai ditangan Anda dengan selamat dan kami menyediakan garansi pengiriman gratis.</p>
						</div>
					</div>
				</div>
				<p align="center"><a href="about.php" class="btn btn-primary btn-outline">Learn More About Us</a></p>
			</div>
		</div>

		<div id="fh5co-started">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2">
						<form class="form-inline">
							<div class="col-md-6 col-sm-6 text-center fh5co-heading">
								<div class="form-group">
									<h2>Tertarik Dengan Produk Kami ?</h2>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<a href="order.php"><button type="button" class="btn btn-default btn-block">How To Order</button></a>
							</div>
						</form>
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