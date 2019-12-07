<?php
	
	$server		= "us-cdbr-gcp-east-01.cleardb.net"; // sesuaikan alamat server anda
	$user		= "be5ad156b61c2d"; // sesuaikan user web server anda
	$password	= "4ffc18f6"; // sesuaikan password web server anda
	$database	= "gcp_1d7e212728b4ea4bc104"; // sesuaikan database web server anda
	
	$con = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	}
?>