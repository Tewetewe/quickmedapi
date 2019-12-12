<?php
	include_once "koneksi.php";
	
	$id 	= $_POST['id'];
	$nama 	= $_POST['nama'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$email = $_POST['email'];
	$alamat 	= $_POST['alamat'];
	$username 	= $_POST['username'];
	$password = $_POST['password'];
	$goldar = $_POST['goldar'];
	
	class emp{}
	
	if  (empty($nama) || empty($tgl_lahir) || empty($alamat) || empty($email) || empty($username) || empty($password) || empty($goldar) ) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "UPDATE tb_user SET nama='".$nama."', tgl_lahir='".$tgl_lahir."',  email='".$email."', alamat='".$alamat."', username='".$nama."', password='".$password."',goldar ='".$goldar."' WHERE user_id='".$id."'");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di update";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error update Data";
			die(json_encode($response)); 
		}	
	}
	mysqli_close($con);
?>