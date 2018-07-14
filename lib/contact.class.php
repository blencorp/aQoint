<?php
	class Contact
	{
		function __construct()
		{
			//
		}

		protected $config = array (
			'pages' => array (
				'create' => "contacts.php?q=create",
				'edit' => "contacts.php?q=edit",
				'view' => "contacts.php?q=view",
				'view_all' => "contacts.php?q=all",
				'view_note' => "notes.php?q=view",
				'upload' => "contacts.php?q=upload",
				'note' => "contacts.php?q=note",
				'search' => "contacts.php?q=search",
				'more' => "contacts.php?q=create",
				'approve' => "contacts.php?q=approve",
			),
		);

		public function query($id = '') {
			if ($id == '') {
				$sql = "SELECT * FROM " . TBL_CONTACTS . "";
			} else {
				$sql = "SELECT * FROM " . TBL_CONTACTS . " WHERE contact_id = '$id'";
			}
			$result = mysql_query($sql) or die("error:" . mysql_error());
			return $result;
		}

		public function showcount()
		{
			$sql = "SELECT COUNT(contact_id) AS numrows FROM " . TBL_CONTACTS . "";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$num = $row['numrows'];
			return $num;
		}

		public function name_id_list()
		{
			$result = $this->query();
			while ($row = mysql_fetch_assoc($result)) {
				echo '
					<option value="' . $row['contact_id'] . '">' . $row['contact_fname'] . ' ' . $row['contact_lname'] . '</option>
				';
			}
			mysql_free_result($result);
			unset($result);
		}


		public function getbyname($id)
		{
			$return = $this->query($id);
			$row = mysql_fetch_assoc($return);
			$name = $row['contact_fname'] . ' ' . $row['contact_lname'];
			return $name;
		}

		public function edit()
		{
			$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			if ($id == '') {
				die('You did not provide an id for this function: Contact->edit()');
			}
			if ($this->nonce('edit') == $_POST['nonce']) {
				$id = $_POST['contact_id'];
				$contact_fname = $_POST['contact_fname'];
				$contact_mname = $_POST['contact_mname'];
				$contact_lname = $_POST['contact_lname'];
				$contact_dob = $_POST['contact_dob'];
				$contact_ssn = $_POST['contact_ssn'];
				$contact_ein = $_POST['contact_ein'];
				$contact_type = $_POST['contact_type'];
				$contact_referredby = $_POST['contact_referredby'];
				$contact_street1 = $_POST['contact_street1'];
				$contact_street2 = $_POST['contact_street2'];
				$contact_city = $_POST['contact_city'];
				$contact_state = $_POST['contact_state'];
				$contact_zipcode = $_POST['contact_zipcode'];
				$contact_country = $_POST['contact_country'];
				$contact_phone = $_POST['contact_phone'];
				$contact_email = $_POST['contact_email'];
				$contact_website = $_POST['contact_website'];
				$contact_details = htmlentities($_POST['contact_details']);
				$contact_edit_user = '1';
				//$contact_edit_user =  $_POST['contact_edit_user'];
				$contact_edit_time = time();
				$contact_edit_ip = $_SERVER['REMOTE_ADDR'];
				$contact_edit_hostname = getHostByAddr($contact_edit_ip);

				$sql = "UPDATE " . TBL_CONTACTS . " SET
								contact_fname = '$contact_fname',
								contact_mname = '$contact_mname',
								contact_lname = '$contact_lname',
								contact_dob = '$contact_dob',
								contact_ssn = '$contact_ssn',
								contact_ein = '$contact_ein',
								contact_type = '$contact_type',
								contact_referredby = '$contact_referredby',
								contact_street1 = '$contact_street1',
								contact_street2 = '$contact_street2',
								contact_city = '$contact_city',
								contact_state = '$contact_state',
								contact_zipcode = '$contact_zipcode',
								contact_country = '$contact_country',
								contact_phone = '$contact_phone',
								contact_email = '$contact_email',
								contact_website = '$contact_website',
								contact_details = '$contact_details',
								contact_edit_user = '$contact_edit_user',
								contact_edit_time = '$contact_edit_time',
								contact_edit_ip = '$contact_edit_ip',
								contact_edit_hostname = '$contact_edit_hostname'
								WHERE contact_id = '$id'";

				//echo $sql . '<br />';
				$result = mysql_query($sql) or die(mysql_error());

				// fetch again to show result
				$result = $this->query($id);
				$row = mysql_fetch_assoc($result);
				require("templates/edit.result.php");
				$this->cp_result($id);
			} else {
				$result = $this->query($id);
				$row = mysql_fetch_assoc($result);
				//echo 'contact_id: ' . $row['contact_id'];
				require("templates/edit.form.php");
			}
		}

		// function below shows options on main contact page
		public function cp_main()
		{
			echo '
				<div class="content-box">
					<a href="' . $this->config['pages']['view_all'] . '">View all contacts</a> |
					<a href="' . $this->config['pages']['create'] . '">Create a new contact</a>
				</div>
			';
		}

		// function below shows options for upload section
		public function cp_upload($id)
		{
			echo '
				<div class="content-box">
					<a href="' . $this->config['pages']['view'] . '&id='.$id.'">View all files for this client</a>
					 |
					<a href="' . $this->config['pages']['view_all'] . '">View all contacts</a>
				</div>
			';
		}

		// function below shows options after an entry has been updated
		public function cp_result($id)
		{
			echo '
				<div class="content-box">
					<a href="' . $this->config['pages']['edit'] . '&id='.$id.'">Re-edit item</a> |
					<a href="' . $this->config['pages']['view'] . '&id='.$id.'">View Complete Information</a> |
					<a href="' . $this->config['pages']['upload'] . '&id='.$id.'">Upload file for this item</a> |
					<a href="' . $this->config['pages']['note'] . '&id='.$id.'">Add a note for this contact</a> |
					<a href="' . $this->config['pages']['view_all'] . '">View all contacts</a>
				</div>
			';
		}

		// function below shows options for a single entry view
		public function cp_byid($id)
		{
			echo '
				<div class="content-box">
					<a href="' . $this->config['pages']['edit'] . '&id='.$id.'">Edit item</a> |
					<a href="' . $this->config['pages']['view'] . '&id='.$id.'">View Complete Information</a> |
					<a href="' . $this->config['pages']['upload'] . '&id='.$id.'">Upload file for this item</a> |
					<a href="' . $this->config['pages']['note'] . '&id='.$id.'">Add a note for this contact</a> |
					<a href="' . $this->config['pages']['view_all'] . '">View all contacts</a>
				</div>
			';
		}

		// this is a function that returns the extension of a file
		private function getext($filename)
		{
			$file_array = explode('.',$filename);
			$size = count($file_array);
			$ext = $file_array[$size-1];
			return $ext;
		}

		public function upload()
		{
			$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			if ($id == '') {
				die('You did not provide id for this function: Contact->upload()');
			}
			if ($this->nonce('upload') == $_POST['nonce'])
			{
				echo '<div class="content-box-header">File Uploaded</div>';
				echo '<div class="content-box">';
				if ($_FILES["file"]["error"] > 0)
				{
					echo "Error: " . $_FILES["file"]["error"] . "<br />";
				}
				else
				{
					$contact_id = $_POST['contact_id'];
					$note_type = "upload";
					$note_user = "1";
					$note_create_time = time();
					$note_create_ip = $_SERVER['REMOTE_ADDR'];
					$note_create_hostname = getHostByAddr($note_create_ip);
					$note_file_name = uniqid('contact_'.$contact_id.'_');
					$note_file_type = $_FILES["file"]["type"];
					$note_file_desc = $_POST['note_file_desc'];

					$fileext = '.'.$this->getext($_FILES["file"]["name"]);
					$note_file_name .= $fileext;

					echo "Upload: " . $_FILES["file"]["name"] . "<br />";
					echo "Type: " . $_FILES["file"]["type"] . "<br />";
					echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
					echo "Temp stored in: " . $_FILES["file"]["tmp_name"] . '<br />';

					// save file
					if (file_exists("uploads/" . $_FILES["file"]["name"]))
					{
						echo $_FILES["file"]["name"] . " already exists. ";
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $note_file_name);
						echo "Now Stored in: " . "uploads/" . $note_file_name . "<br />";

						$sql = "INSERT INTO " . TBL_NOTES . " ";
						$sql .= "(contact_id, note_type, note_file_name, note_file_type, note_file_desc, ";
						$sql .= "note_user, note_create_time, note_create_ip, note_create_hostname) ";
						$sql .= "VALUES('$contact_id','$note_type','$note_file_name','$note_file_type',";
						$sql .= "'$note_file_desc',";
						$sql .= "'$note_user','$note_create_time','$note_create_ip','$note_create_hostname')";

						//echo 'sql: ' . $sql . '<br />';
						$result = mysql_query($sql);

						if ($result) {
							echo 'Database entry updated.';
						} else {
							echo 'Failed to update database.';
						}
					}
				}
				echo '</div>';
				$this->cp_upload($contact_id);
			} else {
				$return = $this->query($id);
				$row = mysql_fetch_assoc($return);
				include("templates/upload.form.php");
			}
		}

		public function note()
		{
			$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			if ($id == "") {
				die('You did not provide an id for this function: Contact->note()');
			}
			if ($this->nonce('note') == $_POST['nonce']) {
				$contact_id = $_POST['contact_id'];
				$note_text = htmlentities($_POST['note_text']);
				$note_user = "1";
				$note_file_type = "note";
				$note_create_time = time();
				$note_create_ip = $_SERVER['REMOTE_ADDR'];
				$note_create_hostname = getHostByAddr($note_create_ip);

				$sql = "INSERT INTO " . TBL_NOTES . " (
								contact_id,
								note_type,
								note_text,
								note_user,
								note_create_time,
								note_create_ip,
								note_create_hostname) ";
				$sql .= "VALUES (
								'$contact_id',
								'$note_type',
								'$note_text',
								'$note_user',
								'$note_create_time',
								'$note_create_ip',
								'$note_create_hostname')";

				$result = mysql_query($sql);

				echo '<div class="content-box">';
				if ($result) {
					echo 'Database updated.';
				} else {
					echo 'Failed to update database.';
				}
				echo '</div>';
				$this->cp_upload($contact_id);

			} else {
				$return = $this->query($id);
				$row = mysql_fetch_assoc($return);
				include("templates/note.form.php");
			}
		}

		public function search()
		{
			if ($this->nonce('search') == $_POST['nonce']) {
				$val = $_POST['search_value'];
				$sql = "SELECT * FROM " . TBL_CONTACTS . " WHERE contact_fname LIKE '%$val%' OR contact_mname LIKE '%$val%' OR contact_lname LIKE '%$val%'";
				$result = mysql_query($sql);
				echo '
					<div class="content-box-header">Search Result</div>
					<div class="content-box">
				';
				while ($row = mysql_fetch_array($result)) {
					$id = $row['contact_id'];
					echo '
						<ul style="list-style:none">
							<li style="display:inline">' . $row['contact_id'] . '</li>
							<li style="display:inline"><a href="' . $this->config['pages']['view'] . '&id='.$id.'">' . $row['contact_lname'] . '</a></li>
							<li style="display:inline">' . $row['contact_fname'] . '</li>
							<li style="display:inline">' . $row['contact_mname'] . '</li>
						</ul>
						<br />
					';
				}
				echo '</div>';
			} else {
				include("templates/contact.search.php");
				$this->cp_main();
			}
		}

		public function contactfiles($id)
		{
			if ($id == '') {
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			}
			if ($id == '') {
				die('You did not provide an id for this function: contact->contactfiles($id)');
			}
			$sql = "SELECT * FROM " . TBL_NOTES . " WHERE contact_id = '$id' AND note_type = 'upload'";
			//$sql = "SELECT * FROM " . TBL_NOTES . " WHERE contact_id = '$id' AND note_file_name != 'NULL'";
			$result = mysql_query($sql);
			$nrows = mysql_num_rows($result);
			//echo 'nrows: ' . $nrows . '<br />';
			if ($nrows > 0) {
				while ($row = mysql_fetch_array($result)) {
					$filename = $row['note_file_name'];
					$filedesc = $row['note_file_desc'];
					if ($filedesc == '') {
						$filedesc = "[No description]";
					}
					$fileloc = 'uploads/' . $filename;
					echo '
						<a href="'.$fileloc.'">&#187; '.$filedesc.'</a> [' . date("m/d/Y", $row['note_create_time']) . ']
						<br />
						<br />
					';
					/*
					echo '
						<a href="'.$fileloc.'">&#187; '.$filename.'</a> [' . $row['note_file_desc'] . ']
						uploaded on <u>' . date('Y-m-d', $row['note_create_time']) . '</u>
					';
					*/
				}
			} else {
				echo 'None';
			}
			//echo '</div>';
		}

		public function contactnotes($id)
		{
			// how many rows to show per page
			$rowsPerPage = 5;

			// by default we show first page
			$pageNum = 1;

			// if $_GET['page'] defined, use it as page number
			if(isset($_GET['page']))
			{
					$pageNum = $_GET['page'];
			}

			// counting the offset
			$offset = ($pageNum - 1) * $rowsPerPage;

			$sql = "SELECT * FROM " . TBL_NOTES . " WHERE note_file_name is NULL AND contact_id = '$id' ORDER BY note_create_time DESC LIMIT $offset, $rowsPerPage";
			//$sql = "SELECT * FROM notes WHERE contact_id = '$id'";
			$result = mysql_query($sql);

			// check if there are any files for the contact, if not, don't show any
			$numrows = mysql_num_rows($result);

			echo '
				<br /><br />
				<div class="content-box" style="border:0px solid red">
					<h2>Notes for this contact</h2>
					<ul id="note">
			';

			if ($numrows > 0) {
				while ($row = mysql_fetch_array($result)) {
					echo '
						<li>
							<label>' . date('Y-m-d', $row['note_create_time']) . '</label>
							' . $row['note_text'] . '
						</li>
					';
				}

				echo '
					</ul>
					<br />
				';

				// how many rows we have in database
				$sql   = "SELECT COUNT(contact_id) AS numrows FROM " . TBL_NOTES . " WHERE contact_id = '$id'";
				$result  = mysql_query($sql) or die('Error, query failed');
				$row     = mysql_fetch_array($result, MYSQL_ASSOC);
				$numrows = $row['numrows'];

				// how many pages we have when using paging?
				$maxPage = ceil($numrows/$rowsPerPage);

				// print the link to access each page
				$self = $this->config['pages']['view'] . '&id=' . $id;
				//$self = $this->config['pages']['list'];
				$nav  = '';

				if ($pageNum > 1)
				{
					 $page  = $pageNum - 1;
					 $prev  = " <a href=\"$self&page=$page\">[Prev]</a> ";

					 $first = " <a href=\"$self&page=1\">[First Page]</a> ";
				}
				else
				{
					 $prev  = '&nbsp;'; // we're on page one, don't print previous link
					 $first = '&nbsp;'; // nor the first page link
				}

				if ($pageNum < $maxPage)
				{
					 $page = $pageNum + 1;
					 $next = " <a href=\"$self&page=$page\">[Next]</a> ";

					 $last = " <a href=\"$self&page=$maxPage\">[Last Page]</a> ";
				}
				else
				{
					 $next = '&nbsp;'; // we're on the last page, don't print next link
					 $last = '&nbsp;'; // nor the last page link
				}
				//echo '<div class="content-box">';
				echo $first . $prev . "Showing page $pageNum of $maxPage pages " . $next . $last;
				//echo '</div>';
			} else {
				echo 'No notes for this contact.';
			}
			echo '</div>';
		}

		public function showbyid($id = '') {
			if ($id == '') {
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			}
			if ($id == '') {
				die('You did not provide an id for this function: Contact->showbyid($id)');
			}
			$sql = "SELECT * FROM " . TBL_CONTACTS . " WHERE contact_id = '$id'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			include("templates/contact.view.php");
			//$this->cp_byid($id);
		}

		public function getitem($id = '', $mode = '')
		{
			if ($mode == 'latest') {
				$sql = "SELECT * FROM " . TBL_CONTACTS . " ORDER BY contact_id DESC LIMIT 1";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				include("templates/contact.created.php");
			} else {
				if ($id = '') {
					echo 'Empty query';
				} else {
					$sql = "SELECT * FROM " . TBL_CONTACTS . " WHERE contact_id = '$id'";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					include("templates/contact.created.php");
				}
			}
		}

		public function create()
		{
			if ($this->nonce('create') == $_POST['nonce']) {
				$contact_fname = $_POST['contact_fname'];
				$contact_mname = $_POST['contact_mname'];
				$contact_lname = $_POST['contact_lname'];
				$contact_dob = $_POST['contact_dob'];
				$contact_ssn = $_POST['contact_ssn'];
				$contact_ein = $_POST['contact_ein'];
				$contact_type = $_POST['contact_type'];
				$contact_referredby = $_POST['contact_referredby'];
				$contact_street1 = $_POST['contact_street1'];
				$contact_street2 = $_POST['contact_street2'];
				$contact_city = $_POST['contact_city'];
				$contact_state = $_POST['contact_state'];
				$contact_zipcode = $_POST['contact_zipcode'];
				$contact_country = $_POST['contact_country'];
				$contact_phone = $_POST['contact_phone'];
				$contact_email = $_POST['contact_email'];
				$contact_website = $_POST['contact_website'];
				$contact_details = htmlentities($_POST['contact_details']);
				$contact_create_time= time();

				/*
				if ($user_fname == '') {
					echo 'You must enter a first name. Please go back and try again.';
				}
				*/

				$sql = "INSERT INTO " . TBL_CONTACTS . " (contact_fname, contact_mname, contact_lname, contact_dob, ";
				$sql .= "contact_ssn, contact_ein, contact_type, contact_referredby, contact_street1, ";
				$sql .= "contact_street2, contact_city, contact_state, contact_zipcode, contact_country, ";
				$sql .= "contact_phone, contact_email, contact_website, contact_details, contact_create_time) ";
				$sql .= "VALUES ('$contact_fname','$contact_mname', '$contact_lname', '$contact_dob'";
				$sql .= ",'$contact_ssn', '$contact_ein', '$contact_type', '$contact_referredby', '$contact_street1'";
				$sql .= ",'$contact_street2','$contact_city','$contact_state','$contact_zipcode','$contact_country'";
				$sql .= ",'$contact_phone','$contact_email','$contact_website','$contact_details','$contact_create_time')";

				//echo $sql . '<br />';

				$result = mysql_query($sql) or die(mysql_error());

				$lid = mysql_insert_id();

				$this->getitem('','latest'); // pass id and mode

				/*
				if ($result) {
					echo 'Thank you for registering. You will receive an email when your account has been activated.';
				} else {
					echo 'Sorry, we could not complete your request. Please try again.';
				}
				*/

			} else {
				include("templates/contact.create.php");
			}
		}

		public function showall()
		{
			// how many rows to show per page
			$rowsPerPage = 20;

			// by default we show first page
			$pageNum = 1;

			// if $_GET['page'] defined, use it as page number
			if(isset($_GET['page']))
			{
					$pageNum = $_GET['page'];
			}

			// counting the offset
			$offset = ($pageNum - 1) * $rowsPerPage;

			$sql = "SELECT * FROM " . TBL_CONTACTS . " ORDER BY contact_lname LIMIT $offset, $rowsPerPage";
			$result = mysql_query($sql) or die('Error, query failed');

			echo '
				<div class="content-box-header">Contact List</div>
				<div class="content-box">
				<table width="100%">
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>City</th>
						<th>State</th>
						<th>Country</th>
						<th>Create Date</th>
						<th>Last Update</th>
					</tr>
			';
			while($row = mysql_fetch_array($result))
			{
				$id = $row['contact_id'];
				echo '
					<tr>
						<td><a href="' . $this->config['pages']['view'] . '&id=' . $id . '">' . $row['contact_lname'] . '</a></td>
						<td>' . $row['contact_fname'] . '</td>
						<td>' . $row['contact_email'] . '</td>
						<td>' . $row['contact_phone'] . '</td>
						<td>' . $row['contact_city'] . '</td>
						<td>' . $row['contact_state'] . '</td>
						<td>' . $row['contact_country'] . '</td>
						<td>' . date('Y-m-d', $row['contact_create_time']) . '</td>
						<td>' . date('Y-m-d', $row['contact_edit_time']) . '</td>
					</tr>
				';
				//include("templates/contact.showall.php");
			}
			echo '
					</table>
				</div>
			';

			// how many rows we have in database
			$sql   = "SELECT COUNT(contact_id) AS numrows FROM " . TBL_CONTACTS . "";
			$result  = mysql_query($sql) or die('Error, query failed');
			$row     = mysql_fetch_array($result, MYSQL_ASSOC);
			$numrows = $row['numrows'];

			// how many pages we have when using paging?
			$maxPage = ceil($numrows/$rowsPerPage);

			// print the link to access each page
			$self = $this->config['pages']['list'];
			$nav  = '';

			if ($pageNum > 1)
			{
				 $page  = $pageNum - 1;
				 $prev  = " <a href=\"$self&page=$page\">[Prev]</a> ";

				 $first = " <a href=\"$self&page=1\">[First Page]</a> ";
			}
			else
			{
				 $prev  = '&nbsp;'; // we're on page one, don't print previous link
				 $first = '&nbsp;'; // nor the first page link
			}

			if ($pageNum < $maxPage)
			{
				 $page = $pageNum + 1;
				 $next = " <a href=\"$self&page=$page\">[Next]</a> ";

				 $last = " <a href=\"$self&page=$maxPage\">[Last Page]</a> ";
			}
			else
			{
				 $next = '&nbsp;'; // we're on the last page, don't print next link
				 $last = '&nbsp;'; // nor the last page link
			}
			echo '<div class="content-box">';
			echo $first . $prev . "Showing page $pageNum of $maxPage pages " . $next . $last;
			echo '</div>';
		}

		// for now the form is set to expire after 7 days (60*60*24*7)
		protected function nonce($str='',$expires=604800){ // generates a secure nonce
			return md5(date('Y-m-d H:i',ceil(time()/$expires)*$expires).$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$str);
		}

		function __destruct()
		{
			//
		}
	}
	$contact = new Contact();
?>
