<?php
 include_once(__DIR__ . '/connectDB.php');
 require_once __DIR__ . "/config.php";
require_once __DIR__ . "/Db.php";
 $db = new Database('localhost:3306', 'root', '11301130nam.', 'webshop');
 
 include  "PHPMailer-master/src/PHPMailer.php";
include  "PHPMailer-master/src/Exception.php";
include  "PHPMailer-master/src/OAuthTokenProvider.php";
include  "PHPMailer-master/src/OAuth.php";
include  "PHPMailer-master/src/POP3.php";
include  "PHPMailer-master/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//$result = $db->showCart();
session_start();
$submit = isset($_POST['submit']) ? $_POST['submit'] : null;
$userid = isset($_POST['userid']) ? $_POST['userid'] : null;
$username = isset($_POST['username']) ? $_POST['username'] : null;
$orderid = isset($_POST['orderid']) ? $_POST['orderid'] : null;
if ($submit === 'yes') {
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
        $fullname  =$row['fullname'];
        $umail  =$row['email'];
        $uaddress= $row['address'];
    }                    // Passing `true` enables exceptions
    //try {
        $mail = new PHPMailer(true);
        //Server settings
       // $mail->SMTPDebug = 2;                                   // Enable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'awildquangtien@gmail.com'; // SMTP username
        $mail->Password = 'ogiqrefbzzrwiskd';                   // SMTP password
        $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                      // TCP port to connect to
        $mail->CharSet = "UTF-8";
        // B???t ch??? b??? t??? m??nh m?? h??a SSL
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $mail->setFrom('awildquangtien@gmail.com', 'G???i Mail SMTP');
        $mail->addAddress($umail);               // Add a recipient
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name
        //Content
        $mail->isHTML(true);                                    // Set email format to HTML

        // Ti??u ????? Mail
        $mail->Subject = "[C?? ????n h??ng v???a thanh to??n] - M?? ????n h??ng $orderid";

        // N???i dung Mail
        // L??u ?? khi thi???t k??? M???u g???i mail
        // - Ch??? n??n s??? d???ng TABLE, TR, TD, v?? c??c ?????nh d???ng c?? b???n c???a CSS ????? thi???t k???
        // - C??c ???????ng link/h??nh ???nh c?? s??? d???ng trong m???u thi???t k??? MAIL ph???i l?? ???????ng d???n WEB c?? th???t, v?? d??? nh?? logo,banner,...
        $templateDonHang = '<ul>';
        $templateDonHang .= '<li>H??? t??n kh??ch h??ng: ' . $fullname . '</li>';
        $templateDonHang .= '<li>?????a ch??? kh??ch h??ng: ' . $uaddress . '</li>';
        $templateDonHang .= '<ul>';

        
        $body = <<<EOT
            <table border="1" width="100%">
                <tr>
                    <td colspan="2">
                        <img src="https://i.ibb.co/HFZ46Bg/logo1.png" style="width: 100px; height: 100px; border: 1px solid red;" />
                    </td>
                </tr>
                <tr>
                    <td>C?? ????n h??ng v???a thanh to??n</td>
                    <td>
                        <h2>Th??ng tin ????n h??ng</h2>
                        $templateDonHang
                    </td>
                </td>
            </table>
EOT;
        $mail->Body    = $body;
        $mail->send();
            $sql1 = "UPDATE orders set status = 1 WHERE userid = '$userid' AND id = '$orderid'";
            $result1 = $db->conn->query($sql1);

        }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>????ng nh???p v??o website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
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
                    <h1>C???p nh???t tr???ng th??i thanh to??n</h1>
                    
                    <div class="input-box">
                        <input type="text" placeholder="Nh???p m?? kh??ch h??ng" name="userid" value = "<?= $userid ?>">
                    </div>    
                    <div class="input-box">
                        <input type="text" placeholder="Nh???p username" name="username" value="<?= $username ?>">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Nh???p m?? ????n h??ng" name="orderid" value = "<?= $orderid ?>">
                    </div>
                    <div class="btn-box">
                    
                        <button type="submit" name="submit" value="yes">
                            C???p nh???t
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