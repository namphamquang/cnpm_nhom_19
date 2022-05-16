<?php
include_once __DIR__ . "/connectDB.php";

$db = new Database("localhost:3306", "root", "11301130nam.", "webshop");
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuthTokenProvider.php";
include "PHPMailer-master/src/OAuth.php";

include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$result = $db->showCart();
session_start();
$userInfo = isset($_SESSION["userInfo"]) ? $_SESSION["userInfo"] : null;
if ($userInfo == null) {
    echo 'Vui lòng Đăng nhập trước khi Thanh toán! <a href="login.php">Click vào đây để đến trang Đăng nhập</a>';
    die();
} else {
    // Nếu giỏ hàng trong session rỗng, return
    if ($result->fetch_assoc() == null) {
        echo 'Giỏ hàng rỗng. Vui lòng <a href="category.php">chọn sản phẩm</a> trước khi Thanh toán!';
        die();
    }

    $name = $userInfo["username"];
    $sql = <<<EOT
        SELECT *
        FROM `users` 
        WHERE username = '$name'
EOT;
    $result1 = $db->conn->query($sql);

    $khachhangRow;
    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        $khachhangRow = [
            "id" => $row["id"],
            "username" => $row["username"],
            "fullname" => $row["fullname"],
            "phone" => $row["phone"],
            "email" => $row["email"],
            "address" => $row["address"],
        ];
    }

    // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về

    $userid = $khachhangRow["id"];
    $orderdate = date("Y-m-d"); // Lấy ngày hiện tại theo định dạng yyyy-mm-dd
    $requireddate = date("Y-m-d");
    $address = $khachhangRow["address"];
    $status = 0; // Mặc định là 0 chưa thanh toán
    $ordermethod = 1; // Mặc định là 1

    $sqlInsertOrders = <<<EOT
    INSERT INTO orders (ordermethodid, userid, orderdate, requireddate, address, status)
    VALUES ('$ordermethod', '$userid', '$orderdate', '$requireddate', '$address', '$status')
EOT;
    $result2 = $db->conn->query($sqlInsertOrders);

    $sql1 = <<<EOT
        SELECT id
        FROM `orders` 
        ORDER BY id DESC LIMIT 1
EOT;
    $orderid;
    $result3 = $db->conn->query($sql1);
    while ($row1 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
        $orderid = $row1["id"];
    }

    $result4 = $db->showCart();
    while ($row2 = $result4->fetch_assoc()) {
        $productid = $row2["id"];
        $quantity = $row2["quantity"];
        $priceEach = $row2["price"];
        $sqlInsertOrderdetail = <<<EOT
        INSERT INTO orderdetail (productid, orderid, number, priceEach) 
            VALUES ('$productid', '$orderid', '$quantity', '$priceEach')
EOT;
        $result5 = $db->conn->query($sqlInsertOrderdetail);
    }

    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    //try {
    //Server settings
    // $mail->SMTPDebug = 2;                                   // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com"; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = "awildquangtien@gmail.com"; // SMTP username
    $mail->Password = "ogiqrefbzzrwiskd"; // SMTP password
    $mail->SMTPSecure = "tls"; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = "UTF-8";
    // Bật chế bộ tự mình mã hóa SSL
    $mail->SMTPOptions = [
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true,
        ],
    ];
    //Recipients
    $mail->setFrom("awildquangtien@gmail.com", "Gửi Mail SMTP");
    $mail->addAddress($khachhangRow["email"]); // Add a recipient
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name
    //Content
    $mail->isHTML(true); // Set email format to HTML

    // Tiêu đề Mail
    $mail->Subject = "[Đặt hàng thành công!] - Mã đơn hàng $orderid";

    // Nội dung Mail
    // Lưu ý khi thiết kế Mẫu gởi mail
    // - Chỉ nên sử dụng TABLE, TR, TD, và các định dạng cơ bản của CSS để thiết kế
    // - Các đường link/hình ảnh có sử dụng trong mẫu thiết kế MAIL phải là đường dẫn WEB có thật, ví dụ như logo,banner,...
    $templateDonHang = "<ul>";
    $templateDonHang .=
        "<li>Họ tên khách hàng: " . $khachhangRow["fullname"] . "</li>";
    $templateDonHang .=
        "<li>Địa chỉ khách hàng: " . $khachhangRow["address"] . "</li>";
    $templateDonHang .=
        "<li>Số điện thoại: " . $khachhangRow["phone"] . "</li>";
    $templateDonHang .= "<ul>";

    $stt = 1;
    $sum = 0;
    $templateChiTietDonHang = '<table border="1" width="100%">';
    $templateChiTietDonHang .= "<tr>";
    $templateChiTietDonHang .= "<td>STT</td>";
    $templateChiTietDonHang .= "<td>Sản phẩm</td>";
    $templateChiTietDonHang .= "<td>Size</td>";
    $templateChiTietDonHang .= "<td>Số lượng</td>";
    $templateChiTietDonHang .= "<td>Giá</td>";
    $templateChiTietDonHang .= "<td>Thành tiền</td>";
    $templateChiTietDonHang .= "</tr>";
    $result6 = $db->showCart();
    while ($row3 = $result6->fetch_assoc()) {
        $templateChiTietDonHang .= "<tr>";
        $templateChiTietDonHang .= "<td>" . $stt . "</td>";
        $templateChiTietDonHang .= "<td>" . $row3["name"] . "</td>";
        $templateChiTietDonHang .= "<td>" . $row3["size"] . "</td>";
        $templateChiTietDonHang .= "<td>" . $row3["quantity"] . "</td>";
        $templateChiTietDonHang .= "<td>" . $row3["price"] . "</td>";
        $templateChiTietDonHang .=
            "<td>" . $row3["quantity"] * $row3["price"] . "</td>";
        $templateChiTietDonHang .= "</tr>";
        $stt++;
        $sum = $sum + $row3["quantity"] * $row3["price"];
    }
    $templateChiTietDonHang .= "</table>";
    $templateTien = "<ul>";
    $templateTien .=
        "<li>Tổng số tiền cần thanh toán: " . $sum . " VND" . "</li>";
    $templateTien .= "<ul>";
    $body = <<<EOT
            <table border="1" width="100%">
                <tr>
                    <td colspan="2">
                        <img src="https://i.ibb.co/HFZ46Bg/logo1.png" style="width: 100px; height: 100px; border: 1px solid red;" />
                    </td>
                </tr>
                <tr>
                    <td>Đơn hàng vừa đặt</td>
                    <td>
                        <h2>Thông tin đơn hàng</h2>
                        $templateDonHang

                        <h2>Chi tiết đơn hàng</h2>
                        $templateChiTietDonHang

                        <h2></h2>
                        $templateTien
                    </td>
                </td>
            </table>
EOT;
    $mail->Body = $body;
    $mail->send();
    /*} catch (Exception $e) {
        echo 'Lỗi khi gởi mail: ', $mail->ErrorInfo;
    }*/

    // 5. Thực thi hoàn tất, điều hướng về trang Danh sách
    // Hủy dữ liệu giỏ hàng trong session
    //unset($_SESSION['giohangdata']);
    echo 'Đặt hàng thành công.  <a href="index.php">Bấm vào đây để quay về trang chủ</a>';
    $result7 = $db->deleteAll();
}
