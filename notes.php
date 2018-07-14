<?php
	include("includes/header.php");
	$action = $_GET['q'];
	$id = isset($_GET['id']) ? $_GET['id'] : NULL;
    if(!$id && isset($_POST['note_id'])) {
        $id = $_POST['note_id'];
        $_GET['id'] = $id;
    }

	if ($action == 'create') {
		$note->create();
	} elseif ($action == 'search') {
		$note->search();
	} elseif ($action == 'all') {
		$note->showall();
	} elseif ($action == 'upload') {
		$note->upload();
	} elseif ($action == 'view') {
		if ($id = '') {
			echo 'You did not select an id.';
		} else {
			$note->showbyid();
		}
	} elseif ($action == 'edit') {
		if ($id = '') {
			echo 'You did not select an id.';
		} else {
			$note->edit();
		}
	} elseif ($action == 'delete') {
		$note->delete();
	} else {
		//include("templates/contact.search.byname.php");
		//include("templates/note.main.php");
		$note->showall();
	}
	include("includes/footer.php");
?>
