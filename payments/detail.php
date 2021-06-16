<?php
require_once('../connection.php');
$title = 'Detail Payment';

$invoice = $_GET['invoice'];
$query = mysqli_query($conn, "SELECT * FROM payment WHERE invoice = '$invoice'");
$payment = mysqli_fetch_assoc($query);
?>

<?php require_once('../layouts/admin/header.php') ?>
<div class="container-70 px-2 py-2 mt-3 bg-white text-center shadow mb-4">
	<img src="../asset/img/payments/<?= $payment['bukti_tf']; ?>" class="img">
	<hr class="mt-3">
	<table class="table table-no-bg mb-2">
		<tr>
			<th class="text-left" width="150px">Invoice</th>
			<td width="2rem">:</td>
			<td><?= $payment['invoice']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Tanggal</th>
			<td>:</td>
			<td><?= $payment['tanggal']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Nama Kamar</th>
			<td>:</td>
			<td><?= $payment['nama_produk']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Nama Pemesan</th>
			<td>:</td>
			<td><?= $payment['nama_pemesan']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Alamat</th>
			<td>:</td>
			<td><?= $payment['alamat']; ?></td>
		</tr>
		<tr>
			<th class="text-left">No. Telp.</th>
			<td>:</td>
			<td><?= $payment['no_telp']; ?></td>
		</tr>
		<tr>
			<th class="text-left">Jumlah</th>
			<td>:</td>
			<td>Rp. <?= number_format($payment['jumlah'], 0, ',', '.'); ?></td>
		</tr>
	</table>
</div>
<?php require_once('../layouts/admin/footer.php') ?>