<?php
include_once "koneksi.php";

class usr{}

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ((empty($username))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Kolom username tidak boleh kosong";
	die(json_encode($response));

} else if ((empty($email))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Kolom email tidak boleh kosong";
	die(json_encode($response));
}
else if ((empty($password))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Kolom password tidak boleh kosong";
	die(json_encode($response));
} else if ((empty($confirm_password)) || $password != $confirm_password) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Konfirmasi password tidak sama";
    die(json_encode($response));
    
}  else if ((empty($username)) || $password != $confirm_password) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Kolom fullname tidak boleh kosong";
	die(json_encode($response)); 
} else {
    if (!empty($username) && $password == $confirm_password){
    	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_user WHERE username='".$username."'"));

    	if ($num_rows == 0){
    		$query = mysqli_query($con, "INSERT INTO tb_user (username, email, password, role_id) VALUES('".$username."','".$email."','".$password."',1)");

    		if ($query){
    			$response = new usr();
    			$response->success = 1;
    			$response->message = "Register berhasil, silahkan login.";
    			die(json_encode($response));

    		} else {
    			$response = new usr();
    			$response->success = 0;
    			$response->message = "username sudah ada";
    			die(json_encode($response));
    		}
    	} else {
    		$response = new usr();
    		$response->success = 0;
    		$response->message = "username sudah ada";
    		die(json_encode($response));
    	}
    }
}

mysqli_close($con);
?>