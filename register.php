<?php

session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password = password_hash($password, PASSWORD_DEFAULT);

include 'dbconnect.php';

$test1 = $pdo->query("SELECT * FROM users WHERE login = '$login'");
$user1 = $test1->fetch(PDO::FETCH_ASSOC);
var_dump($user1);

include 'head.php';

if (!empty($user1)){ ?>
	<div class="container-fluid">
		<p class="fs-1 fw-bold" style="color: white" align="center">Данный логин уже используется!</p>
	</div>
<?php exit();
}

$pdo->query("INSERT INTO `users` (`login`, `password`) VALUES('$login', '$password')");
?>
<div class="container-fluid">
		<p class="fs-1 fw-bold" style="color: white" align="center">Вы успешно зарегистрировались</p>
	</div>
</body>
</html>