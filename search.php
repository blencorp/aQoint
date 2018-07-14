<?php
	include("includes/header.php");
	$action = isset($_GET['q']) ? $_GET['q'] : NULL;

	if ($action == "process") {
		$search->process();
	} else {
		$search->process();
	}

	include("includes/footer.php");
?>
