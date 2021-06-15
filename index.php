<?php
require_once('_functions.php');

$product = query("SELECT * FROM produk");

?>
<?php require_once('./layouts/header.php') ?>
<div class="container mt-2 mb-4">
	<div class="d-flex flex-wrap">
		<?php foreach ($product as $p) :  ?>
			<div class="card shadow ml-3 mt-2">
				<img src="./asset/img/<?= $p['gambar']; ?>" alt="">
				<div class="card-body">
					<h2 class="text-success"><?= $p['nama_produk']; ?></h2>
					<h2 class="mt-1 font-weight-normal">Rp. <?= number_format($p['harga'], 0, ',', '.') ?></h2>
					<hr>
					<p>keterangan:</p>
					<p><?= $p['deskripsi']; ?></p>
					<hr>
					<div class="text-center">
						<a href="booking.php?produk_id=<?= $p['produk_id']; ?>" class="btn btn-primary">Booking</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php require_once('layouts/footer.php') ?>