<?php
if($_GET["dest"] == "action") {
	action();
} else if($_GET["dest"] == "add") {
	add();
} else if($_GET["dest"] == "remove") {
	remove();
}

function action() {
	if(isset($_POST["filename"])) {
		if(isset($_FILES["img"])) {
			imagepng(imagecreatefromstring(file_get_contents($_FILES["img"]["tmp_name"])), 'staff_data/img/' . $_POST["filename"] . '.png');
		}

		ftruncate(fopen('staff_data/json/' . $_POST["filename"] . '.json', "r+"), 0);
		$data = array($_POST["proj_name"], $_POST["stud_name"], $_POST["proj_desc"]);
		file_put_contents('staff_data/json/' . $_POST["filename"] . '.json', json_encode($data, FILE_APPEND));
	}
}

function add() {
	include('../phputils.php');
	file_put_contents('staff_data/json/' . generateRandomString(8) . '.json', json_encode(array("","","")));
}

function remove() {
	if(file_exists('staff_data/img/' . $_POST["project"] . '.png')) {
		unlink('staff_data/img/' . $_POST["project"] . '.png');
	}
	unlink('staff_data/json/' . $_POST["project"] . '.json');
}
header("refresh:0; url=../admin/");
?>