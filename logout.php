<?php
require 'library/config/general_config.php';
       
  // remove all session variables
session_unset();

// destroy the session
session_destroy(); 
 header("Location: index");
?>