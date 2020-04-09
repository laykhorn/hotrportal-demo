<?php
        require '../../config/general_config.php';

if(isset($_POST['btn-login']))
{
        //$user_name = $_POST['user_name'];
        $user_verify = validate_user_input_lowercase($_POST['user_id']);
        $user_password = validate_user_password($_POST['password']);

        $password = md5($user_password);
            $gn_db = getDB();
            
                $sql_login_query = "SELECT * FROM `users` WHERE email=:email OR uname=:email OR phone=:email LIMIT 1";
                $stmt = $gn_db->prepare($sql_login_query);
                $stmt->bindParam(':email', $user_verify);
                $stmt->bindParam(':pass', $password);
                $stmt->execute(array(":email"=>$user_verify));
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                //$userRow_count = $stmt->rowCount;
                
                
                //$count = $stmt->rowCount();

                if($userRow['password']==$password){

                       echo "ok"; // log in
                        $_SESSION['authenticUser'] = $userRow['unique_id'];
                        
                            $login_token = validate_user_input(rand(1000000, 1000000009).rand(10045760, 9999999999));
                            $login_status = "Online";
                        
                            
                            $session_query1 = "UPDATE users SET user_session_token=:session_token, user_session_status=:session_status WHERE user_id=:session_start";
                            $stmt = $gn_db->prepare($session_query1);
                            $stmt->execute(array(':session_token'=>$login_token, ':session_status'=>$login_status, ':session_start'=>$userRow['user_id']));
                        $gn_db = null;
                        //return $userRow;
                }
                else{

                        //$response['status'] = 'error'; // could not log in
                        echo "The Email, Username or Phone Number and Password you entered did not match our records Please double-check and try again !!!";
                }

                $gn_db = null;
                return $userRow;
}
?>