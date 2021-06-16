<?php
require_once('connection.php');


function query($sql)
{
	global $conn;

	$query = mysqli_query($conn, $sql);
	if ($query->num_rows) {
		while ($row = mysqli_fetch_assoc($query)) {
			$results[] = $row;
		}

		return $results;
	}

	return [];
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
