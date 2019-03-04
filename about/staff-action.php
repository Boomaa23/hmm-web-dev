<?php

require '../utils/markdown-extended/src/bootstrap.php';
use \MarkdownExtended\MarkdownExtended;


if($_GET["dest"] == "action") {
	action();
} else if($_GET["dest"] == "add") {
	add();
} else if($_GET["dest"] == "remove") {
	remove();
}

function action() {
	if(isset($_POST["filename"])) {
		if(isset($_FILES["stud_img"])) {
			imagepng(imagecreatefromstring(file_get_contents($_FILES["stud_img"]["tmp_name"])), '../data/img/student/' . $_POST["filename"] . '.png');
		}
		
		if(isset($_FILES["proj_img"])) {
			imagepng(imagecreatefromstring(file_get_contents($_FILES["proj_img"]["tmp_name"])), '../data/img/project/' . $_POST["filename"] . '.png');
		}

	ftruncate(fopen('../data/json/' . $_POST["filename"] . '.json', "r+"), 0);
	$data = array($_POST["proj_name"], $_POST["stud_name"], MarkdownExtended::parse($_POST["proj_desc"])->getContent(), MarkdownExtended::parseString($_POST["stud_desc"])->getContent(), $_POST["proj_desc"], $_POST["stud_desc"]);
	file_put_contents('../data/json/' . $_POST["filename"] . '.json', json_encode($data, FILE_APPEND));
	}
}

function add() {
	include("../phputils.php");
	file_put_contents('../data/json/' . generateRandomString(8) . '.json', json_encode(array("","","","","","")));
}

function remove() {
	if(file_exists('../data/img/project/' . $_POST["project"] . '.png')) {
		unlink('../data/img/project/' . $_POST["project"] . '.png');
	}
	
	if(file_exists('../data/img/student/' . $_POST["project"] . '.png')) {
		unlink('../data/img/student/' . $_POST["project"] . '.png');
	}
	
	unlink('../data/json/' . $_POST["project"] . '.json');
}
echo '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">';
header("refresh:0; url=../admin/");
?>