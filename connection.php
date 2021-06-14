<?php
$conn = mysqli_connect('localhost', 'root', '', 'mykost');

if (mysqli_connect_errno()) {
	printf('Koneksi ke database gagal. : ' . mysqli_connect_error());
}
