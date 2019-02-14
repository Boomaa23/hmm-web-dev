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
		if(isset($_FILES["img"]) && isset($_POST["img_type"])) {
			if($_POST["img_type"] == "student") {
				$dir = "student/";
			} else if($_POST["img_type"] == "project") {
				$dir = "project/";
			} else if($_POST["img_type"] == "none") {
				$dir = "";
			}
			if($dir != "") {
				imagepng(imagecreatefromstring(file_get_contents($_FILES["img"]["tmp_name"])), 'staff-data/img/' . $dir . $_POST["filename"] . '.png');
			}
		}

		ftruncate(fopen('staff-data/json/' . $_POST["filename"] . '.json', "r+"), 0);
		$data = array($_POST["proj_name"], $_POST["stud_name"], $_POST["proj_desc"], $_POST["stud_desc"]);
		file_put_contents('staff-data/json/' . $_POST["filename"] . '.json', json_encode($data, FILE_APPEND));
	}
}

function add() {
	include('../phputils.php');
	file_put_contents('staff-data/json/' . generateRandomString(8) . '.json', json_encode(array("","","","")));
}

function remove() {
	if(file_exists('staff-data/img/project/' . $_POST["project"] . '.png')) {
		unlink('staff-data/img/project/' . $_POST["project"] . '.png');
	}
	
	if(file_exists('staff-data/img/student/' . $_POST["project"] . '.png')) {
		unlink('staff-data/img/student/' . $_POST["project"] . '.png');
	}
	
	unlink('staff-data/json/' . $_POST["project"] . '.json');
}
echo '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">';
header("refresh:0; url=../admin/");
?>