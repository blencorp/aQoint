<?php
	echo '
	<div class="content-box-header">Create New Contact</div>
	<div class="content-box">
		<form class="fields" method="post" action="' . $this->config['pages']['create'] . '">
			<input type="hidden" name="nonce" value="' . $this->nonce('create') . '" />
			<ul>
				<li>
					<label>First Name: </label>
					<input class="textfield" type="text" name="contact_fname" value="" />
				</li>
				<li>
					<label>Middle Name: </label>
					<input class="textfield" type="text" name="contact_mname" value="" />
				</li>
				<li>
					<label>Last Name: </label>
					<input class="textfield" type="text" name="contact_lname" value="" />
				</li>
				<li>
					<label>DOB: </label>
					<input class="textfield" type="text" name="contact_dob" value="" />
				</li>
				<li>
					<label>SSN: </label>
					<input class="textfield" type="text" name="contact_ssn" value="" />
				</li>
				<li>
					<label>Employee Identification Number: </label>
					<input class="textfield" type="text" name="contact_ein" value="" />
				</li>
				<li>
					<label>Contact Type: </label>
					<input class="textfield" type="text" name="contact_type" value="" />
				</li>
				<li>
					<label>Referred By: </label>
					<input class="textfield" type="text" name="contact_referredby" value="" />
				</li>

				<li>
					<label>Street Address 1: </label>
					<input class="textfield" type="text" name="contact_street1" value="" />
				</li>
				<li>
					<label>Street Address 2: </label>
					<input class="textfield" type="text" name="contact_street2" value="" />
				</li>
				<li>
					<label>City: </label>
					<input class="textfield" type="text" name="contact_city" value="" />
				</li>
				<li>
					<label>State: </label>
					<input class="textfield" type="text" name="contact_state" value="" />
				</li>
				<li>
					<label>Zipcode: </label>
					<input class="textfield" type="text" name="contact_zipcode" value="" />
				</li>
				<li>
					<label>Country: </label>
					<input class="textfield" type="text" name="contact_country" value="" />
				</li>
				<li>
					<label>Phone: </label>
					<input class="textfield" type="text" name="contact_phone" value="" />
				</li>
				<li>
					<label>Email: </label>
					<input class="textfield" type="text" name="contact_email" value="" />
				</li>
				<li>
					<label>Website: </label>
					<input class="textfield" type="text" name="contact_website" value="" />
				</li>
				<li>
					<label>Details: </label>
					<textarea class="textfield" name="contact_details"></textarea>
				</li>
				<li><input class="btn" type="submit" value="Create Contact" /></li>
			</ul>
		</form>
	</div>
	';
?>
