<?php
	class Search 
	{
		var $table_notes = "notes";
		var $table_contacts = "contacts";
		var $table_app = "apps";

		protected $config = array (
			'pages' => array (
				'new' => "search.php",
				'process' => "search.php?q=process",
			),
		);

		function __construct()
		{
			//
		}

		public function cp_search()
		{
			echo '
				<div class="content-box">
					<a href="'.$this->config['pages']['new'].'">New Search</a>
					 | 
					<a href="javascript:history.go(-1)">Go back and try again</a>
				</div>
			';
		}

		public function process()
		{
			if ($this->nonce('process') == $_POST['nonce']) {
				$search_fname = $_POST['search_fname'];
				$search_lname = $_POST['search_lname'];
				$search_phone = $_POST['search_phone'];
				$search_email = $_POST['search_email'];

				if ($search_fname == '' && $search_lname == '' && $search_phone == '' && $search_email == '') {
					echo 'You must at least specify ONE field.';
					die();
				}

				require_once 'templates/search.process.php';
			} else {
				require_once 'templates/search.form.php';
			}
		}

		protected function nonce($str='',$expires=604800) {
			return md5(date('Y-m-d H:i',ceil(time()/$expires)*$expires).$_SERVER['REMOTE_ADDR'].$SERVER['HTTP_USER_AGENT'].$str);
		}

		function __destruct()
		{
			//
		}
	}
	$search = new Search();
?>
