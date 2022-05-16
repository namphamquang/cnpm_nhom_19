<?php
session_start();
$userInfo = isset($_SESSION["userInfo"]) ? $_SESSION["userInfo"] : null;
?>
<!doctype html>
<html lang="en">

	<head>
		<title>GIỚI THIỆU</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/intro_style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style1.css">
		<link rel="stylesheet" href="css/prdt.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<body>
		<header>
			<div class="logo">
				<img src="images/logo1.png" </div> <div class="navbar" id="home">
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
					<li> <a class="fa fa-shopping-bag" href="cart.php">MY CART</a></li>
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
					<h1>1.Giới thiệu</h1>
					<p>Nhiệm vụ của chúng tôi là điều thúc đẩy chúng tôi làm mọi thứ có thể để mở rộng tiềm năng của con người. Chúng tôi làm điều đó bằng cách tạo ra những đổi mới thể thao đột phá, bằng cách làm cho sản phẩm của chúng tôi bền vững hơn, bằng cách xây dựng một đội ngũ toàn cầu sáng tạo và đa dạng và bằng cách tạo ra tác động tích cực trong các cộng đồng nơi chúng tôi sống và làm việc.

						Nike Store là đối tác chính thức của Nike tại Việt Nam. Hệ thống trải dài khắp các tỉnh thành trên cả nước, phục vụ nhu cầu của khách hàng với những sản phẩm cực chất lượng và ấn tượng. Các tín đồ của Nike của dễ dàng tìm thấy những đôi giày đúng nghĩa tại hệ thống cửa hàng Nike Store.</p>
					<img class="intro_image" src="images/intro.jpg">
				</div>
				<div class="intro_title">
					<h1>2.Cửa hàng chuyên bán giày thể thao</h1>
					<p>Bạn đang tìm mua một đôi giày thể thao mạnh mẽ cá tính? Bạn đang cần một đôi giày thanh nhã, lich sự? Bạn có nhu cầu về một đôi giày để đảm bảo an toàn, thoải mái khi chơi thể thao hay đơn giản là một đôi giày du lịch để dạo bước tới những nơi bạn thích? Tất cả đều được đáp ứngt. Hãy ghé thăm Shop giày Nike, nơi có những đôi giày chính hãng của Nike, nơi có những sản phẩm mang đậm phong cách mà lại vô cùng chất lượng để thể hiện sự trẻ trung, thời thượng của bạn nhé!</p>
					<img class="intro_image" src="images/intro1.jpg">
					<p>Chúng tôi là một trong những nơi sưu tầm có khối lượng giày hiếm siêu khủng. Có những mẫu giày cực kì hype được giới sưu tầm săn lùng, thậm chí bạn sẽ bắt gặp nhiều mẫu lạ mới mà hiếm shop nào có. Có những mẫu chỉ có độc nhất 1 đôi. Ngoài ra những mẫu đang rất HOT trên thị trường sneaker về liên tục nên các bạn cứ yên tâm không sợ hết hàng.</p>
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
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-instagram"></i></a></li>
						<li><a href=""><i class="fa fa-youtube"></i></a></li>
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
							<span>Đường Số 1<br />
								Quận 1, Thành Phố Hồ Chí Minh<br />
								Việt Nam</span>
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
							<p><a href="#">diachiemail@gmail.com</a></p>
						</li>

					</ul>
				</div>
				<!--Kết Thúc Nội Dung Liên Hệ-->
			</div>
		</footer>
	</body>

</html>