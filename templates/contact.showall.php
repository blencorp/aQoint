<?php
	echo '
		<ul class="longlist">
			<li>' . $row['contact_lname'] . ', ' . $row['contact_fname'] . '</li>
			<li>' . $row['contact_street1'] . '</li>
			<li>' . $row['contact_street2'] . '</li>
			<li>' . $row['contact_city'] . ', ' . $row['contact_state'] . ', ' . $row['contact_zipcode'] . '</li>
		</ul>
	';
?>
