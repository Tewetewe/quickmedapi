<?php 
	include_once "koneksi.php";
	
	$query = mysqli_query($con,"SELECT tb_pendaftaran.pendaftaran_id, tb_pendaftaran.user_id, tb_faskes.nama_faskes, tb_user.nama, tb_user.keluhan, tb_pendaftaran.created_at, tb_user.photo 
    FROM tb_pendaftaran JOIN tb_faskes ON  tb_pendaftaran.`faskes_id` = tb_faskes.`faskes_id` JOIN tb_user ON tb_pendaftaran.`user_id` = tb_user.`user_id`
    ORDER BY tb_pendaftaran.created_at ASC");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>