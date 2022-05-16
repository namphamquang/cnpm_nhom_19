<?php
include_once __DIR__ . "/connectDB.php";
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/Db.php";
$db = new Database("localhost:3306", "root", "11301130nam.", "webshop");

include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuthTokenProvider.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//$result = $db->showCart();
session_start();
$submit = isset($_POST["submit"]) ? $_POST["submit"] : null;
$userid = isset($_POST["userid"]) ? $_POST["userid"] : null;
$username = isset($_POST["username"]) ? $_POST["username"] : null;
$orderid = isset($_POST["orderid"]) ? $_POST["orderid"] : null;
if ($submit === "yes") {
    $fullname;
    $uaddress;
    $umail;
    $sql = <<<EOT
        SELECT *
        FROM `users` 
        WHERE id = '$userid' AND username  ='$username'
EOT;
    $result = $db->conn->query($sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $row["fullname"];
        $umail = $row["email"];
        $uaddress = $row["address"];
    } 
    $mail = new PHPMailer(true);
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
    $mail->addAddress($umail); // Add a recipient
    
    $mail->isHTML(true); // Set email format to HTML

    // Tiêu đề Mail
    $mail->Subject = "[Có đơn hàng vừa thanh toán] - Mã đơn hàng $orderid";

    // Nội dung Mail
    // Lưu ý khi thiết kế Mẫu gởi mail
    // - Chỉ nên sử dụng TABLE, TR, TD, và các định dạng cơ bản của CSS để thiết kế
    // - Các đường link/hình ảnh có sử dụng trong mẫu thiết kế MAIL phải là đường dẫn WEB có thật, ví dụ như logo,banner,...
    $templateDonHang = "<ul>";
    $templateDonHang .= "<li>Họ tên khách hàng: " . $fullname . "</li>";
    $templateDonHang .= "<li>Địa chỉ khách hàng: " . $uaddress . "</li>";
    $templateDonHang .= "<ul>";

    $body = <<<EOT
            <table border="1" width="100%">
                <tr>
                    <td colspan="2">
                        <img src="https://i.ibb.co/HFZ46Bg/logo1.png" style="width: 100px; height: 100px; border: 1px solid red;" />
                    </td>
                </tr>
                <tr>
                    <td>Có Đơn hàng vừa thanh toán</td>
                    <td>
                        <h2>Thông tin đơn hàng</h2>
                        $templateDonHang
                    </td>
                </td>
            </table>
EOT;
    $mail->Body = $body;
    $mail->send();
    $sql1 = "UPDATE orders set status = 1 WHERE userid = '$userid' AND id = '$orderid'";
    $result1 = $db->conn->query($sql1);
}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Cập nhật đơn hàng</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/login.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<header>
			<div class="container">
			</div>
		</header>
		<main>
			<div class="container">
				<div class="login-form">
					<form action="" method="post">
						<h1>Cập nhật trạng thái thanh toán</h1>

						<div class="input-box">
							<input type="text" placeholder="Nhập mã khách hàng" name="userid" value="<?= $userid ?>">
						</div>
						<div class="input-box">
							<input type="text" placeholder="Nhập username" name="username" value="<?= $username ?>">
						</div>
						<div class="input-box">
							<input type="text" placeholder="Nhập mã đơn hàng" name="orderid" value="<?= $orderid ?>">
						</div>
						<div class="btn-box">

							<button type="submit" name="submit" value="yes">
								Cập nhật
							</button>
						</div>

					</form>
				</div>
			</div>
		</main>
		<footer>
			<div class="container">
			</div>
		</footer>
	</body>

</html>