<?php

require '../utils/markdown-extended/src/bootstrap.php';
use \MarkdownExtended\MarkdownExtended;


if($_GET["dest"] == "projectAction") {
	projectAction();
} else if($_GET["dest"] == "projectAdd") {
	projectAdd();
} else if($_GET["dest"] == "projectRemove") {
	projectRemove();
} else if($_GET["dest"] == "studentAction") {
	studentAction();
} else if($_GET["dest"] == "studentAdd") {
	studentAdd();
} else if($_GET["dest"] == "studentRemove") {
	studentRemove();
} else {
	die("No request recieved");
}

function projectAction() {
	if(isset($_POST["filename"]) && isset($_FILES["proj_img"])) {
		imagepng(imagecreatefromstring(file_get_contents($_FILES["proj_img"]["tmp_name"])), '../data/project/img/' . $_POST["filename"] . '.png');
	}

	$fn = '../data/project/json/' . $_POST["filename"] . '.json';
	$data = array($_POST["proj_name"], MarkdownExtended::parse($_POST["proj_desc"])->getContent(), $_POST["proj_desc"], json_decode(file_get_contents($fn))[3]);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data, FILE_APPEND));
}

function projectAdd() {
	include("../phputils.php");
	$filename = '../data/project/json/' . generateRandomString(8) . '.json';
	file_put_contents($filename, json_encode(array("","","","")));
	chmod($filename, 0755);
}

function projectRemove() {
	if($_POST["project"] === "all") {
		$projects = glob("../data/project/json/*.json", GLOB_BRACE);
		foreach($projects as $file) {
			unlink($file);
		}
	} else {
		$png = '../data/project/img/' . $_POST["project"] . '.png';
		$json = '../data/project/json/' . $_POST["project"] . '.json';
		if(file_exists($png)) {
			unlink($png);
		}
		if(file_exists($json)) {
			unlink($json);
		}
	}
}

function studentAction() {
	if(isset($_POST["filename"]) && isset($_FILES["stud_img"])) {
		imagepng(imagecreatefromstring(file_get_contents($_FILES["stud_img"]["tmp_name"])), '../data/student/img/' . $_POST["filename"] . '.png');
	}

	$fn = '../data/student/json/' . $_POST["filename"] . '.json';
	$data = array($_POST["stud_name"], MarkdownExtended::parse($_POST["stud_desc"])->getContent(), $_POST["stud_desc"], json_decode(file_get_contents($fn))[3]);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data, FILE_APPEND));
}

function studentAdd() {
	include("../phputils.php");
	$filename = '../data/student/json/' . generateRandomString(8) . '.json';
	file_put_contents($filename, json_encode(array("","","","")));
	chmod($filename, 0755);
}

function studentRemove() {
	if($_POST["student"] === "all") {
		$students = glob("../data/student/json/*.json", GLOB_BRACE);
		foreach($students as $file) {
			unlink($file);
		}
	} else {
		$png = '../data/student/img/' . $_POST["student"] . '.png';
		$json = '../data/student/json/' . $_POST["student"] . '.json';
		if(file_exists($png)) {
			unlink($png);
		}
		if(file_exists($json)) {
			unlink($json);
		}
	}
}
echo '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">';
header("refresh:0; url=../admin/");
?>