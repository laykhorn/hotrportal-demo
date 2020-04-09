<?php

	require '../../config/general_config.php';
	$gn_db = getDB();

	if (isset( $_POST['txtuphone'] ) && !empty($_POST['txtuphone'])) {
		$uphone = $_POST['txtuphone'];
		$query = " SELECT phone FROM users where phone = :phone ";
		$stmt = $gn_db->prepare($query);
		$stmt->execute(array(':phone'=>$uphone));
		
		if ($stmt->rowCount() == 1) {
			echo 'false'; // email already taken
		} else {
			echo 'true'; 
		}
	}