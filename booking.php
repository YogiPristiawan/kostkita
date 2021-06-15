<?php
require_once('connection.php');
if (isset($_POST['submit'])) {
	$target_dir = 'asset/img/payments/';
	$target_file = $target_dir . $_FILES['bukti_tf']['name'];
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["bukti_tf"]["tmp_name"]);
	if ($check !== false) {
		if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg" || $fileType == "gif") {
			if (move_uploaded_file($_FILES["bukti_tf"]["tmp_name"], $target_file)) {

				$tanggal = date('Y-m-d', mktime());
				$produk_id = $_POST['produk_id'];
				$invoice = $_POST['invoice'];
				$nama_produk = $_POST['nama_produk'];
				$nama_pemesan = $_POST['nama_pemesan'];
				$alamat = $_POST['alamat'];
				$no_telp = $_POST['no_telp'];
				$jumlah = $_POST['jumlah'];
				$bukti_tf = $_FILES['bukti_tf']['name'];

				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				mysqli_begin_transaction($conn);
				try {

					//insert data booking ke table booking
					mysqli_query($conn, "INSERT INTO booking (booking_at, produk_id, pay_invoice) VALUES ('$tanggal', '$produk_id', '$invoice')");

					//insert data pemesan ke table payment
					mysqli_query(
						$conn,
						"INSERT INTO payment (invoice, tanggal, nama_produk, nama_pemesan, alamat, no_telp, jumlah, bukti_tf) VALUES ('$invoice', '$tanggal', '$nama_produk', '$nama_pemesan', '$alamat', '$no_telp', '$jumlah', '$bukti_tf')"
					);

					//update tabel produk ubah status jadi booked
					mysqli_query($conn, "UPDATE produk SET status = '1' WHERE produk_id = '$produk_id'");

					mysqli_commit($conn);
				} catch (mysqli_sql_exception $error) {
					mysqli_rollback($conn);
				}
			}
		}
	}
}
?>

<?php require_once('layouts/header.php') ?>

<div class="container-70 px-2 py-2 mt-3 bg-white text-center shadow">
	<h2 class="font-weight-normal">Booking Produk</h2>
	<hr>
	<h2 class="text-success"><?= $_GET['nama_produk']; ?></h2>
	<div class="text-left mt-2">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="produk_id" value="<?= $_GET['produk_id']; ?>" required>
			<input type="hidden" name="nama_produk" value="<?= $_GET['nama_produk']; ?>" required>
			<div class="form-group">
				<label for="invoice">Invoice</label>
				<input type="text" class="form-control readonly" value="<?= md5(mktime() . $_GET['produk_id']); ?>" name="invoice" readonly>
			</div>

			<div class="form-group">
				<label for="nama_pemesan">Nama Pemesan</label>
				<input type="text" class="form-control" name="nama_pemesan" required>
			</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" class="form-control" name="alamat" required>
			</div>

			<div class="form-group">
				<label for="no_telp">No Telp.</label>
				<input type="number" class="form-control" name="no_telp" required>
			</div>

			<div class="form-group">
				<label for="jumlah">Jumlah Pembayaran</label>
				<input type="number" class="form-control" name="jumlah" required>
			</div>

			<div class="form-group">
				<label for="bukti_tf">Upload bukti transfer</label>
				<input type="file" class="form-control" name="bukti_tf" required>
			</div>
			<hr class="mt-3">
			<div class="d-flex justify-content-end">
				<button class="btn btn-primary" type="submit" name="submit">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php require_once('layouts/footer.php') ?>