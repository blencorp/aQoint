<?php
	$contact = new Contact();
	echo '
	<div class="content-box" style="margin-top:10px">
		<h2 style="border:0">Add a note about ' . $contact->getbyname($id) . '</h2>
		<div id="note_form">
			<form name="note" id="add_note" method="post">
				<input type="hidden" name="contact_id" id="contact_id" value="'.$id.'">
				<input type="hidden" name="note_date" id="note_date" value="' . date("Y-m-d", time()) .'">
				<ul>
					<li>
						<textarea class="textfield" name="note_text" id="note_text" cols="40" style="height: 70px"></textarea>
					</li>
					<li style="text-align:right">
						<input class="btn" type="submit" name="submit" id="submit_btn" value="Add this note" />
					</li>
				</ul>
			</form>
			<span class="error" style="display:none"><p style="color:red;font-weight:bold">Unable to save note</p></span>
			<span class="success" style="display:none"><p style="color:green;font-weight:bold">Successfully saved note</p></span>
		</div>
	</div>
	';
?>
