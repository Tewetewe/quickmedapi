<?php 
	include_once "koneksi.php";
	
	$query = mysqli_query($con,"SELECT * FROM tb_user WHERE role_id = 2 ORDER BY nama ASC");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>