<?php
	echo '
	<div class="content-box-header">Edit Note</div>
	<div class="content-box">
		<form class="fields" method="post" action="' . $this->config['pages']['edit'] . '">
			<input type="hidden" name="nonce" value="' . $this->nonce('edit') . '">
			<input type="hidden" name="note_id" value="'.$id.'">
			<ul class="fields">
				<li>
					<label>Contact: </label>
					<select class="textfield" name="contact_id">
				';
					$this->picker();
			echo '
					</select>
				</li>
				<li>
					<label>Note:</label>
					<textarea class="textfield" name="note_text" rows="5">' . $row['note_text'] . '</textarea>
				</li>
				<li><input class="btn" type="submit" value="Submit" /></li>
			</ul>
	</div>
	';
?>
