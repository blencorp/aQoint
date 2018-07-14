<?php
	include("includes/header.php");
	$action = $_GET['q'];
	$id = $_GET['id'];
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
