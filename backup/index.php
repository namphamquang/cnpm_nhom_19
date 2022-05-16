<?php
session_start();
$userInfo = isset($_SESSION['userInfo']) ? $_SESSION['userInfo'] : null;
?>
<!doctype html>
<html lang="en">
   <head>
      <title>SHOES SHOP</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="style1.css">
      <link rel="stylesheet" href="style.css"> 
      <link rel="stylesheet" href="prdt.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
   <body>
      <header>
         <div class="logo">
            <img src="images/logo1.png"
         </div>
         <div class="navbar" id = "home">
            <div class="menu">
               <li>
                  <a href = "index.php" >TRANG CHỦ</a>
               </li>
               <li>
                  <a href = "introduce.php">GIỚI THIỆU</a>
               </li>
               <li>
                  <a href = "category.php">SẢN PHẨM</a>
               </li>
               <li>
                  <a href="#container">LIÊN HỆ</a>
               </li>
               
            </div>
            <div class="iner-block-cart">
               <li> <a class="fa fa-shopping-bag" href="cart.php">MY CART</a></li>
               <li>
               <?php
                    if ($userInfo !== null) {
                        echo "Xin chào <b>" . $userInfo['username'] . "</b>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<a href='logout.php'>Đăng xuất</a>";
                    } else {
                        echo "<a href='login.php'>Đăng nhập</a>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<a href='register.php'>Đăng ký</a>";
                    }
                    ?>
               </li>
            </div>
         </div>
      </header>
      <section>
         <div class="slideshow-container">
            <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="images/maxresdefault.jpg" style="width:100%">
              <div class="text">ƯU ĐÃI LỚN MỖI NGÀY</div>
           </div>
            <div class="mySlides fade">
               <div class="numbertext">2 / 3</div>
               <img src="images/maxresdefault-1.jpg" style="width:100%">
               <div class="text">ĐỔI TRẢ TRONG VÒNG 30 NGÀY</div>
            </div>
            <div class="mySlides fade">
               <div class="numbertext">3 / 3</div>
               <img src="images/banner-quang-cao-giay-3.png" style="width:100%">
               <div class="text">FREESHIP TOÀN QUỐC</div>
            </div>
            <!-- Nút điều khiển mũi tên-->
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
         </div>
         <br>
         <!-- Nút tròn điều khiển slideshow-->
         <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <script>
               var slideIndex = 1;
                showSlides(slideIndex);
                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }
                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }
                function showSlides(n) {
                  var i;
                  var slides = document.getElementsByClassName("mySlides");
                  var dots = document.getElementsByClassName("dot");
                  if (n > slides.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                  }
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";
                  dots[slideIndex-1].className += " active";
                }
            </script>
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