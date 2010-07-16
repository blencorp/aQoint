<?php
	echo '
	<div class="content-box-header">Upload File</div>
	<div class="content-box">
		<form class="fields" method="post" action="' . $this->config['pages']['upload'] . '" enctype="multipart/form-data">
			<input type="hidden" name="nonce" value="' . $this->nonce('upload') . '" />
			<input type="hidden" name="contact_id" value="' . $row['contact_id'] . '" />
			<ul class="fields">
				<li>
					<label>Client: </label>
					<input class="textfield" value="' . $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'] . '" />
				</li>
				<li>
					<label>File Description:</label>
					<input class="textfield" type="text" name="note_file_desc" value="" />
				</li>
				<!--
				<li>
					<label>Your name:</label>
					<input class="textfield" type="text" name="note_user" value="" />
				</li>
				<li>
					<label>File name:</label>
					<input class="textfield" type="text" name="note_file_name" value="" />
				</li>
				<li>
					<label>File type:</label>
					<select class="textfield" name="note_file_type">
						<option name="pdf">PDF</option>
						<option name="doc">Word DOC</option>
					</select>
				</li>
				-->
				<li>
					<label>File:</label>
					<input type="file" name="file" id="file" value="" />
				</li>
				<li><input class="btn" type="submit" value="Upload" /></li>
			</ul>
		</form>
	</div>
	';
?>
