<div class="content-box-header">Setup Appointment</div>
<div class="content-box">
	<p>
		If you would like to setup an appointment with us, please fill out the form below 
		and we will contact you with more details.
	</p>
	<form class="fields" method="post" action="<? echo $this->config['pages']['create']; ?>">
		<input type="hidden" name="nonce" value="<? echo $this->nonce('create'); ?>" />
		<ul>
			<li>
				<label>Your First Name: </label>
				<input class="textfield" type="text" name="app_fname" value="" />
			</li>
			<li>
				<label>Your Last Name: </label>
				<input class="textfield" type="text" name="app_lname" value="" />
			</li>
			<!--
			<li>
				<label>Preferred Date: </label>
				<input class="textfield" type="text" name="app_date" value="" />
			</li>
			<li>
				<label>Preferred Time: </label>
				<input class="textfield" type="text" name="app_time" value="" />
			</li>
			-->
			<li>
				<label>Your Phone: </label>
				<input class="textfield" type="text" name="app_phone" value="" />
			</li>
			<li>
				<label>Your Email: </label>
				<input class="textfield" type="text" name="app_email" value="" />
			</li>
			<!--
			<li>
				<label>Your Timezone: </label>
				<input class="textfield" type="text" name="app_timezone" value="" />
			</li>
			-->
			<li>
				<label>Reason: </label>
				<textarea class="textfield" name="app_reason"></textarea>
			</li>
			<li><input class="btn" type="submit" value="Create Appointment" /></li>
		</ul>
	</form>
</div>
