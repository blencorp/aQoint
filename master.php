<?php
	date_default_timezone_set('America/New_York');
	include("common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Contacts</title>

	<link rel="stylesheet" type="text/css" media="all" href="css/masterpage.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/containers.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/forms.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/lists.css" />

</head>
<body>
<div id="wrapper">
	<div id="container">
		<div id="header">
			<img src="images/logo.jpg" border="0" alt="Logo" />
		</div>

		<div id="navbar">
			<ul id="navbar">
				<li><a href="index.php">Welcome</a></li>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="contacts.php">Contacts</a></li>
				<li><a href="search.php">Search</a></li>
				<!--
				<li><a href="tasks.php">Tasks</a></li>
				-->
				<li><a href="appointments.php">Appointments</a></li>
			</ul>
		</div>

		<div id="inner-container">

			<div id="content">
				<div class="content-box-header">Welcome</div>
				<div class="content-box">
					<p>This is the master page for the site.</p>
				</div>

			</div>
		</div>

		<div id="footer">
			<div id="copyright">
				Copyright &copy; 2009 Blen Corp.
				<?php
					//include("lib/tracker.class.php");
					//$Tracker->Collect();
				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
