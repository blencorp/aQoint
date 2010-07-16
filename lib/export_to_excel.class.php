<?php
	class export_to_excel
	{
		var $table_contacts = "contacts";

		function __construct() 
		{
			// do nothing
		}
		
		private function getdata()
		{
			$sql = "SELECT * FROM $this->table_contacts";
			$result = mysql_query($sql);
			return $result;
		}

		public function doexport()
		{
			$contents = "ID \t First Name \t Middle Name \t Last Name \t Email \t Phone \t City \t State \t Country \t SSN \t DOB \t EIN \t \n";

			$result = $this->getdata();
			while ($row = mysql_fetch_array($result)) {
				$contents .= $row['contact_id'] . " \t " . $row['contact_fname'] . " \t " . $row['contact_mname'] . " \t ";
				$contents .= $row['contact_lname'] . " \t " . $row['contact_email'] . " \t ";
				$contents .= $row['contact_phone'] . " \t " . $row['contact_city'] . " \t "; 
				$contents .= $row['contact_state'] . " \t " . $row['contact_country'] . " \t ";
				$contents .= $row['contact_ssn'] . " \t " . $row['contact_dob'] . " \t " . $row['contact_ein'] . " \t \n"; 
			}
			$filename = "contacts.xls";
			//$contents = "testdata1 \t testdata2 \t testdata3 \t \n";
			header("Content-Disposition: attachment; filename=\"$filename\"");
			//header("Content-Disposition: attachment; filename=\"report.xls\"");
			header("Content-Type: application/vnd.ms-excel");
			echo $contents;
		}

		function __destruct()
		{
			// do nothing
		}
	}
	$export = new export_to_excel();
?>
