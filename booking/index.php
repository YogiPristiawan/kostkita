<?php
require_once('../connection.php');
require_once('../_functions.php');
$title = 'Daftar Booking';

$booking = query("SELECT * FROM booking INNER JOIN produk ON produk.produk_id = booking.produk_id");

?>

<?php require_once('../layouts/admin/header.php') ?>
<div class="mt-3 px-2 py-2 shadow container bg-white text-center">
	<h2 class="font-weight-normal">Daftar Booking</h2>
	<hr>
	<table class="table mt-2">
		<thead class="text-center thead-dark">
			<tr>
				<th>Tanggal</th>
				<th>Nama Produk</th>
				<th>Gambar</th>
				<th>Bukti Pembayaran</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($booking)) : ?>
				<?php foreach ($booking as $b) : ?>
					<tr>
						<td class="text-center"><?= $b['booking_at']; ?></td>
						<td><?= $b['nama_produk']; ?></td>
						<td>
							<img src="../asset/img/produk/<?= $b['gambar']; ?>" alt="" width="100px">
						</td>
						<td>
							<a href="../payments/detail.php?invoice=<?= $b['pay_invoice']; ?>" class="link"><?= $b['pay_invoice']; ?></a>
						</td>
						<td>
							<a href="delete.php?booking_id=<?= $b['booking_id']; ?>&produk_id=<?= $b['produk_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

</div>
<?php require_once('../layouts/admin/footer.php') ?>