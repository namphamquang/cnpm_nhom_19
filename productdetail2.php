<?php
session_start();
$userInfo = isset($_SESSION["userInfo"]) ? $_SESSION["userInfo"] : null;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>NIKE AIR MAX 90</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/prdt.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style type="text/css">
			body {
				font-family: Arial, Helvetica, sans-serif;
				overflow-x: hidden;
			}

			img {
				max-width: 100%;
			}

			.preview {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
				-ms-flex-direction: column;
				flex-direction: column;
			}

			@media screen and (max-width: 996px) {
				.preview {
					margin-bottom: 20px;
				}

			}

			.preview-pic {
				-webkit-box-flex: 1;
				-webkit-flex-grow: 1;
				-ms-flex-positive: 1;
				flex-grow: 1;
			}

			.preview-thumbnail.nav-tabs {
				border: none;
				margin-top: 15px;
			}

			.preview-thumbnail.nav-tabs li {
				width: 18%;
				margin-right: 2.5%;
			}

			.preview-thumbnail.nav-tabs li img {
				max-width: 100%;
				display: block;
			}

			.preview-thumbnail.nav-tabs li a {
				padding: 0;
				margin: 0;
				cursor: pointer;
			}

			.preview-thumbnail.nav-tabs li:last-of-type {
				margin-right: 0;
			}

			.tab-content {
				overflow: hidden;
			}

			.tab-content img {
				width: 100%;
				-webkit-animation-name: opacity;
				animation-name: opacity;
				-webkit-animation-duration: .3s;
				animation-duration: .3s;
			}

			.card {
				margin-top: 0px;
				background: #eee;
				padding: 3em;
				line-height: 1.5em;
			}

			@media screen and (min-width: 997px) {
				.wrapper {
					display: -webkit-box;
					display: -webkit-flex;
					display: -ms-flexbox;
					display: flex;
				}
			}

			.details {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
				-ms-flex-direction: column;
				flex-direction: column;
			}

			.colors {
				-webkit-box-flex: 1;
				-webkit-flex-grow: 1;
				-ms-flex-positive: 1;
				flex-grow: 1;
			}

			.product-title,
			.price,
			.sizes,
			.colors {
				text-transform: UPPERCASE;
				font-weight: bold;
			}

			.checked,
			.price span {
				color: #ff9f1a;
			}

			.product-title,
			.rating,
			.product-description,
			.price,
			.vote,
			.sizes {
				margin-bottom: 15px;
			}

			.product-title {
				margin-top: 0;
			}

			.size {
				margin-right: 10px;
			}

			.size:first-of-type {
				margin-left: 40px;
			}

			.color {
				display: inline-block;
				vertical-align: middle;
				margin-right: 10px;
				height: 2em;
				width: 2em;
				border-radius: 2px;
			}

			.color:first-of-type {
				margin-left: 20px;
			}

			.add-to-cart,
			.like {
				background: #ff9f1a;
				padding: 1.2em 1.5em;
				border: none;
				text-transform: UPPERCASE;
				font-weight: bold;
				color: #fff;
				text-decoration: none;
				-webkit-transition: background .3s ease;
				transition: background .3s ease;
			}

			.add-to-cart:hover,
			.like:hover {
				background: #b36800;
				color: #fff;
				text-decoration: none;
			}

			.not-available {
				text-align: center;
				line-height: 2em;
			}

			.not-available:before {
				font-family: fontawesome;
				content: "\f00d";
				color: #fff;
			}

			.orange {
				background: #ff9f1a;
			}

			.green {
				background: #85ad00;
			}

			.blue {
				background: #0076ad;
			}

			.tooltip-inner {
				padding: 1.3em;
			}

			@-webkit-keyframes opacity {
				0% {
					opacity: 0;
					-webkit-transform: scale(3);
					transform: scale(3);
				}

				100% {
					opacity: 1;
					-webkit-transform: scale(1);
					transform: scale(1);
				}
			}

			@keyframes opacity {
				0% {
					opacity: 0;
					-webkit-transform: scale(3);
					transform: scale(3);
				}

				100% {
					opacity: 1;
					-webkit-transform: scale(1);
					transform: scale(1);
				}
			}

			.star {
				font-size: x-large;
				width: 50px;
				display: inline-block;
				color: gray;
			}

			.star:last-child {
				margin-right: 0;
			}

			.star:before {
				content: '\2605';
			}

			.star.on {
				color: gold;
			}

			.star.half:after {
				content: '\2605';
				color: gold;
				position: absolute;
				margin-left: -20px;
				width: 10px;
				overflow: hidden;
			}
		</style>
	</head>
	<?php
 include "connectDB.php";
 $db = new Database("localhost:3306", "root", "11301130nam.", "webshop");
 if (
     isset($_SERVER["REQUEST_METHOD"]) &&
     $_SERVER["REQUEST_METHOD"] == "POST" &&
     isset($_POST["submit"])
 ) {
     $name = $_POST["name"];
     $size = $_POST["size"];
     $result = $db->addPro($name, $size);
 }
 ?>

	<body>
		<header>
			<div class="logo">
				<img src="images/logo1.png" />
			</div>
			<div class="navbar" id="home">
				<div class="menu">
					<li>
						<a href="index.php">TRANG CH???</a>
					</li>
					<li>
						<a href="introduce.php">GI???I THI???U</a>
					</li>
					<li>
						<a href="category.php">S???N PH???M</a>
					</li>
					<li>
						<a href="#container">LI??N H???</a>
					</li>
				</div>
				<div class="iner-block-cart">
					<li> <a href="cart.php" class="fa fa-shopping-bag" href=""> MY CART</a></li>
					<li>
						<?php if ($userInfo !== null) {
          echo "Xin ch??o <b>" . $userInfo["username"] . "</b>";
          echo "&nbsp;&nbsp;&nbsp;";
          echo "<a href='logout.php'>????ng xu???t</a>";
      } else {
          echo "<a href='login.php'>????ng nh???p</a>";
          echo "&nbsp;&nbsp;&nbsp;";
          echo "<a href='register.php'>????ng k??</a>";
      } ?>
					</li>
				</div>
			</div>
		</header>
		<div class="container">
			<div class="card">
				<div class="container-fliud">
					<div class="wrapper row">
						<div class="preview col-md-6">
							<div class="preview-pic tab-content">
								<div class="tab-pane active" id="pic-1"><img src="imagesp/2_0.webp" /></div>
								<!-- <div class="tab-pane" id="pic-2"><img src="imagesp/0_1.webp" /></div>
                     <div class="tab-pane" id="pic-3"><img src="imagesp/0_2.webp" /></div>
                     <div class="tab-pane" id="pic-4"><img src="imagesp/0_3.webp" /></div>
                     <div class="tab-pane" id="pic-5"><img src="imagesp/0_4.webp" /></div>
                     <div class="tab-pane" id="pic-6"><img src="imagesp/0_5.webp" /></div> -->
							</div>
							<ul class="preview-thumbnail nav nav-tabs">
								<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="imagesp/2_0.webp" /></a></li>
								<!-- <li><a data-target="#pic-2" data-toggle="tab"><img src="imagesp/0_1.webp" /></a></li>
                     <li><a data-target="#pic-3" data-toggle="tab"><img src="imagesp/0_2.webp" /></a></li>
                     <li><a data-target="#pic-4" data-toggle="tab"><img src="imagesp/0_3.webp" /></a></li>
                     <li><a data-target="#pic-5" data-toggle="tab"><img src="imagesp/0_4.webp" /></a></li>
                     <li><a data-target="#pic-6" data-toggle="tab"><img src="imagesp/0_5.webp" /></a></li> -->
							</ul>
						</div>
						<div class="details col-md-6">
							<h3 class="product-title">Nike Air Max 90</h3>
							<p> Gi??y t???p nam
								<p>
									<div class="rating">
										<div class="stars"> <span class="star on"></span> <span class="star on"></span> <span class="star on"></span> <span class="star on"></span> <span class="star half"></span> </div>
										<span class="review-no">1073 ????nh gi??</span>
									</div>
									<p class="product-description">H??? TR??? T???NG TH??? CHO VI???C DI CHUY???N THO???I M??I.

										<p>Nike Air Monarch IV gi??p b???n t???p luy???n v???i l???p da b???n ??? tr??n ????? h??? tr???. B???t nh??? k???t h???p v???i ?????m Nike Air ????? t???o s??? tho???i m??i trong m???i s???i ch??n
											<p>
												<ol>
													<li>Leather and synthetic leather are durable with a classic look.
													<li>Full-length encapsulated Air-Sole unit cushions for comfort and support.
													<li>Solid rubber sole is durable and provides traction over varied surfaces.
														<ol>
											</p>
											<h4 class="price">Gi?? b??n: <span>500.000 ??</span></h4>
											<form method="POST" action="">
												<label>K??ch c??? b???n mu???n</label>

												<select name="size" multiple>
													<option value="S">S</option>
													<option value="M">M</option>
													<option value="L">L</option>
													<option value="XL">XL</option>
												</select>

												<input type="hidden" name="name" value="Nike Air Max 90">
												<br>
												<button class="add-to-cart btn btn-default" value="submit" name="submit"> TH??M</button>
												<button class="add-to-cart btn btn-default" onclick=" window.open('cart.php','_blank')"> Gi??? H??ng</button>
											</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container" id="container">
				<!--B???t ?????u N???i Dung Gi???i Thi???u-->
				<div class="noi-dung about">
					<h2>V??? Ch??ng T??i</h2>
					<p>C??c m???ng x?? h???i</p>
					<ul class="social-icon">
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-instagram"></i></a></li>
						<li><a href=""><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
				<!--K???t Th??c N???i Dung Gi???i Thi???u-->
				<!--B???t ?????u N???i Dung ???????ng D???n-->
				<div class="noi-dung links">
					<h2>???????ng D???n</h2>
					<ul>
						<li><a href="#home">Trang Ch???</a></li>
						<li><a href="introduce.php">V??? Ch??ng T??i</a></li>
						<li><a href="#">D???ch V???</a></li>
						<li><a href="#">??i???u Ki???n Ch??nh S??ch</a></li>
					</ul>
				</div>
				<!--K???t Th??c N???i Dung ???????ng D???n-->
				<!--B???t ????u N???i Dung Li??n H???-->
				<div class="noi-dung contact">
					<h2>Th??ng Tin Li??n H???</h2>
					<ul class="info">
						<li>
							<span><i class="fa fa-map-marker"></i></span>
							<span>KTX M??? ????nh<br />
								Nam T??? Li??m, Th??nh Ph??? H?? N???i<br />
								Vi???t Nam</span>
						</li>
						<li>
							<span><i class="fa fa-phone"></i></span>
							<p><a href="#">+84 123 456 789</a>
								<br />
								<a href="#">+84 987 654 321</a>
							</p>
						</li>
						<li>
							<span><i class="fa fa-envelope"></i></span>
							<p><a href="#">awildquangtien@gmail.com</a></p>
						</li>

					</ul>
				</div>
				<!--K???t Th??c N???i Dung Li??n H???-->
			</div>
		</footer>
	</body>

</html>