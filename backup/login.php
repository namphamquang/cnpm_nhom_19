<?php
session_start();
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/Db.php";

$db = new Db();
$db->table("users");

$submit = isset($_POST["submit"]) ? $_POST["submit"] : null;
$username = isset($_POST["username"]) ? $_POST["username"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;

$loggedStatus = null;
if ($submit === "yes") {
    $existedUser = $db
        ->where([
            "username" => $username,
            "password" => md5($password),
        ])
        ->get()
        ->result();
    if ($existedUser !== false) {
        $existedUser = $existedUser[0];
        $loggedStatus = true;
        $_SESSION["userInfo"] = [
            "username" => $existedUser["username"],
            "phone" => $existedUser["phone"],
            "email" => $existedUser["email"],
        ];
        header("location: index.php");
    } else {
        $loggedStatus = false;
    }
}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Đăng nhập vào website</title>
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
						<h1>Đăng nhập vào website</h1>
						<?= $loggedStatus === false
          ? "<p class='error main'>Tên hoặc mật khẩu không đúng, vui lòng thực hiện lại.</p>"
          : "" ?>

						<div class="input-box">
							<input type="text" placeholder="Nhập username" name="username" value="<?= $username ?>">
						</div>
						<div class="input-box">
							<input type="password" placeholder="Nhập mật khẩu" name="password">
						</div>
						<div class="btn-box">

							<button type="submit" name="submit" value="yes">
								Đăng nhập
							</button>
						</div>
						<div class="signup">
							<p>Chưa có tài khoản?</p>
							<button class="add-to-cart btn btn-default" onclick=" window.open('register.php','_blank')"> Đăng ký</button>
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