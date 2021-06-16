<?php
require_once('../connection.php');
$produk_id = $_GET['produk_id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '$produk_id'");
$product = mysqli_fetch_assoc($query);
?>
<?php require_once('../layouts/admin/header.php') ?>
<div class="container-70 px-2 py-2 mt-3 bg-white text-center shadow mb-4">
	<img src="../asset/img/produk/<?= $product['gambar']; ?>" class="mw-100">
	<hr class="mt-3">

	<table class="table table-no-bg mb-2">
		<tr>
			<th class="text-left" width="3rem">Nama Produk</th>
			<td width="2rem">:</td>
			<td><?= $product['nama_produk']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Harga</th>
			<td>:</td>
			<td>Rp. <?= number_format($product['harga'], 0, ',', '.'); ?></td>
		</tr>
		<tr>
			<th class="text-left">Deskripsi</th>
			<td>:</td>
			<td><?= $product['deskripsi']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Status</th>
			<td>:</td>
			<td>
				<?php if ($product['status'] == '1') : ?>
					<h6 class="text-danger">DIPESAN</h6>
				<?php else : ?>
					<h6 class="text-success">KOSONG</h6>
				<?php endif; ?>
			</td>
		</tr>
	</table>
</div>
<?php require_once('../layouts/admin/footer.php') ?>