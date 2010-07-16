<?php
	echo '
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top">
					<div class="content-box-header">Contact Details</div>
					<div class="content-box" style="border:0px solid blue;padding-bottom:0">
						<ul class="contact-details">
							<li class="head">' . $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'] . '</li>
							<li>' . $row['contact_street1'] . '</li>
							';
							if ($row['contact_street2'] != '') {
								echo ' 
									<li>' . $row['contact_street2'] . '</li>
								';
							}
							echo '
							<li>' . $row['contact_city'] . ', ' . $row['contact_state'] . ', ' . $row['contact_zipcode'] . '</li>
						</ul>
					</div>
					<div class="content-box" style="border:0px solid red;padding-top:1px;">
						<p id="showmore" style="text-align:right">
							<a href="javascript:expand();">[+] More</a>
						</p>
						<p id="showless" style="text-align:right">
							<a href="javascript:expand();">[-] Less</a>
						</p>
						<div class="msg_list">
							<div class="msg_body">
								<ul class="contact-details">
									<li><label>Phone: </label>' . $row['contact_phone'] . '</li>
									<li><label>Email: </label>' . $row['contact_email'] . '</li>
									<li><label>Social Security Number: </label>' . $row['contact_ssn'] . '</li>
									<li><label>Date of Birth: </label>' . $row['contact_dob'] . '</li>
									<li><label>Employee Identification Number: </label>' . $row['contact_ein'] . '</li>
								</ul>
							</div>
						</div>
					</div>
			';

				$contact = new Contact();
				$note = new Notes();
		
				// show note form
				$note->create();
		
				// show notes for this contact
				//$contact->contactnotes();
				$contact->contactnotes($row['contact_id']);

				echo '<br /><br />';
				$contact->cp_byid($id);

			echo '
				</td>
				<td valign="top">
					<div class="content-box" style="margin-left:9px;width:300px">
					<b><u>Files for '.$contact->getbyname($id).':</u></b><br /><br />
				';

					// show files for this contact
					//$contact->contactfiles();
					$contact->contactfiles($row['contact_id']);

			echo '
				</td>
			</tr>
		</table>
	';
?>
