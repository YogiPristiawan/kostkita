<?php
require_once('../connection.php');
session_start();
if (!isset($_SESSION['user'])) {
	return header('Location: ../login.php');
}

$produk_id = $_GET['produk_id'];

$query = mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '$produk_id'");

header('Location: index.php');
