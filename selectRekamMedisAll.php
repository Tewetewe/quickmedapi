<?php

include_once "koneksi.php";


	$query = mysqli_query($con, "SELECT tb_user.nama, tb_pendaftaran.keluhan, tb_faskes.nama_faskes,
	tb_pendaftaran.created_at, tb_rekam_medis.diagnosa, tb_rekam_medis.anjuran, tb_rekam_medis.photo 
	FROM tb_pendaftaran JOIN tb_user ON  tb_user.user_id = tb_pendaftaran.user_id 
	JOIN tb_faskes ON tb_pendaftaran.faskes_id = tb_faskes.faskes_id
	JOIN tb_rekam_medis ON tb_pendaftaran.pendaftaran_id = tb_rekam_medis.pendaftaran_id
	GROUP BY tb_pendaftaran.user_id");

		
$json = array();
	
while($row = mysqli_fetch_assoc($query)){
	$json[] = $row;
}

echo json_encode($json);

mysqli_close($con);

    
?>