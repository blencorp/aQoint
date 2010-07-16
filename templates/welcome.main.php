<?php
	$cnum = $contact->showcount();
	$nnum = $note->showcount();
	echo '
		<div class="content-box-header">Welcome</div>
		<div class="content-box">
			<ul>
				<li><b>' . $cnum . '</b> contacts</li>
				<li><b>' . $nnum . '</b> notes</li>
			</ul>
		</div>
		<br />
		<div class="content-box-header">Actions</div>
		<div class="content-box">
		';
		$dashboard->actions();
	echo '
		</div>
	';
?>
