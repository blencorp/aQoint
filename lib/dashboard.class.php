<?php
	class Dashboard 
	{
		var $table_notes = "notes";
		var $table_contacts = "contacts";

		function __construct()
		{
			//
		}

		public function actions()
		{
			echo '
				<ul>
					<li><a href="contacts.php?q=all">&#187; View all contacts</a></li>
					<li><a href="contacts.php?q=create">&#187; Create a new contact</a></li>
					<!--
					<li><a href="tasks.php?q=all">&#187; View tasks</a></li>
					-->
					<li><a href="appointments.php?q=all">&#187; View appointments</a></li>
					<li><a href="appointments.php?q=create">&#187; Create an appointment</a></li>
					<li><a href="export.php">&#187; Export contacts to Excel</a></li>
					<li><a href="forms.php">&#187; Process W-2 Form</a></li>
				</ul>
			';
		}

		public function latest()
		{
			$contact = new contact();
			$sql = "SELECT * FROM $this->table_notes ORDER BY note_create_time DESC LIMIT 10";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
				$notetype = $row['note_type'];
				if ($notetype == "upload") {
					echo '
						<a href="contacts.php?q=view&id=' . $row['contact_id'] .  '">
							<b><u>' . $contact->getbyname($row['contact_id']) . '</u></b> <u>on ' . date("m/d/Y", $row['note_create_time']) . '</u><br />
						</a>
					';
					echo '<b>[File Uploaded]</b>';
					echo '<br /><br />';
					//echo $row['note_text'] . '<br /><br />';
				} else {
					echo '
						<a href="contacts.php?q=view&id=' . $row['contact_id'] .  '">
							<b><u>' . $contact->getbyname($row['contact_id']) . '</u></b> <u>on ' . date("m/d/Y", $row['note_create_time']) . '</u><br />
						</a>
					';
					echo $row['note_text'] . '<br /><br />';
				}
			}
		}

		function __destruct()
		{
			//
		}
	}
	$dashboard = new Dashboard();
?>
