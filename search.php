<?php
	include("includes/header.php");
	$action = $_GET['q'];

	if ($action == "process") {
		$search->process();
	} else {
		$search->process();
	}

	include("includes/footer.php");
?>
