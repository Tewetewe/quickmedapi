<?php
	include "koneksi.php";
	
	$id 	= $_POST['id'];
	
	class emp{}
	
	if (empty($id)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Error Mengambil Data"; 
		die(json_encode($response));
	} else {
		$query 	= mysql_query("SELECT * FROM biodata WHERE user_id='".$id."'");
		$row 	= mysql_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->success = 1;
			$response->id = $row["user_id"];
			$response->nama = $row["nama"];
            $response->tgl_lahir = $row["tgl_lahir"];
            $response->alamat = $row["alamat"];
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
?>