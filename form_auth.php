<?php

session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

include 'dbconnect.php';

$test = $pdo->query("SELECT * FROM users WHERE login = '$login'")->fetch(PDO::FETCH_ASSOC);

include 'head.php';

if(!is_array($test)){ ?>
	<div class="container-fluid">
		<p class="fs-1 fw-bold" style="color: white" align="center">Логин введен неверно</p>
	</div>

	<?php } else {
		if (password_verify($password, $test['password'])) { ?>

		<div class="container-fluid">
			<p class="fs-1 fw-bold" style="color: white" align="center">Авторизация прошла успешно</p>
		</div>

		<?php 
		$_SESSION['logged_user'] = $login;
		header("Location: index.php");
		} else { ?>

		<div class="container-fluid">
			<p class="fs-1 fw-bold" style="color: white" align="center">Пароль введен неверно</p>
		</div>
	<?php }
	} ?>