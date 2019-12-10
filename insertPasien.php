<?php
	include_once "koneksi.php";
	
	$nama 	= $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $goldar = $_POST['goldar'];


	
	class emp{}
	
	if (empty($nama) || empty($tgl_lahir) || empty($alamat) || empty($email) || empty($username) || empty($password) || empty($goldar) ) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "INSERT INTO tb_user (user_id,nama,tgl_lahir,alamat,email,username,password,goldar,role_id) VALUES(0,'".$nama."','".$tgl_lahir."','".$alamat."','".$email."','".$username."', '".$password."', '".$goldar."', 2)");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di simpan";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}
	mysqli_close($con);
?>