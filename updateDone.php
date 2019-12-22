<?php

include_once "koneksi.php";

class usr{}

    $user_id = $_GET['user_id'];

    if ((empty($user_id))){
        $response = new usr();
        $response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
    $query = mysqli_query($con, "UPDATE tb_pendaftaran SET tb_pendaftaran.status = 2 WHERE tb_pendaftaran.user_id = $user_id");
    if ($query) {
        $response = new usr();
        $response->success = 1;
        $response->message = "Data berhasil di update";
        die(json_encode($response));
    } else{ 
        $response = new usr();
        $response->success = 0;
        $response->message = "Error update Data";
        die(json_encode($response)); 
    }	
    mysqli_close($con);

    
?>