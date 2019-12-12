<?php
	include_once "koneksi.php";
	
	$pendaftaran_id = $_POST['pendaftaran_id'];
	$status 	= $_POST['status'];
	class emp{}
	
	if  (empty($status) ) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Set terlebih dahulu status"; 
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "UPDATE tb_pendaftaran SET status='".$status."' WHERE pendaftaran_id='".$pendaftaran_id."'");
		
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