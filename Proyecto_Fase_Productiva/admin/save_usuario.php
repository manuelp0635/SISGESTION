<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$user1_no = $_POST['user1_no'];
		$user1_firstname = $_POST['user1_firstname'];
		$user1_lastname = $_POST['user1_lastname'];
		$user1_password = md5($_POST['user1_password']);
		
		mysqli_query($conn, "INSERT INTO `user1` VALUES('', '$user1_no', '$user1_firstname', '$user1_lastname', '$user1_password')") or die(mysqli_error());
		
		header('location: user.php');
	}
?>