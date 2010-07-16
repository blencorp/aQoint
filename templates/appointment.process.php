<?php
	$sql = "INSERT INTO $this->table_app (
					app_fname,
					app_lname,
					app_phone,
					app_email, 
					app_reason, 
					app_user, 
					app_create_time, 
					app_create_ip, 
					app_create_hostname) VALUES (
					'$app_fname',
					'$app_lname',
					'$app_phone',
					'$app_email',
					'$app_reason',
					'$app_user',
					'$app_create_time',
					'$app_create_ip',
					'$app_create_hostname'
					)";
	$result = mysql_query($sql) or die(mysql_error());
?>
