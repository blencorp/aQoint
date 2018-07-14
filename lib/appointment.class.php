<?php
	class Appointment
	{
		var $table_notes = "notes";
		var $table_contacts = "contacts";
		var $table_app = "apps";

		protected $config = array (
			'pages' => array (
				'create' => "appointments.php?q=create",
			),
		);

		function __construct()
		{
			//
		}

		public function showall()
		{
			$sql = "SELECT * FROM $this->table_app";
			$result = mysql_query($sql);
			require 'templates/appointment.viewall.php';
		}

		public function create()
		{
			if ($this->nonce('create') == getNonceFromPost()) {
				$app_fname = $_POST['app_fname'];
				$app_lname = $_POST['app_lname'];
				$app_phone = $_POST['app_phone'];
				$app_email = $_POST['app_email'];
				$app_reason = isset($_POST['app_details']) ? htmlentities($_POST['app_details']) : '';
				$app_user = "1";
				$app_type = "appointment";
				$app_create_time = time();
				$app_create_ip = $_SERVER['REMOTE_ADDR'];
				$app_create_hostname = getHostByAddr($app_create_ip);

				if ($app_fname == '' || $app_lname == '' || $app_phone == '') {
					echo '
						You must enter first name, last name, and phone number. <br />
						Please go back and try again.
					';
					die();
				}

				require_once 'templates/appointment.process.php';
				require_once 'templates/appointment.success.php';

				if ($result) {
					$this->sendemail($app_fname, $app_lname, $app_phone, $app_email, $app_reason);
				}

			} else {
				require_once 'templates/appointment.form.php';
			}
		}

		private function sendemail($app_fname, $app_lname, $app_phone, $app_email, $app_reason)
		{
			$to = 'henokmikre@gmail.com';
			$from = 'mike.endale@gmail.com';
			$subject = 'ContactMS: Appointment Created';
			$message = '
				An appointment was created from ContactMS site with the following information: ' . "\r\n" . '
				First Name: ' . $app_fname . "\r\n" . '
				Last Name: ' . $app_lname . "\r\n" . '
				Phone: ' . $app_phone . "\r\n" . '
				Email: ' . $app_email . "\r\n" . '
				Reason: ' . $app_reason . "\r\n" . '
			';
			$headers = 'From: ' . $from . "\r\n" .
									'Reply-To: ' . $from . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
			if (mail($to, $subject, $message, $headers)) {
				echo 'Message sent.';
			} else {
				echo 'Failed to send message.';
			}
		}

		protected function nonce($str='',$expires=604800) {
			return md5(date('Y-m-d H:i',ceil(time()/$expires)*$expires).$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$str);
		}

		function __destruct()
		{
			//
		}
	}
	$appointment = new Appointment();
?>
