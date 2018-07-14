<?php
	class Notes
	{
		function __construct()
		{
			//
		}

		protected $config = array (
			'pages' => array (
				'create' => "notes.php?q=create",
				'edit' => "notes.php?q=edit",
				'delete' => "notes.php?q=delete",
				'more' => "notes.php?q=create",
				'approve' => "notes.php?q=approve",
				'view' => "notes.php?q=view",
				'list' => "notes.php?q=all",
			),
		);

		public function delete()
		{
			$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			if ($id == '') {
				die('You did not provide an id for this function: Notes->delete()');
			}
			$sql = "DELETE FROM " . TBL_NOTES . " WHERE note_id = '$id'";
			$result = mysql_query($sql);
			echo '<div class="content-box">';
			if ($result) {
				echo 'Item #' . $id . ' has been deleted.<br />';
			} else {
				echo 'Error: could not delete item #' . $id . '.<br />';
			}
			echo '</div>';
		}

		public function showcount()
		{
			$sql = "SELECT COUNT(note_id) AS numrows FROM " . TBL_NOTES . "";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$num = $row['numrows'];
			return $num;
			//echo 'num: ' . $num;
		}

		public function create()
		{
			$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			if ($id == '') {
				die('You did not provide an id for this function: Notes->create()');
			}
			if ($this->nonce('create') == $_POST['nonce']) {
				$contact_id = $_POST['contact_id'];
				$note_user = "1";
				$note_text = htmlentities($_POST['note_text']);
				$note_create_time = time();
				$note_create_ip = $_SERVER['REMOTE_ADDR'];
				$note_create_hostname = getHostByAddr($note_create_ip);
				$sql = "INSERT INTO " . TBL_NOTES . " (contact_id, note_user, note_text, note_create_time, note_create_ip, note_create_hostname) ";
				$sql .= "VALUES('$contact_id','$note_user','$note_text','$note_create_time','$note_create_ip','$note_create_hostname')";
				//echo 'sql: ' . $sql . '<br />';
				$result = mysql_query($sql);
				include("templates/note.create.php");
			} else {
				$return = $this->query($id);
				$row = mysql_fetch_assoc($return);
				include("templates/note.create.php");
			}
		}

		public function picker()
		{
			$sql = "SELECT * FROM " . TBL_CONTACTS . "";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
				echo '<option class="textfield" value="'.$row['contact_id'].'">';
				echo $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname'];
				echo '</option>';
				//echo '<input class="textfield" name="contact_id" value="'.$contact->getbyname($row['contact_id']).'" />';
			}
		}

		public function edit($id = '')
		{
			if ($id == '') {
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			}
			if ($id == '') {
				die('You did not provide an id for this function: Notes->edit($id = \'\')');
			}
			if ($this->nonce('edit') == $_POST['nonce']) {
				$contact_id = $_POST['contact_id'];
				$note_id = $_POST['note_id'];
				$note_text = htmlentities($_POST['note_text']);
				$note_edit_time = time();
				$note_edit_ip = $_SERVER['REMOTE_ADDR'];
				$note_edit_hostname = getHostByAddr($note_edit_ip);

				$sql = "UPDATE " . TBL_NOTES . " SET
								contact_id = '$contact_id',
								note_text = '$note_text',
								note_edit_time = '$note_edit_time',
								note_edit_ip = '$note_edit_ip',
								note_edit_hostname = '$note_edit_hostname'
								WHERE note_id = '$note_id'";
				//echo 'sql: ' . $sql . '<br />';
				$result = mysql_query($sql) or die(mysql_error());
				if ($result) {
					echo 'Database updated.';
				} else {
					echo 'Failed to update database.';
				}
			} else {
				$contact = new Contact();

				$return = $this->query($id);
				$row = mysql_fetch_assoc($return);
				include("templates/note.edit.form.php");
			}
		}

		public function query($id = '') {
			if ($id == '') {
				$sql = "SELECT * FROM " . TBL_NOTES . "";
			} else {
				$sql = "SELECT * FROM " . TBL_NOTES . " WHERE note_id = '$id'";
			}
			//echo 'id: ' . $id . '<br />';
			//echo 'sql: ' . $sql . '<br />';
			$result = mysql_query($sql) or die(mysql_error());
			//$row = mysql_fetch_assoc($result);
			//echo 'id: ' . $row['note_id'];
			return $result;
		}

		public function search()
		{
			if ($this->nonce('search') == $_POST['nonce']) {
				echo 'good.';
			} else {
				include("templates/contact.search.php");
			}
		}

		public function cp_main($id = '')
		{
			if ($id == '') {
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			}
			if ($id == '') {
				die('You did not provide an id for this function: Notes->cp_main($id = \'\')');
			}
			echo '
				<br />
				<div class="content-box">
					<a href="' . $this->config['pages']['edit'] . '&id=' . $id . '">Edit this entry</a>
					|
					<a href="' . $this->config['pages']['delete'] . '&id=' . $id . '">Delete this entry</a>
				</div>
			';
		}

		public function showbyid($id = '')
		{
			if ($id == '') {
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
			}
			if ($id == '') {
				die('You did not provide an id for this function: Notes->showbyid($id = \'\')');
			}
			$result = $this->query($id);
			$row = mysql_fetch_assoc($result);
			//echo 'id: ' . $row['id'] . '<br />';
			$contact = new Contact();
			include("templates/note.view.php");
			$this->cp_main($id);
		}

		public function showall()
		{
			// instatiate contact so we can call its member functions
			$contact = new Contact();

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

			$sql = "SELECT * FROM " . TBL_NOTES . " ORDER BY note_id DESC LIMIT $offset, $rowsPerPage";
			$result = mysql_query($sql) or die('Error, query failed');

			echo '
				<div class="content-box-header">Notes</div>
				<div class="content-box">
				<table width="100%">
					<tr>
						<th>ID</th>
						<th>Client</th>
						<th>Create Date</th>
						<th>Edit Date</th>
					</tr>
			';
			while($row = mysql_fetch_array($result))
			{
				$id = $row['note_id'];
				echo '
					<tr>
						<td><a href="' . $this->config['pages']['view'] . '&id=' . $id . '">' . $row['note_id'] . '</a></td>
						<td>' . $contact->getbyname($row['contact_id']) . '</td>
						<td>' . date("m/d/Y", $row['note_create_time']) . '</td>
						<td>' . date("m/d/Y", $row['note_edit_time']) . '</td>
					</tr>
				';
				//include("templates/contact.showall.php");
			}
			echo '
					</table>
				</div>
			';

			// how many rows we have in database
			$sql   = "SELECT COUNT(contact_id) AS numrows FROM " . TBL_NOTES . "";
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
			echo $first . $prev . "Showing page $pageNum of $maxPage pages " . $next . $last;
		}

		protected function nonce($str='',$expires=9900){ // generates a secure nonce
			return md5(date('Y-m-d H:i',ceil(time()/$expires)*$expires).$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$str);
		}

		function __destruct()
		{
			//
		}
	}
	$note = new Notes();
?>
