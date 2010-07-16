<?php
	echo '
	<div class="content-box-header">Upload Result</div>
	<div class="content-box">
			<ul class="fields">
				<li>
					<label>Client: </label>
					<input class="textfield" value="' . $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'] . '" />
				</li>
				<li>
					<label>Your name:</label>
					<input class="textfield" type="text" name="note_user" value="" />
				</li>
				<li>
					<label>File name:</label>
					<input class="textfield" type="text" name="note_filename" value="" />
				</li>
				<li>
					<label>File type:</label>
					<select class="textfield" name="note_filetype">
						<option name="pdf">PDF</option>
						<option name="doc">Word DOC</option>
					</select>
				</li>
				<li>
					<label>Location:</label>
					<input type="file" name="note_file" value="" />
				</li>
			</ul>
		</form>
	</div>
	';
?>
