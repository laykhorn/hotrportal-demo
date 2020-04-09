<?php

	require '../../config/general_config.php';
	$gn_db = getDB();

	if (isset( $_POST['txtuname'] ) && !empty($_POST['txtuname'])) {
		$username = $_POST['txtuname'];
		$query = " SELECT uname FROM users where uname = :uname ";
		$stmt = $gn_db->prepare($query);
		$stmt->execute(array(':uname'=>$username));
		
		if ($stmt->rowCount() == 1) {
			echo 'false'; // email already taken
		} else {
			echo 'true'; 
		}
	}