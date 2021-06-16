<?php
require_once('../connection.php');
$title = 'Tambah Produk';

if (isset($_POST['submit'])) {
	$target_dir = '../asset/img/produk/';
	$target_file = $target_dir . $_FILES['gambar']['name'];
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["gambar"]["tmp_name"]);
	if ($check !== false) {
		if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg" || $fileType == "gif") {
			if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {

				$nama_produk = $_POST['nama_produk'];
				$harga = $_POST['harga'];
				$deskripsi = $_POST['deskripsi'];
				$status = '0';
				$gambar = $_FILES['gambar']['name'];

				mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, deskripsi, gambar, status) VALUES ('$nama_produk', '$harga', '$deskripsi', '$gambar', '$status')");

				if (mysqli_affected_rows($conn) > 0) {
					return header('Location: index.php');
				}
			}
		}
	}
}
?>

<?php require_once('../layouts/admin/header.php') ?>
<div class="container-70 px-2 py-2 mt-3 bg-white text-center shadow">
	<h2 class="font-weight-normal">Tambah Produk</h2>
	<hr>
	<div class="text-left mt-2">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama_produk">Nama Produk</label>
				<input type="text" class="form-control" name="nama_produk" required>
			</div>

			<div class="form-group">
				<label for="harga">Harga</label>
				<input type="number" class="form-control" name="harga" required>
			</div>
			<div class="form-group">
				<label for="deskripsi">Deskripsi</label>
				<textarea name="deskripsi" id="deskripsi" cols="30" rows="6" class="form-control" required></textarea>
			</div>
			<div class="form-group mt-1">
				<label for="gambar">Gambar</label>
				<input type="file" class="form-control-file" name="gambar">
			</div>
			<hr>
			<div class="d-flex justify-content-end">
				<button class="btn btn-primary" type="submit" name="submit">Simpan</button>
			</div>
		</form>
	</div>
</div>
<?php require_once('../layouts/admin/footer.php') ?>