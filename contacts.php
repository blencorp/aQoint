<?php
	include("includes/header.php");
	$action = isset($_GET['q']) ? $_GET['q'] : NULL;
	$id = isset($_GET['id']) ? $_GET['id'] : NULL;
    if(!$id && isset($_POST['contact_id'])) {
        $id = $_POST['contact_id'];
        $_GET['id'] = $id;
    }
	if ($action == 'create') {
		$contact->create();
	} elseif ($action == 'search') {
		$contact->search();
	} elseif ($action == 'all') {
		$contact->showall();
	} elseif ($action == 'upload') {
		$contact->upload();
	} elseif ($action == 'note') {
		$contact->note();
	} elseif ($action == 'view') {
		if ($id == '') {
			echo 'You did not select an id.';
		} else {
			$contact->showbyid();
		}
	} elseif ($action == 'edit') {
		if ($id == '') {
			echo 'You did not select an id.';
		} else {
			$contact->edit();
		}
	} else {
		$contact->search();
	}

	include("includes/footer.php");
?>
