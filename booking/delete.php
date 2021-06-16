<?php
require_once('../connection.php');
session_start();
if (!isset($_SESSION['user'])) {
	return header('Location: ../login.php');
}

$booking_id = $_GET['booking_id'];
$produk_id = $_GET['produk_id'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_begin_transaction($conn);
try {
	mysqli_query($conn, "DELETE FROM booking WHERE booking_id = '$booking_id'");
	mysqli_query($conn, "UPDATE produk SET status = '0' WHERE produk_id = '$produk_id'");

	mysqli_commit($conn);

	return header('Location: index.php');
} catch (mysqli_sql_exception $error) {
	mysqli_rollback($conn);
	throw $error;
}
