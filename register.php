<?php
session_start();
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/Db.php";

$db = new Db();
$db->table("users");

$submit = isset($_POST["submit"]) ? $_POST["submit"] : null;
$username = isset($_POST["username"]) ? $_POST["username"] : null;
$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;
//$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$canRegister = null;
$validateError = [
    "username" => [],
    "fullname" => [],
    "password" => [],
    //'gender' => [],
    "phone" => [],
    "email" => [],
];

if ($submit === "yes") {
    // Validate for username
    if (strlen($username) < 8) {
        array_push(
            $validateError["username"],
            "Tên đăng nhập tối thiểu là 8 ký tự"
        );
    }
    if (strlen($username) > 255) {
        array_push(
            $validateError["username"],
            "Tên đăng nhập tối đa là 255 ký tự"
        );
    }
    if (strlen($username) >= 8 && strlen($username) <= 255) {
        $existedUser = $db
            ->where([
                "username" => $username,
            ])
            ->get()
            ->result();
        if ($existedUser !== false) {
            array_push(
                $validateError["username"],
                "Tên đăng nhập đã được sử dụng trước đó, vui lòng chọn tên đăng nhập khác"
            );
        }
    }
    // Validate for fullname

    if (strlen($fullname) < 8) {
        array_push($validateError["fullname"], "Vui lòng nhập tên thật");
    }
    if (strlen($fullname) > 255) {
        array_push($validateError["fullname"], "Vui lòng nhập tên thật");
    }

    // Validate for password
    if (strlen($password) < 8) {
        array_push($validateError["password"], "Mật khẩu tối thiểu là 8 ký tự");
    }

    $match = false;
    preg_match("/[A-Z]/", $password, $match);
    if (!$match) {
        array_push(
            $validateError["password"],
            "Mật khẩu phải gồm ít nhất một ký tự in hoa"
        );
    }

    $match = false;
    preg_match("/\d/", $password, $match);
    if (!$match) {
        array_push(
            $validateError["password"],
            "Mật khẩu phải gồm ít nhất một ký tự số"
        );
    }

    $match = false;
    preg_match("/[^A-z0-9]/", $password, $match);
    if (!$match) {
        array_push(
            $validateError["password"],
            "Mật khẩu phải gồm ít nhất một ký tự đặc biệt"
        );
    }

    // Validate for gender
    //if (!in_array($gender, ['0', '1'], true)) {
    //    array_push($validateError['gender'], "Giới tính phải là 0 (nữ) hoặc 1 (nam)");
    // }

    // Validate for phone
    if (strlen($phone) < 9) {
        array_push($validateError["phone"], "Điện thoại tối thiểu là 9 ký tự");
    }
    if (strlen($phone) > 50) {
        array_push($validateError["phone"], "Điện thoại tối đa là 50 ký tự");
    }

    // Validate for email
    $match = false;
    preg_match(
        "/^([0-9A-Za-z\!\%\_\^\&\*\+\=\`\'\.])+\@([0-9A-Za-z\.])+$/",
        $email,
        $match
    );
    if (!$match) {
        array_push($validateError["email"], "Địa chỉ email không hợp lệ");
    }

    // If you want to display the error variable, uncomment the line bellow
    //print_r($validateError);

    $canRegister =
        empty($validateError["username"]) &&
        empty($validateError["password"]) &&
        empty($validateError["fullname"]) &&
        empty($validateError["phone"]) &&
        empty($validateError["email"]);

    if ($canRegister) {
        // Register the new user
        $db->reset()->insert([
            "username" => $username,
            "fullname" => $fullname,
            "password" => md5($password),
            //'m_gender' => $gender,
            "phone" => $phone,
            "email" => $email,
            "address" => $address,
        ]);
        if ($db->getErrorText() === null) {
            // Đăng ký thành công
            $_SESSION["userInfo"] = [
                "username" => $username,
                //'gender' => $gender,
                "phone" => $phone,
                "email" => $email,
            ];
            header("location: index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Đăng ký tài khoản mới</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/register.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<header>
			<div class="container">
			</div>
		</header>
		<main>
			<div class="container">
				<div class="register-form">
					<form action="" method="post">
						<h1>Đăng ký tài khoản mới</h1>
						<?= $canRegister === false
          ? "<p class='error main'>Đăng ký không thành công, vui lòng xem lại các thông tin đã nhập và thực hiện lại.</p>"
          : "" ?>
						<div class="input-box">
							<?= !empty($validateError["username"])
           ? "<p class='error'>" .
               implode("<br/>", $validateError["username"]) .
               "</p>"
           : "" ?>
							<input type="text" placeholder="Nhập username" name="username" value="<?= $username ?>">
						</div>
						<div class="input-box">
							<?= !empty($validateError["fullname"])
           ? "<p class='error'>" .
               implode("<br/>", $validateError["fullname"]) .
               "</p>"
           : "" ?>
							<input type="text" placeholder="Nhập tên thật" name="fullname" value="<?= $fullname ?>">
						</div>
						<div class="input-box">
							<?= !empty($validateError["password"])
           ? "<p class='error'>" .
               implode("<br/>", $validateError["password"]) .
               "</p>"
           : "" ?>
							<input type="password" placeholder="Nhập mật khẩu" name="password" value="<?= $password ?>">
						</div>

						<div class="input-box">
							<?= !empty($validateError["phone"])
           ? "<p class='error'>" .
               implode("<br/>", $validateError["phone"]) .
               "</p>"
           : "" ?>
							<input type="text" placeholder="Số điện thoại" name="phone" value="<?= $phone ?>">
						</div>
						<div class="input-box">
							<?= !empty($validateError["email"])
           ? "<p class='error'>" .
               implode("<br/>", $validateError["email"]) .
               "</p>"
           : "" ?>
							<input type="email" placeholder="Email" name="email" value="<?= $email ?>">
						</div>
						<div class="input-box">

							<input type="text" placeholder="Địa chỉ: Số nhà,xã/phường, quận/huyện, tỉnh/thành phố" name="address" value="<?= $address ?>">
						</div>
						<div class="btn-box">
							<button type="submit" name="submit" value="yes">
								Đăng ký
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