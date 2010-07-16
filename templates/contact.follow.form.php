<?php
	echo '
	<div class="content-box-header">Follow up</div>
	<div class="content-box">
		<ul class="fields">
			<li>
				<label>Client: </label>
				<input class="textfield" value="' . $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'] . '" />
			</li>
			<li>
				<label>Your name:</label>
				<input class="textfield" type="text" name="contact_create_user" value="" />
			</li>
			<li>
				<label>Note:</label>
				<textarea class="textfield" name="contact_note" rows="5"></textarea>
			</li>
			<li><input class="btn" type="submit" value="Submit" /></li>
		</ul>
		<form class="fields" method="post" action="' . $this->config['pages']['search'] . '">
		<br />
	</div>
	';
?>
