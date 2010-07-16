<?php
	include '../common.php';

	if ($_POST) {
		$contact_id = $_POST['contact_id'];
		$note_user = "1";
		$note_text = htmlentities($_POST['note_text']);
		$note_create_time = time();
		$note_create_ip = $_SERVER['REMOTE_ADDR'];
		$note_create_hostname = getHostByAddr($note_create_ip);
		$sql = "INSERT INTO " . TBL_NOTES . " (contact_id, note_user, note_text, note_create_time, note_create_ip, note_create_hostname) ";
		$sql .= "VALUES('$contact_id','$note_user','$note_text','$note_create_time','$note_create_ip','$note_create_hostname')";
		//echo 'sql: ' . $sql . '<br />';
		$result = mysql_query($sql) or die(mysql_error());
	} else {
		echo 'there was an error submitting note<br />';
	}
?>
