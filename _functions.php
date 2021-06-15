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
