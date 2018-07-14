<?php
	$sql = "SELECT * FROM $this->table_contacts WHERE ";

	if ($search_fname != '') {
		$sql .= "contact_fname LIKE '%$search_fname%'";
	}
	if ($search_fname != '') {
		$sql .= " OR";
	}
	if ($search_lname != '') {
		$sql .= " contact_lname LIKE '%$search_lname%'";
	}
	if ($search_lname != '') {
		$sql .= " OR";
	}
	if ($search_phone != '') {
		$sql .= " contact_phone LIKE '%$search_phone%'";
	}
	if ($search_phone != '') {
		$sql .= " OR";
	}
	if ($search_email != '') {
		$sql .= " contact_email LIKE '%$search_email%'";
	}

	//echo 'sql: ' . $sql . '<br />';

	$result = mysql_query($sql) or die(mysql_error());

	?>
	<div class="content-box-header">Search Result</div>
	<div class="content-box">
	<?php
		$numrows = mysql_num_rows($result);
		if ($numrows < 1) {
			echo 'Could not find a matching contact.';
		}
		while ($row = mysql_fetch_array($result)) {
			echo '
				<ul>
					<li><label>Last Name:</label> <a href="contacts.php?q=view&id=' . $row['contact_id'] . '">' . $row['contact_lname'] . '</a></li>
					<li><label>First Name:</label> ' . $row['contact_fname'] . '</li>
				</ul>
			';
		}
	?>
	</div>
	<br />
	<?php
	$this->cp_search();
?>
