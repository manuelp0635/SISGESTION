<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['user1_id'])){
		$user1_id = $_POST['user1_id'];
		$query = mysqli_query($conn, "SELECT * FROM `user1` WHERE `user1_id` = '$user1_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$user1_id = $fetch['user1_id'];
		
		if(file_exists("../files/".$user1_no)){
			removeDir("../files/".$user1_no);
			mysqli_query($conn, "DELETE FROM `user1` WHERE `user1_id` = '$user1_id'") or die(mysqli_error());
		}
	}
	
	function removeDir($dir) {
		$items = scandir($dir);
		foreach ($items as $item) {
			if ($item === '.' || $item === '..') {
				continue;
			}
			$path = $dir.'/'.$item;
			if (is_dir($path)) {
				xrmdir($path);
			} else {
				unlink($path);
			}
		}
		rmdir($dir);
	}
?>