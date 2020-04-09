<?php

	require '../../config/general_config.php';
	$gn_db = getDB();

	if (isset( $_POST['txtuemail'] ) && !empty($_POST['txtuemail'])) {
		$email = $_POST['txtuemail'];
		$query = " SELECT email FROM users where email = :email ";
		$stmt = $gn_db->prepare($query);
		$stmt->execute(array(':email'=>$email));
		
		if ($stmt->rowCount() == 1) {
			echo 'false'; // email already taken
		} else {
			echo 'true'; 
		}
	}