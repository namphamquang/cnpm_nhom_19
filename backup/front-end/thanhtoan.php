<?php
 include_once(__DIR__ . '/connectDB.php');
 
 $db = new Database('localhost:3306', 'root', '11301130nam.', 'webshop');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$result = $db->showCart();
session_start();
$userInfo = isset($_SESSION['userInfo']) ? $_SESSION['userInfo'] : null;
if ($userInfo==null) {
   echo 'Vui lòng Đăng nhập trước khi Thanh toán! <a href="/php/myhand/backend/auth/login.php">Click vào đây để đến trang Đăng nhập</a>';
   die;
} else {
   // Nếu giỏ hàng trong session rỗng, return
   if ($result->fetch_assoc() == null) {
       echo 'Giỏ hàng rỗng. Vui lòng chọn Sản phẩm trước khi Thanh toán!';
       die;
   }
   
   $name = $userInfo['username'];
   $sql = <<<EOT
        SELECT *
        FROM `users` 
        WHERE username = '$name'
EOT; 
    $result1 = $db->conn->query($sql);
   
    $khachhangRow;
    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        echo $row['id'];
        //echo $row['username'];
        echo $row['email'];
        echo $row['address'];
    }
    
    // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    echo 'hhh';
}