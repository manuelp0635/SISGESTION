<?php
	session_start();
	require 'admin/conn.php';
	
	if(ISSET($_POST['login'])){
		$user1_no = $_POST['user1_no'];
		$user1_password = md5($_POST['user1_password']);
		
		$query = mysqli_query($conn, "SELECT * FROM `user1` WHERE `user1_no` = '$user1_no' && `user1_password` = '$user1_password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		
		if($row > 0){
			$_SESSION['user1'] = $fetch['user1_id'];
			header("location:usuario_profile.php");
		}else{
			echo "<center><label class='text-danger'>Usuario o Contraseña Inconrecta</label></center>";
		}
	}
?>