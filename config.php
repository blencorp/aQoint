<?php
    require_once 'vendor-tmp/mysql.php';
    $config = include 'config-tmp/config.php';
	$dbhost = $config['dbhost'];

	$dbname = $config['dbname'];
	$dbuser = $config['dbuser'];

	$dbpass = $config['dbpass'];

	DEFINE('TBL_CONTACTS', "contacts");
	DEFINE('TBL_NOTES', "notes");

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	$db = mysql_select_db($dbname);

	DEFINE('INSITE', true);
?>
