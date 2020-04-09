<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * FUNCTION
 */

function validate_user_input_lowercase($input_lowercase) {
    $input_lowercase = trim($input_lowercase);
    $input_lowercase = strip_tags($input_lowercase);
    $input_lowercase = stripslashes($input_lowercase);
    $input_lowercase = htmlspecialchars($input_lowercase);
    $input_lowercase = strtolower($input_lowercase);
    $input_lowercase = mysql_real_escape_string($input_lowercase);

    return $input_lowercase;
}

function validate_user_input($input) {
    $input = trim($input);
    $input = strip_tags($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    //$input = mysql_real_escape_string($input);

    return $input;
}

function validate_user_password($password) {
    $password = trim($password);
    $password = strip_tags($password);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = mysql_real_escape_string($password);

    return $password;
}
?>