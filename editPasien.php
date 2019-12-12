<?php
	include_once "koneksi.php";
	
	$id 	= $_POST['id'];
	
	class emp{}
	
	if (empty($id)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Error Mengambil Data"; 
		die(json_encode($response));
	} else {
		$query 	= mysqli_query($con, "SELECT * FROM tb_user WHERE user_id='".$id."'");
		$row 	= mysqli_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->success = 1;
			$response->user_id = $row["user_id"];
			$response->nama = $row["nama"];
            $response->tgl_lahir = $row["tgl_lahir"];
			$response->alamat = $row["alamat"];
			$response->email = $row["email"];
			$response->username = $row["username"];
            $response->password = $row["password"];
            $response->goldar = $row["goldar"];
            
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Mengambil Data";
			die(json_encode($response)); 
		}	
	}
	mysqli_close($con);
?>