<?php
require_once('connection.php');


function query($sql)
{
	global $conn;

	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($query)) {
		$results[] = $row;
	}

	return $results;
}

function cek_booking($produk_id)
{
	global $conn;

	$query = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '$produk_id'");
	$result = mysqli_fetch_assoc($query);

	if ($result['status'] == '1') {
		return true;
	} else {
		return false;
	}
}

function upload_bukti_transfer()
{
	$target_dir = 'http://localhost/kostkita/asset/img/payments/';
	$target_file = $target_dir . $_FILES['bukti_tf']['name'];
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["bukti_tf"]["tmp_name"]);
	if ($check !== false) {
		if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg" || $fileType == "gif") {
			if (move_uploaded_file($_FILES["bukti_tf"]["tmp_name"], $target_file)) {
				return true;
			}

			return false;
		}

		return false;
	}

	return false;
}

function upload_produk()
{
	$target_dir = 'http://localhost/kostkita/asset/img/produk/';
	$target_file = $target_dir . $_FILES['gambar']['name'];
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["gambar"]["tmp_name"]);
	if ($check !== false) {
		if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg" || $fileType == "gif") {
			if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
				return true;
			}

			return false;
		}

		return false;
	}

	return false;
}
