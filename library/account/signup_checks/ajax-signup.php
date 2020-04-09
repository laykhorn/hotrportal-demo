<?php

	header('Content-type: application/json');

	require '../../config/general_config.php';
	//$gn_db = getDB();
	
	$response = array();

	
		$user_name = validate_user_input_lowercase($_POST['txtuname']);
		$first_name = validate_user_input_lowercase($_POST['txtfname']);
		$last_name = validate_user_input_lowercase($_POST['txtlname']);
		$user_email = validate_user_input_lowercase($_POST['txtuemail']);
		//$user_country = validate_user_input($_POST['txtcountry']);
		$user_country = "Nigeria";
		$user_phone = validate_user_input($_POST['txtuphone']);
		$user_gender = validate_user_input($_POST['txtgender']);
		$user_pass = validate_user_password($_POST['password']);
		$user_cpass = validate_user_password($_POST['cpassword']);
		
		// md5 password hashing
		$password = md5($user_cpass);
		
		
		date_default_timezone_set("Africa/Lagos");
		$joining_date = validate_user_input(date("d M Y"));
		$joining_time = validate_user_input(date("h:i A"));
		
		$utoken = validate_user_input(rand(100000000, 99999999999).rand(1000000, 10000000000).rand(1008760, 9999999999));
	
	if (isset($_POST['create_account'])) {
		
		if($utoken && $joining_date && $joining_time && $user_name && $first_name && $last_name && $user_email && $user_country && $user_phone && $user_gender && $user_pass && $user_cpass) {
		
			if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $user_email)) {
		
				if (strlen($user_pass) > 3) {
		
					if($user_pass == $user_cpass) {
						
						$check_username = $gn_db->prepare("SELECT uname FROM users WHERE uname=:username");
						$check_username->bindParam(":username", $user_name);
						$check_username->execute();
						
						$check_email = $gn_db->prepare("SELECT email FROM users WHERE email=:useremail");
						$check_email->bindParam(":useremail", $user_email);
						$check_email->execute();
						
						$check_phone = $gn_db->prepare("SELECT phone FROM users WHERE phone =:userphone");
						$check_phone->bindParam(":userphone", $user_phone);
						$check_phone->execute();
							
							if($check_username->rowCount() == 1) {
								
								$response['status'] = 'error'; //
								$response['message'] = 'The username is already registered...';
								//echo "T"; // Username taken
								
							} else {
								//echo "true"; // Available
								
								if ($check_email->rowCount() == 1) {
									
									$response['status'] = 'error'; //
									$response['message'] = 'This email is already registered! Please type another email...';
									
								} else {
									//echo "Available";
										
										if ($check_phone->rowCount() == 1) {
											
											$response['status'] = 'error'; //
											$response['message'] = 'This Phone Number is already registered! Please type another Phone Number...';
											
										} else {
												//echo "true"; // Available
												$stmt = $gn_db->prepare('INSERT INTO users(uname,fname,lname,email,country,phone,gender,password,unique_id,joining_date,joining_time) VALUES(:uname, :fname, :lname, :email, :country, :phone, :gender, :pass, :unique_id, :jdate, :jtime)');
												$stmt->bindParam(':uname', $user_name);
												$stmt->bindParam(':fname', $first_name);
												$stmt->bindParam(':lname', $last_name);
												$stmt->bindParam(':email', $user_email);
												$stmt->bindParam(':country', $user_country);
												$stmt->bindParam(':phone', $user_phone);
												$stmt->bindParam(':gender', $user_gender);
												$stmt->bindParam(':pass', $password);
												$stmt->bindParam(':unique_id', $utoken);
												$stmt->bindParam(':jdate', $joining_date);
												$stmt->bindParam(':jtime', $joining_time);
													
												$stmt->execute();
											
											// check for successfull registration
											if ($stmt->rowCount() == 1) {
												$response['status'] = 'success';
												$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; registered sucessfully, you may login now';
											} else {
												
												$response['status'] = 'error'; // could not register
												$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; could not register, try again later';
											}	
										}
										
								} // email checks
									
							}	// Username	checks	
					
					
					} else {
						
						$response['status'] = 'error'; //
						$response['message'] = 'Password dont match';
						
					}				
															
				} else {
					
					$response['status'] = 'error'; //
					$response['message'] = 'Your Password is too short';
				}	// Password too short					
			
			} else {
				
				$response['status'] = 'error'; //
				$response['message'] = 'Please type a valid email';
				
			} //user_email ends
		
		} else {
			
			$response['status'] = 'error'; //
			$response['message'] = 'You have to complete the form';
			
		} //complete form ends
		
	}
	
	
	echo json_encode($response);