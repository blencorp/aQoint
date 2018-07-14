<?php
	class Forms
	{
		function __construct()
		{
			//
		}

		protected $config = array (
			'pages' => array (
				'create' => "forms.php?q=create",
			),
		);

		public function create()
		{
			if ($this->nonce('create') == getNonceFromPost()) {
				echo '
					<div class="content-box-header">Generate Form</div>
					<div class="content-box">
				';

				$this->processFDF();

				echo '<br />';
				echo '<br />';
				echo '</div>';
			} else {
				require_once 'templates/forms.form.php';
			}
		}

		private function updateDB($contact_id, $note_file_name)
		{
			$note_file_desc = "W-2 Form";
			$note_user = "1";
			$note_file_type = "FDF";
			$note_type = "upload";
			$note_create_time = time();
			$note_create_ip = $_SERVER['REMOTE_ADDR'];
			$note_create_hostname = getHostbyAddr($note_create_ip);

			$sql = "INSERT INTO " . TBL_NOTES . " (";
			$sql .= "contact_id, note_type, note_file_name, note_file_type, note_file_desc, ";
			$sql .= "note_user, note_create_time, note_create_ip, note_create_hostname) ";
			$sql .= "VALUES('$contact_id','$note_type','$note_file_name','$note_file_type',";
			$sql .= "'$note_file_desc','$note_user','$note_create_time','$note_create_ip','$note_create_hostname')";

			//echo 'sql: ' . $sql . '<br />';
			$result = mysql_query($sql);

			if ($result) {
				echo '<br />Database entry updated.';
			} else {
				echo '<br />Failed to update database.';
			}

		}

		public function processFDF()
		{
	    if(isset($_POST) && is_array($_POST) && count($_POST)){
	        $data=array();

	        echo'<pre>POST '; print_r($_POST);echo '</pre>';

	        if(isset($_POST['e_a'])){
	            $data['e_a'] = $_POST['e_a'];
	            $data['e_b'] = $_POST['e_b'];
	            $data['e_c1'] = $_POST['e_c1'];
	            $data['e_c2'] = $_POST['e_c2'];
	            $data['e_c3'] = $_POST['e_c3'];
	            $data['e_c4'] = $_POST['e_c4'];
	            $data['e_c5'] = $_POST['e_c5'];
	            $data['e_c6'] = $_POST['e_c6'];
	            $data['e_d'] = $_POST['e_d'];
	            $data['e_e1'] = $_POST['e_e1'];
	            $data['e_e2'] = $_POST['e_e2'];
	            $data['e_e3'] = $_POST['e_e3'];
	            $data['e_e4'] = $_POST['e_e4'];
	            $data['e_f1'] = $_POST['e_f1'];
	            $data['e_f2'] = $_POST['e_f2'];
	            $data['e_f3'] = $_POST['e_f3'];
	            $data['e_f4'] = $_POST['e_f4'];
	            $data['e_f5'] = $_POST['e_f5'];
	            $data['e_1'] = $_POST['e_1'];
	            $data['e_2'] = $_POST['e_2'];
	            $data['e_3'] = $_POST['e_3'];
	            $data['e_4'] = $_POST['e_4'];
	            $data['e_5'] = $_POST['e_5'];
	            $data['e_6'] = $_POST['e_6'];
	            $data['e_7'] = $_POST['e_7'];
	            $data['e_8'] = $_POST['e_8'];
	            $data['e_9'] = $_POST['e_9'];
	            $data['e_10'] = $_POST['e_10'];
	            $data['e_11'] = $_POST['e_11'];
	            $data['e_15a'] = $_POST['e_15a'];
	            $data['e_15b'] = $_POST['e_15b'];
	            $data['e_16'] = $_POST['e_16'];
	            $data['e_17'] = $_POST['e_17'];
	            $data['e_18'] = $_POST['e_18'];
	            $data['e_19'] = $_POST['e_19'];
	            $data['e_20'] = $_POST['e_20'];

	            // file name will be <the current timestamp>.fdf
	            $fdf_file = 'contact_' . $_POST['contact_id'] . '_' . time() . '.fdf';

	            $fdf_dir = 'uploads';

	            $pdf_doc = 'http://esai.org/bcp/contactms/forms/w2-fed.pdf';

	            // generate the file content
	            $fdf_data = $this->createFDF($pdf_doc,$data);

	            // write the file out
	            if($fp=fopen($fdf_dir.'/'.$fdf_file,'w')){
	                fwrite($fp,$fdf_data,strlen($fdf_data));
	                echo $fdf_file,' written successfully.<br />';
	            }else{
	                die('Unable to create file: '.$fdf_dir.'/'.$fdf_file);
	            }
	            fclose($fp);

							$this->updateDB($_POST['contact_id'], $fdf_file);
	        }
	    }else{
	        echo 'You did not submit a form.';
	    }
		}

		public function createFDF($file, $info)
		{
			$data="%FDF-1.2\n%âãÏÓ\n1 0 obj\n<< \n/FDF << /Fields [ ";
			foreach($info as $field => $val){
				if(is_array($val)){
						$data.='<</T('.$field.')/V[';
						foreach($val as $opt)
							$data.='('.trim($opt).')';
						$data.=']>>';
				}else{
						$data.='<</T('.$field.')/V('.trim($val).')>>';
				}
			}
			$data.="] \n/F (".$file.") /ID [ <".md5(time()).">\n] >>".
					" \n>> \nendobj\ntrailer\n".
					"<<\n/Root 1 0 R \n\n>>\n%%EOF\n";
			return $data;
		}

		protected function nonce($str='',$expires=604800) {
			return md5(date('Y-m-d H:i',ceil(time()/$expires)*$expires).$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$str);
		}

		function __destruct()
		{
			//
		}
	}
	$forms = new Forms();
?>
