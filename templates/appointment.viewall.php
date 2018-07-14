<div class="content-box-header">Appointments</div>
<div class="content-box">
	<?php
		while ($row = mysql_fetch_array($result)) {
			echo '
				<ul class="">
					<li>ID: '.$row['app_id'].'</li>
					<li>'.$row['app_fname'].'</li>
					<li>'.$row['app_lname'].'</li>
					<li>'.$row['app_phone'].'</li>
					<li>'.$row['app_email'].'</li>
				</ul>
			';
		}
	?>
</div>
