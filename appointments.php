<?php
	include("includes/header.php");
	$action = $_GET['q'];

	if ($action == "create") {
		$appointment->create();
	} elseif ($action == "all") {
		$appointment->showall();
	} else {
		$appointment->create();
	}

	include("includes/footer.php");
?>
