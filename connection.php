<?php
date_default_timezone_set('Asia/Jakarta');

$conn = mysqli_connect('localhost', 'root', '', 'kostkita');

if (mysqli_connect_errno()) {
	printf('Koneksi ke database gagal. : ' . mysqli_connect_error());
}
