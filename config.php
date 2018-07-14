<?php
    require_once 'vendor-tmp/mysql.php';
	$dbhost = "localhost";

	//ESAi
	$dbname = "bleng3_aqoint";
	$dbuser = "bleng3_aqoint";

	/*
	//local
	$dbname = "contactms";
	$dbuser = "contactms";
	*/

	$dbpass = "aq0int";

	DEFINE('TBL_CONTACTS', "contacts");
	DEFINE('TBL_NOTES', "notes");

	$con = mysql_connect($dbhost, $dbuser, $dbpass);
	$db = mysql_select_db($dbname);

	DEFINE('INSITE', true);
?>
