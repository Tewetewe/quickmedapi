<?php 
	include "koneksi.php";
	
	$query = mysql_query("SELECT * FROM tb_user WHERE role_id = 2 ORDER BY nama ASC");
	
	$json = array();
	
	while($row = mysql_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysql_close($connect);
	
?>