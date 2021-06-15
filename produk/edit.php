<?php require_once('../layouts/admin/header.php') ?>
<div class="container-70 px-2 py-2 mt-3 bg-white text-center shadow">
	<h2 class="font-weight-normal">Edit Produk</h2>
	<hr>
	<div class="text-left mt-2">
		<form action="" method="POST">
			<div class="d-flex">
				<div class="form-group row mr-2">
					<label for="nama_produk">Nama Produk</label>
					<input type="text" class="form-control" name="nama_produk" required>
				</div>
				<div class="form-group row">
					<label for="tipe">Email</label>
					<select name="tipe" id="tipe" class="form-control" required>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
				</div>
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
				<img src=".../../../asset/img/Cabinsoft.jpg" alt="" class="d-block mt-1" width="150px">
				<input type="file" class="form-control-file" name="gambar">
			</div>
			<hr>
			<div class="d-flex justify-content-end">
				<button class="btn btn-primary" type="submit">Simpan</button>
			</div>
		</form>
	</div>
</div>
<?php require_once('../layouts/admin/footer.php') ?>