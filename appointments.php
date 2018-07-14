<?php
	include("includes/header.php");
	$action = isset($_GET['q']) ? $_GET['q'] : NULL;

	if ($action == "create") {
		$appointment->create();
	} elseif ($action == "all") {
		$appointment->showall();
	} else {
		$appointment->create();
	}

	include("includes/footer.php");
?>
