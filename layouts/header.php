<?php
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/kostkita/asset/css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
	<title><?= $title; ?></title>
</head>

<body>
	<div class="header">
		<div class="jumbotron-bg"></div>
		<div class="jumbotron">
			<div class="container">
				<div class="d-flex justify-content-between">
					<img class="logo" src="./asset/img/KostKita.png" alt="" width="100px">
					<div style="line-height: 80px">
						<a href="login.php" class="text-white">Login</a>
					</div>
				</div>
				<div class="container text-center">
					<h1 class="text-white">welcome!</h1>
					<p class="text-white">Kini pesan kost jadi lebih mudah...</p>
				</div>
			</div>
		</div>
	</div>