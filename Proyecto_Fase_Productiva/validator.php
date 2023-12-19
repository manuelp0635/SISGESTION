<?php
	session_start();
	
	if(!ISSET($_SESSION['user1'])){
		header('location:index.php');
	}
?>