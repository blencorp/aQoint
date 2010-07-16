<?php
	echo '
	<div class="content-box-header">Updated Contact Info</div>
	<div class="content-box">
		Name: ' . $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'] . '<br />
		DOB: ' . $row['contact_dob'] . '<br />
		SSN: ' . $row['contact_ssn'] . '<br />
		Employee Identification Number: ' . $row['contact_ein'] . '<br />
		Contact Type: ' . $row['contact_type'] . '<br />
		Referred By: ' . $row['contact_referredby'] . '<br />
		Street Address 1: ' . $row['contact_street1'] . '<br />
		Street Address 2: ' . $row['contact_street2'] . '<br />
		City: ' . $row['contact_city'] . '<br />
		State: ' . $row['contact_state'] . '<br />
		Zipcode: ' . $row['contact_zipcode'] . '<br />
		Country: ' . $row['contact_country'] . '<br />
		Phone: ' . $row['contact_phone'] . '<br />
		Email: ' . $row['contact_email'] . '<br />
		Website: ' . $row['contact_website'] . '<br />
		Details: ' . $row['contact_details'] . '<br />
	</div>
	';
?>
