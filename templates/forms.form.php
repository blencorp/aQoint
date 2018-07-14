<div class="content-box-header">Generate W-2 Form</div>
<div class="content-box">
	<p>
		When you submit this form, a W-2 document will be generated and saved into the user's file
	</p>
	<br />
	<form class="fields" method="post" action="<?php echo $this->config['pages']['create']; ?>">
		<input type="hidden" name="nonce" value="<?php echo $this->nonce('create'); ?>" />
		<ul id="formsgen">
			<li>
				<label>Client Name: </label>
				<select class="textfield" name="contact_id">
					<?php
						$contact = new Contact();
						$contact->name_id_list();
					?>
				</select>
			</li>
			<li>
				<label>Employee's social security number: </label>
				<input class="textfield" type="text" name="e_a" value="" />
			</li>
			<li>
				<label>Employer identification number: </label>
				<input class="textfield" type="text" name="e_b" value="" />
			</li>
			<li>
				<label>Employer's name: </label>
				<input class="textfield" type="text" name="e_c1" value="" />
			</li>
			<li>
				<label>Employer's street address: </label>
				<input class="textfield" type="text" name="e_c2" value="" />
			</li>
			<li>
				<label>Employer's street address 2: </label>
				<input class="textfield" type="text" name="e_c3" value="" />
			</li>
			<li>
				<label>Employer's city: </label>
				<input class="textfield" type="text" name="e_c4" value="" />
			</li>
			<li>
				<label>Employer's state: </label>
				<input class="textfield" type="text" name="e_c5" value="" />
			</li>
			<li>
				<label>Employer's zipcode: </label>
				<input class="textfield" type="text" name="e_c6" value="" />
			</li>
			<li>
				<label>Control number: </label>
				<input class="textfield" type="text" name="e_d" value="" />
			</li>
			<li>
				<label>Employee's first name: </label>
				<input class="textfield" type="text" name="e_e1" value="" />
			</li>
			<li>
				<label>Employee's middle initial: </label>
				<input class="textfield" type="text" name="e_e2" value="" />
			</li>
			<li>
				<label>Employee's last name: </label>
				<input class="textfield" type="text" name="e_e3" value="" />
			</li>
			<li>
				<label>Employee's Suffix: </label>
				<input class="textfield" type="text" name="e_e4" value="" />
			</li>
			<li>
				<label>Employee's street address: </label>
				<input class="textfield" type="text" name="e_f1" value="" />
			</li>
			<li>
				<label>Employee's street address 2: </label>
				<input class="textfield" type="text" name="e_f2" value="" />
			</li>
			<li>
				<label>Employee's city: </label>
				<input class="textfield" type="text" name="e_f3" value="" />
			</li>
			<li>
				<label>Employee's state: </label>
				<input class="textfield" type="text" name="e_f4" value="" />
			</li>
			<li>
				<label>Employee's zipcode: </label>
				<input class="textfield" type="text" name="e_f5" value="" />
			</li>
			<li>
				<label>Wages, tips, other compensation: </label>
				<input class="textfield" type="text" name="e_1" value="" />
			</li>
			<li>
				<label>Federal income tax withheld: </label>
				<input class="textfield" type="text" name="e_2" value="" />
			</li>
			<li>
				<label>Social security wages: </label>
				<input class="textfield" type="text" name="e_3" value="" />
			</li>
			<li>
				<label>Social security tax withheld: </label>
				<input class="textfield" type="text" name="e_4" value="" />
			</li>
			<li>
				<label>Medicare wages and tips: </label>
				<input class="textfield" type="text" name="e_5" value="" />
			</li>
			<li>
				<label>Medicare tax withheld: </label>
				<input class="textfield" type="text" name="e_6" value="" />
			</li>
			<li>
				<label>Social security tips: </label>
				<input class="textfield" type="text" name="e_7" value="" />
			</li>
			<li>
				<label>Allocated tips: </label>
				<input class="textfield" type="text" name="e_8" value="" />
			</li>
			<li>
				<label>Advance EIC payment: </label>
				<input class="textfield" type="text" name="e_9" value="" />
			</li>
			<li>
				<label>Dependent care benefits: </label>
				<input class="textfield" type="text" name="e_10" value="" />
			</li>
			<li>
				<label>Nonqualified plans: </label>
				<input class="textfield" type="text" name="e_11" value="" />
			</li>
			<li>
				<label>State: </label>
				<input class="textfield" type="text" name="e_15a" value="" />
			</li>
			<li>
				<label>Employer's state ID number: </label>
				<input class="textfield" type="text" name="e_15b" value="" />
			</li>
			<li>
				<label>State wages, tips, etc.: </label>
				<input class="textfield" type="text" name="e_16" value="" />
			</li>
			<li>
				<label>State income tax: </label>
				<input class="textfield" type="text" name="e_17" value="" />
			</li>
			<li>
				<label>Local wages, tips, etc: </label>
				<input class="textfield" type="text" name="e_18" value="" />
			</li>
			<li>
				<label>Local income tax: </label>
				<input class="textfield" type="text" name="e_19" value="" />
			</li>
			<li>
				<label>Locality name: </label>
				<input class="textfield" type="text" name="e_20" value="" />
			</li>

			<li><input class="btn" type="submit" value="Generate Form" /></li>
		</ul>
	</form>
</div>
