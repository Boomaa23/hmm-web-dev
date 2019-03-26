<?php

require '../utils/markdown-extended/src/bootstrap.php';
use \MarkdownExtended\MarkdownExtended;


if($_GET["dest"] == "projectAction") {
	projectAction();
} else if($_GET["dest"] == "projectAdd") {
	projectAdd();
} else if($_GET["dest"] == "projectRemove") {
	projectRemove();
} else if($_GET["dest"] == "staffAction") {
	staffAction();
} else if($_GET["dest"] == "staffAdd") {
	staffAdd();
} else if($_GET["dest"] == "staffRemove") {
	staffRemove();
} else {
	die("No request recieved");
}

function projectAction() {
	if($_FILES["proj_img"]) {
		imagepng(imagecreatefromstring(file_get_contents($_FILES["proj_img"]["tmp_name"])), 'project/img/' . $_POST["filename"] . '.png');
	}

	$linked = $_POST["linked"];
	if(in_array("none", $_POST["linked"]) || !isset($_POST["linked"])) {
		$linked = array("");
	}
	$fn = 'project/json/' . $_POST["filename"] . '.json';
	$data = array($_POST["proj_name"], MarkdownExtended::parse($_POST["proj_desc"])->getContent(), $_POST["proj_desc"], $linked);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data, FILE_APPEND));
}

function projectAdd() {
	include("../utils/phputils.php");
	$filename = 'project/json/' . generateRandomString(8) . '.json';
	file_put_contents($filename, json_encode(array("","","","")));
	chmod($filename, 0755);
}

function projectRemove() {
	if($_POST["project"] === "all") {
		$jsons = glob("project/json/*.json", GLOB_BRACE);
		$pngs = glob("project/img/*.png", GLOB_BRACE);
		foreach($jsons as $json) {
			unlink($json);
		}
		foreach($pngs as $png) {
			unlink($png);
		}
	} else {
		$png = 'project/img/' . $_POST["project"] . '.png';
		$json = 'project/json/' . $_POST["project"] . '.json';
		if(file_exists($png)) {
			unlink($png);
		}
		if(file_exists($json)) {
			unlink($json);
		}
	}
}

function staffAction() {
	if($_FILES["staff_img"]) {
		imagepng(imagecreatefromstring(file_get_contents($_FILES["staff_img"]["tmp_name"])), '/staff/img/' . $_POST["filename"] . '.png');
	}

	$fn = 'staff/json/' . $_POST["filename"] . '.json';
	$linked = $_POST["linked"];
	if(in_array("none", $_POST["linked"]) || !isset($_POST["linked"])) {
		$linked = array("");
	}
	$data = array($_POST["staff_name"], MarkdownExtended::parse($_POST["staff_desc"])->getContent(), $_POST["staff_desc"], $linked);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data, FILE_APPEND));
}

function staffAdd() {
	include("../utils/phputils.php");
	$filename = 'staff/json/' . generateRandomString(8) . '.json';
	file_put_contents($filename, json_encode(array("","","","")));
	chmod($filename, 0755);
}

function staffRemove() {
	if($_POST["staff"] === "all") {
		$jsons = glob("staff/json/*.json", GLOB_BRACE);
		$pngs = glob("staff/img/*.png", GLOB_BRACE);
		foreach($jsons as $json) {
			unlink($json);
		}
		foreach($pngs as $png) {
			unlink($png);
		}
	} else {
		$png = 'staff/img/' . $_POST["staff"] . '.png';
		$json = 'staff/json/' . $_POST["staff"] . '.json';
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