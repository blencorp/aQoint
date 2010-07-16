<?php
	echo '
	<div class="content-box-header">Edit Contact Info</div>
	<div class="content-box">
		<form class="fields" method="post" action="' . $this->config['pages']['edit'] . '">
			<input type="hidden" name="nonce" value="' . $this->nonce('edit') . '" />
			<input type="hidden" name="contact_id" value="' . $row['contact_id'] . '" />
			<ul class="fields">
				<li>
					<label>First Name: </label>
					<input class="textfield" type="text" name="contact_fname" value="' . $row['contact_fname'] . '" />
				</li>
				<li>
					<label>Middle Name: </label>
					<input class="textfield" type="text" name="contact_mname" value="' . $row['contact_mname'] . '" />
				</li>
				<li>
					<label>Last Name: </label>
					<input class="textfield" type="text" name="contact_lname" value="' . $row['contact_lname'] . '" />
				</li>
				<li>
					<label>DOB: </label>
					<input class="textfield" type="text" name="contact_dob" value="' . $row['contact_dob'] . '" />
				</li>
				<li>
					<label>SSN: </label>
					<input class="textfield" type="text" name="contact_ssn" value="' . $row['contact_ssn'] . '" />
				</li>
				<li>
					<label>Employee Identification Number: </label>
					<input class="textfield" type="text" name="contact_ein" value="' . $row['contact_ein'] . '" />
				</li>
				<li>
					<label>Contact Type: </label>
					<input class="textfield" type="text" name="contact_type" value="' . $row['contact_type'] . '" />
				</li>
				<li>
					<label>Referred By: </label>
					<input class="textfield" type="text" name="contact_referredby" value="' . $row['contact_referredby'] . '" />
				</li>

				<li>
					<label>Street Address 1: </label>
					<input class="textfield" type="text" name="contact_street1" value="' . $row['contact_street1'] . '" />
				</li>
				<li>
					<label>Street Address 2: </label>
					<input class="textfield" type="text" name="contact_street2" value="' . $row['contact_street2'] . '" />
				</li>
				<li>
					<label>City: </label>
					<input class="textfield" type="text" name="contact_city" value="' . $row['contact_city'] . '" />
				</li>
				<li>
					<label>State: </label>
					<input class="textfield" type="text" name="contact_state" value="' . $row['contact_state'] . '" />
				</li>
				<li>
					<label>Zipcode: </label>
					<input class="textfield" type="text" name="contact_zipcode" value="' . $row['contact_zipcode'] . '" />
				</li>
				<li>
					<label>Country: </label>
					<input class="textfield" type="text" name="contact_country" value="' . $row['contact_country'] . '" />
				</li>
				<li>
					<label>Phone: </label>
					<input class="textfield" type="text" name="contact_phone" value="' . $row['contact_phone'] . '" />
				</li>
				<li>
					<label>Email: </label>
					<input class="textfield" type="text" name="contact_email" value="' . $row['contact_email'] . '" />
				</li>
				<li>
					<label>Website: </label>
					<input class="textfield" type="text" name="contact_website" value="' . $row['contact_website'] . '" />
				</li>
				<li>
					<label>Details: </label>
					<textarea class="textfield" name="contact_details">' . $row['contact_details'] . '</textarea>
				</li>
				<li><input class="btn" type="submit" value="Save Changes" /></li>
			</ul>
		</form>
	</div>
	';
?>
