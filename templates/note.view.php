<?php
	echo '
	<div class="content-box-container">
		<div class="content-box-header">Note</div>
		<div class="content-box">
			<b>Date:</b> ' . date("m/d/Y", $row['note_create_time']) . '<br />
			<b>Client:</b> ' . $contact->getbyname($row['contact_id']) . '<br /><br />
			';

			if ($row['note_file_name'] == null) {
				echo nl2br($row['note_text']);
			} else {
				echo '
					<b>File type:</b> ' . $row['note_file_type'] . '
					<br />
					<br />
					<b>Upload date:</b> ' . date('m/d/Y', $row['note_create_time']) . '
					<br />
					<br />
					<b>Upload time:</b> ' . date('h:m:s A', $row['note_create_time']) . '
					<br />
					<br />
					<b>Download:</b> <a href="uploads/' . $row['note_file_name'] . '">' . $row['note_file_name'] . '
					<br />
					<br />
				';
			}
		echo '
		</div>
		';
?>
