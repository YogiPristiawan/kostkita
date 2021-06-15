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
				<th>NO.</th>
				<th>Nama</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<tr class="align-middle">
				<td class="text-center">1</td>
				<td>Yogi Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore voluptates et quae voluptatem earum excepturi fuga illo, illum facere dolorem, architecto officiis, atque aspernatur. Assumenda earum minus magnam itaque sunt.</td>
				<td class="d-flex">
					<a href="" class="btn btn-sm mr-05 btn-primary">test</a>
					<a href="" class="btn btn-sm mr-05 btn-primary">test</a>
					<a href="" class="btn btn-sm mr-05 btn-primary">test</a>
				</td>
			</tr>
			<tr>
				<td class="text-center">1</td>
				<td>Yogi</td>
				<td>Jogja</td>
			</tr>
			<tr>
				<td class="text-center">1</td>
				<td>Yogi</td>
				<td>Jogja</td>
			</tr>
		</tbody>
	</table>

</div>
<?php require_once('./../layouts/admin/footer.php') ?>