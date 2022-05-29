<?php
session_start();
include('dbconn/dbconn.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KebunKu &mdash; Ciptakan KebunKu Versimu</title>
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
	<script src="js/respond.min.js"></script>
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
							<li class="active"><a href="index.php">HOME</a></li>
							<li><a href="about.php">ABOUT</a></li>
							<li><a href="product.php">PRODUCT</a></li>
							<li><a href="order.php">ORDER</a></li>
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

		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<?php
					$sql_prod = "SELECT * FROM tb_produk p inner join tb_jenisproduk j on p.id_jenisproduk=j.id_jenisproduk ORDER BY p.id_jenisproduk DESC LIMIT 3";
					$result_prod = $conn->query($sql_prod);
					if ($result_prod->num_rows > 0) {
						while ($row_prod = $result_prod->fetch_assoc()) {

					?>
							<li style="background-image: url(images/product/<?php echo $row_prod['foto']; ?>);">
								<div class="overlay-gradient"></div>
								<div class="container">
									<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
										<div class="slider-text-inner">
											<div class="desc">
												<span class="price">Rp<?php echo $row_prod['harga']; ?></span>
												<h2><?php echo $row_prod['nama']; ?></h2>
												<p><?php echo $row_prod['keterangan']; ?></p>
												<p><a href="order.php" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
											</div>
										</div>
									</div>
								</div>
							</li>
					<?php
						}
					} ?>
				</ul>
			</div>
		</aside>

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
							<p>Kini semua orang dapat menciptakan KebunKu sendiri dirumahnya masing-masing, tanpa harus khawatir dompet terkuras karena produk kami asli berasal dari Indonesia.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-paper-plane"></i>
							</span>
							<h3>Siap Kirim</h3>
							<p>Kami siap membantu Anda menciptakan KebunKu dirumah Anda masing-masing dimanapun Anda berada, tanpa perlu khawatir mengenai pengiriman produk.</p>
						</div>
					</div>
				</div>
				<p align="center"><a href="about.php" class="btn btn-primary btn-outline">Learn More About Us</a></p>
			</div>
		</div>
		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Our Products.</h2><span>Kami hanya menawarkan produk-produk berkualitas premium</span>
					</div>
				</div>

				<?php
				$i = 1;
				$sql_product = "SELECT * FROM tb_produk p inner join tb_jenisproduk j on p.id_jenisproduk=j.id_jenisproduk LIMIT 3";
				$result_product = $conn->query($sql_product);
				if ($result_product->num_rows > 0) {
					while ($row_product = $result_product->fetch_assoc()) {
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
					}
				}
				?>

			</div>
			<p align="center"><a href="product.php" class="btn btn-primary btn-outline">More</a></p>
		</div>

		<div id="fh5co-testimonial" class="fh5co-bg-section">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Happy Clients</h2>
						<span>Testimoni dari pelanggan setia kami</span>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row animate-box">
							<div class="owl-carousel owl-carousel-fullwidth">
								<?php
								$sql_testi = "SELECT * FROM tb_testimoni t inner join tb_produk p on t.id_produk=p.id_produk LIMIT 3";
								$result_testi = $conn->query($sql_testi);
								if ($result_testi->num_rows > 0) {
									while ($row_testi = $result_testi->fetch_assoc()) {

								?>
										<div class="item">
											<div class="testimony-slide active text-center">
												<figure>
													<?php echo "<img src='images/testimoni/" . $row_testi['foto_user'] . "' >"; ?>
												</figure>
												<span><?php echo $row_testi['nama_user']; ?> &mdash; <?php echo $row_testi['nama']; ?></span>
												<blockquote>
													<p>&ldquo;<?php echo $row_testi['testimoni']; ?>&rdquo;</p>
												</blockquote>
											</div>
										</div>
								<?php
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/branding/logo-mockup-4.png);">
			<div class="container">
				<div class="row">
					<div class="display-t">
						<div class="display-tc">
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-shopping-cart"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="1070" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Penjualan</span>

								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-heart"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="803" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Happy Clients</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-user"></i>
									</span>
									<span class="counter js-counter" data-from="0" data-to="9191" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Followers</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-clock"></i>
									</span>
									<span class="counter js-counter" data-from="0" data-to="2021" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Year Since</span>
								</div>
							</div>
						</div>
					</div>
				</div>
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