<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
if (!isset($_SESSION['userInfo']) || empty($_SESSION['userInfo'])) {
   echo 'Vui lòng Đăng nhập trước khi Thanh toán! <a href="/php/myhand/backend/auth/login.php">Click vào đây để đến trang Đăng nhập</a>';
   die;
} else {
   // Nếu giỏ hàng trong session rỗng, return
   if (!isset($_SESSION['giohangdata']) || empty($_SESSION['giohangdata'])) {
       echo 'Giỏ hàng rỗng. Vui lòng chọn Sản phẩm trước khi Thanh toán!';
       die;
   }
}