<?php
require_once('../connection.php');
require_once('../_functions.php');

$payment = query("SELECT * FROM payment")
?>
<?php require_once('../layouts/admin/header.php') ?>
<div class="mt-3 px-2 py-2 shadow container bg-white text-center">
	<h2 class="font-weight-normal">Daftar Booking</h2>
	<hr>
	<table class="table mt-2">
		<thead class="text-center thead-dark">
			<tr>
				<th>Invoice</th>
				<th>Tanggal</th>
				<th>Nama Kamar</th>
				<th>Nama Pemesan</th>
				<th>Jumlah</th>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($payment)) : ?>
				<?php foreach ($payment as $p) : ?>
					<tr>
						<td class="text-center"><?= $p['invoice']; ?></td>
						<td><?= $p['tanggal']; ?></td>
						<td><?= $p['nama_produk']; ?></td>
						<td><?= $p['nama_pemesan']; ?></td>
						<td>Rp. <?= number_format($p['jumlah'], 0, ',', '.'); ?></td>
						<td>
							<a href="detail.php?invoice=<?= $p['invoice']; ?>" class="btn btn-sm btn-info">Detail</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php require_once('../layouts/admin/footer.php') ?>