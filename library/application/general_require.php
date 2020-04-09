<?php
require 'library/config/general_config.php';
if(!isset($_SESSION['authenticUser']))
{
	header("Location: $site_url_index");
} else {
    $generate_random_number = trim(rand(100000000, 99999999999).rand(1000000, 10000000000).
                    "".  
                    rand(1000, 9999999999));
	$generate_id = trim(rand(100000000, 99999999999).rand(1000000, 10000000000));
	
	if (isset($_SESSION["authenticUser"]) && !empty($_SESSION["authenticUser"])) {
		$getuser_stmt_query = "SELECT * FROM users WHERE unique_id=:uid";
		$getuser_stmt = $gn_db->prepare($getuser_stmt_query);
		$getuser_stmt->execute(array(":uid"=>$_SESSION['authenticUser']));
		$userRow = $getuser_stmt->fetch(PDO::FETCH_OBJ);
		
		// PAGE OWNER
		$pgo_uname = validate_user_input($userRow->uname);
		$pgo_fname = validate_user_input($userRow->fname);
	}
}
?>