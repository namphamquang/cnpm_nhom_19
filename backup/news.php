<?php
session_start();
$userInfo = isset($_SESSION['userInfo']) ? $_SESSION['userInfo'] : null;
?>
<!doctype html>
<html lang="en">
<head>
      <title>GIỚI THIỆU</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="CSS/intro_style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="style.css"> 
      <link rel="stylesheet" href="style1.css">
      <link rel="stylesheet" href="prdt.css">
    
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                  <a href="category.php">SẢN PHẨM</a>
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