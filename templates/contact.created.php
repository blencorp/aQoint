<?php
	echo '
	<div class="content-box-header">Contact Details</div>
	<div class="content-box">
		Contact has been created. 
	</div>

	<div class="content-box">
		<h3>' . $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'] . '</h3>
		<ul>
			<li>' . $row['contact_street1'] . '</li>
			<li>' . $row['contact_street2'] . '</li>
			<li>' . $row['contact_city'] . ', ' . $row['contact_state'] . ', ' . $row['contact_zipcode'] . '</li>
		</ul>
		<br />
		<a href="contacts.php?q=all">Show all contacts</a>
	</div>
	';
?>
