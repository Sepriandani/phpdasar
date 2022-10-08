<?php 
	//koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	function query ($query) {
		global $conn;
		$rows = [];
		$result = mysqli_query($conn, $query );
		while ($row = mysqli_fetch_assoc($result)) {
			$rows [] = $row;
		}
		return $rows;
	}
	

?>