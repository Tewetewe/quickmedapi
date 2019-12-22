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
	
    $query1 = mysqli_query($con, "UPDATE tb_pendaftaran SET tb_pendaftaran.status = 1 WHERE tb_pendaftaran.user_id = $user_id && Date(tb_pendaftaran.created_at)=CURDATE()");
    $query = mysqli_query($con,"UPDATE tb_pendaftaran AS p JOIN (SELECT p1.pendaftaran_id, COUNT(*) AS cnt FROM tb_pendaftaran AS p1 JOIN tb_pendaftaran AS p2 ON p2.`pendaftaran_id` = p1.`pendaftaran_id`  WHERE  DATE(p1.created_at)=CURDATE() AND (p1.status= 1 OR p1.`status` = 2) ORDER BY p1.`pendaftaran_id`) AS g ON g.pendaftaran_id = p.`pendaftaran_id` SET p.`temp_antrian` = g.cnt WHERE p.`user_id`=$user_id AND DATE(p.created_at)=CURDATE()AND p.`status` = 1");
    if ($query1 && $query) {
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