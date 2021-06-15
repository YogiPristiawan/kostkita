<?php require_once('layouts/header.php') ?>

<div class="container-70 px-2 py-2 mt-3 bg-white text-center shadow">
	<h2 class="font-weight-normal">Booking Produk</h2>
	<hr>
	<div class="text-left mt-2">
		<form action="" method="POST">
			<input type="hidden" name="produk_id" value="<?= $_GET['produk_id']; ?>">
			<div class="form-group">
				<label for="order_id">Order ID</label>
				<input type="text" class="form-control readonly" value="1234" name="order_id" readonly>
			</div>

			<div class="form-group">
				<label for="name">Nama Pemesan</label>
				<input type="text" class="form-control" name="name">
			</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" class="form-control" name="alamat">
			</div>

			<div class="form-group">
				<label for="no_telp">No Telp.</label>
				<input type="number" class="form-control" name="no_telp">
			</div>
			<hr class="mt-3">
			<div class="d-flex justify-content-end">
				<button class="btn btn-primary" type="submit">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php require_once('layouts/footer.php') ?>