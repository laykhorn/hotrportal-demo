<?php
session_start();
require 'inc_config.php';
require 'functions.php';
require 'template.php';
    define('DB_SERVER', $cfg['db']['hostname']);
    define('DB_USERNAME', $cfg['db']['username']);
    define('DB_PASSWORD', $cfg['db']['password']);
    define('DB_DATABASE', $cfg['db']['database']);
   // define("BASE_URL", "http://localhost/www.olamylekan.com/other/LikeReaction/");


    //try{

    function getDB() {
        
        $db_host = DB_SERVER;
        $db_name = DB_DATABASE;
        $db_user = DB_USERNAME;
        $db_pass = DB_PASSWORD;
        
        $gn_db = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
        
        $gn_db->exec("set names utf8");
        
        $gn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $gn_db;
    }
	$gn_db = getDB();
?>