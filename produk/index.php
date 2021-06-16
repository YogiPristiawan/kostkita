<?php
require_once('../_functions.php');
session_start();

if (!isset($_SESSION['user'])) {
	return header('Location: index.php');
}
$product = query("SELECT * FROM produk");

?>

<?php require_once('./../layouts/admin/header.php') ?>
<div class="mt-3 px-2 py-2 shadow container bg-white text-center">
	<h2 class="font-weight-normal">Daftar Produk</h2>
	<hr>
	<div class="text-left mt-2">
		<a href="tambah.php" class="btn btn-primary">+ Tambah data produk</a>
	</div>

	<table class="table mt-2">
		<thead class="text-center thead-dark">
			<tr>
				<th>Nama Kamar</th>
				<th>Harga</th>
				<th>Deskripsi</th>
				<th>Gambar</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($product as $p) : ?>
				<tr>
					<td><?= $p['nama_produk']; ?></td>
					<td>Rp. <?= number_format($p['harga'], 0, ',', '.'); ?></td>
					<td><?= $p['deskripsi']; ?></td>
					<td>
						<img src="../asset/img/produk/<?= $p['gambar']; ?>" alt="" width="100px">
					</td>
					<td>
						<?php if ($p['status'] == '1') : ?>
							<h6 class="text-danger">Dipesan</h6>
						<?php else : ?>
							<h6 class="text-success">Kosong</h6>
						<?php endif; ?>
					</td>
					<td class="d-flex flex-between">
						<a href="edit.php" class="btn btn-sm btn-warning mr-1">Edit</a>
						<a href="edit.php" class="btn btn-sm btn-info mr-1">Detail</a>
						<a href="edit.php" class="btn btn-sm btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>
<?php require_once('./../layouts/admin/footer.php') ?>