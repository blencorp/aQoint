<?php
	include 'includes/header.php';
	$action = $_GET['q'];

	if ($action == "create") {
		$forms->create();
	} elseif ($action == "all") {
		$forms->showall();
	} else {
		$forms->create();
	}

	include 'includes/footer.php';
?>
