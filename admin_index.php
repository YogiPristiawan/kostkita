<?php
require_once('connection.php');
session_start();

if (!isset($_SESSION['user'])) {
	return header('Location: index.php');
}
?>

<?php require_once('layouts/admin/header.php') ?>
<div class="mt-3 bg-white admin-index text-center">
	<h1 class="font-weight-normal">Halaman Admin</h1>
	<hr>
	<div class="d-flex justify-content-between">
		<a href="produk/index.php" class="ml-2 mr-2 admin-index-button btn btn-primary">Produk</a>
		<a href="" class="ml-2 mr-2 admin-index-button btn btn-primary">Booking</a>
		<a href="" class="ml-2 mr-2 admin-index-button btn btn-primary">Payment</a>
	</div>
</div>
<?php require_once('layouts/admin/footer.php') ?>