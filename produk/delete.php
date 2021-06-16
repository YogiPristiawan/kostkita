<?php
require_once('../connection.php');
$produk_id = $_GET['produk_id'];

$query = mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '$produk_id'");

header('Location: index.php');
