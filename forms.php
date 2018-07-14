<?php
	include 'includes/header.php';
	$action = isset($_GET['q']) ? $_GET['q'] : NULL;

	if ($action == "create") {
		$forms->create();
	} elseif ($action == "all") {
		$forms->showall();
	} else {
		$forms->create();
	}

	include 'includes/footer.php';
?>
