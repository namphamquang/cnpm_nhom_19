<?php
session_start();
$userInfo = isset($_SESSION["userInfo"]) ? $_SESSION["userInfo"] : null;
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>CATEGORY</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style1.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>

	</head>

	<body>
		<header>
			<div class="logo">
				<img src="images/logo1.png" />
			</div>
			<div class="navbar" id="home">
				<div class="menu">
					<li>
						<a href="index.php">TRANG CHỦ</a>
					</li>
					<li>
						<a href="introduce.php">GIỚI THIỆU</a>
					</li>
					<li>
						<a href="category.php">SẢN PHẨM</a>
					</li>
					<li>
						<a href="#container">LIÊN HỆ</a>
					</li>
				</div>
				<div class="iner-block-cart">
					<li><a class="fa fa-shopping-bag" href="cart.php"> MY CART</a></li>
					<li>
						<?php if ($userInfo !== null) {
          echo "Xin chào <b>" . $userInfo["username"] . "</b>";
          echo "&nbsp;&nbsp;&nbsp;";
          echo "<a href='logout.php'>Đăng xuất</a>";
      } else {
          echo "<a href='login.php'>Đăng nhập</a>";
          echo "&nbsp;&nbsp;&nbsp;";
          echo "<a href='register.php'>Đăng ký</a>";
      } ?>
					</li>
				</div>
			</div>
		</header>

		<section>
			<div id="main-content" class="intro_content">
				<div class="intro_title">
					<h1>1.Danh Sách Sản Phẩm</h1>
					<div align="center">
						<table>
							<tr>
								<td>
									<a href="productdetail0.php">
										<img src="imagesp/0_0.webp" class="products" />
									</a>
								</td>
								<td>
									<a href="productdetail2.php">
										<img src="imagesp/2_0.webp" class="products" />
									</a>
								</td>
							</tr>
							<tr class="pr_name">
								<td>
									<a href="productdetail0.php" class="pr_name"> Nike Air Monarch IV </a>
								</td>
								<td>
									<a href="productdetail2.php" class="pr_name"> Nike Air Max 90 </a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="productdetail3.php">
										<img src="imagesp/3_0.webp" class="products" />
									</a>
								</td>
								<td>
									<a href="productdetail4.php">
										<img src="imagesp/4_0.jpg" class="products" />
									</a>
								</td>
							</tr>
							<tr class="pr_name">
								<td>
									<a href="productdetail3.php" class="pr_name"> Nike Force 1 LV8 </a>
								</td>
								<td>
									<a href="productdetail4.php" class="pr_name"> Nike Revolution </a>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="intro_title">
					<h1>2.Các Sản Phẩm Bạn Có Thể Thích</h1>
					<div align="center">
						<table>
							<tr>
								<td>
									<a href="productdetail0.php" id="abc">
										<img src="images/sp5.jpg" class="products" />
									</a>
								</td>
								<td>
									<a href="productdetail0.php">
										<img src="images/sp6.jpg" class="products" />
									</a>
								</td>
								<td>
									<a href="productdetail0.php">
										<img src="images/sp7.jpg" class="products" />
									</a>
								</td>
							</tr>
							<tr class="pr_name">
								<td>
									<a href="productdetail0.php" class="pr_name"> Nike Revolution </a>
								</td>
								<td>
									<a href="productdetail0.php" class="pr_name"> Nike Revolution </a>
								</td>
								<td>
									<a href="productdetail0.php" class="pr_name"> Nike Revolution </a>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container" id="container">
				<!--Bắt Đầu Nội Dung Giới Thiệu-->
				<div class="noi-dung about">
					<h2>Về Chúng Tôi</h2>
					<p>Các mạng xã hội</p>
					<ul class="social-icon">
						<li>
							<a href=""><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-youtube"></i></a>
						</li>
					</ul>
				</div>
				<!--Kết Thúc Nội Dung Giới Thiệu-->
				<!--Bắt Đầu Nội Dung Đường Dẫn-->
				<div class="noi-dung links">
					<h2>Đường Dẫn</h2>
					<ul>
						<li><a href="#home">Trang Chủ</a></li>
						<li><a href="introduce.php">Về Chúng Tôi</a></li>
						<li><a href="#">Dịch Vụ</a></li>
						<li><a href="#">Điều Kiện Chính Sách</a></li>
					</ul>
				</div>
				<!--Kết Thúc Nội Dung Đường Dẫn-->
				<!--Bắt Đâu Nội Dung Liên Hệ-->
				<div class="noi-dung contact">
					<h2>Thông Tin Liên Hệ</h2>
					<ul class="info">
						<li>
							<span><i class="fa fa-map-marker"></i></span>
							<span>KTX Mỹ Đình<br />
								Nam Từ Liêm, Thành Phố Hà Nội<br />
								Việt Nam</span>
						</li>
						<li>
							<span><i class="fa fa-phone"></i></span>
							<p>
								<a href="#">+84 123 456 789</a>
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
				<!--Kết Thúc Nội Dung Liên Hệ-->
			</div>
		</footer>
	</body>

</html>