<?php
require_once('connection.php');
$title = 'Login';
if (isset($_POST['submit'])) {
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
	$user = mysqli_fetch_assoc($query);

	if ($user) {
		if (password_verify($password, $user['password'])) {
			$_SESSION['user'] = $user;
			return header('Location: admin_index.php');
		}
	}
}
?>

<?php require_once('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./asset/css/style.css">

	<title>Login</title>
</head>

<body style="background-color: rgb(238, 238, 238);">
	<div class="navbar">
		<div class="container">
			<a href="index.php">HOME</a>
		</div>
	</div>
	<div class="mt-3 bg-white login-form">
		<form action="" method="POST">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary">Login</button>
			</div>
		</form>
	</div>
</body>

</html>