<?php
require_once('_functions.php');

$product = query("SELECT * FROM produk");

?>
<?php require_once('./layouts/header.php') ?>
<div class="container mt-2 mb-4">
	<div class="d-flex flex-wrap">
		<?php if (!empty($product)) : ?>
			<?php foreach ($product as $p) :  ?>
				<div class="card shadow ml-3 mt-2">
					<img src="./asset/img/produk/<?= $p['gambar']; ?>" alt="">
					<div class="card-body">
						<h2 class="text-success"><?= $p['nama_produk']; ?></h2>
						<h2 class="mt-1 font-weight-normal">Rp. <?= number_format($p['harga'], 0, ',', '.') ?></h2>
						<hr>
						<p>keterangan:</p>
						<p><?= $p['deskripsi']; ?></p>
						<hr>
						<div class="text-center">
							<?php if ($p['status'] == '1') : ?>
								<a href="booking.php?produk_id=<?= $p['produk_id']; ?>&nama_produk=<?= $p['nama_produk']; ?>" class="btn btn-success disabled">Dipesan</a>
							<?php else : ?>
								<a href="booking.php?produk_id=<?= $p['produk_id']; ?>&nama_produk=<?= $p['nama_produk']; ?>" class="btn btn-primary">Booking</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<?php require_once('layouts/footer.php') ?>