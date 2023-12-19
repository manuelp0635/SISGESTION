<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$user1_id = $_POST['user1_id'];
		$user1_no = $_POST['user1_no'];
		$user1_firstname = $_POST['user1_firstname'];
		$user1_lastname = $_POST['user1_lastname'];
		$user1_password = md5($_POST['user1_password']);
		
		mysqli_query($conn, "UPDATE `user1` SET `user1_no` = '$user1_no', `user1_firstname` = '$user1_firstname', `user1_lastname` = '$user1_lastname', `user1_password` = '$user1_password' WHERE `usuario_id` = '$usuario_id'") or die(mysqli_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'usuario.php'</script>";
	}
?>