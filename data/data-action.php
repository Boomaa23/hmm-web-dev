<?php
require '../utils/markdown-extended/src/bootstrap.php';
use \MarkdownExtended\MarkdownExtended;

switch($_GET["dest"]) {
	case ("projectAction"): projectAction(); break;
	case ("projectAdd"): projectAdd(); break;
	case ("projectRemove"): projectRemove(); break;

	case ("staffAction"): staffAction(); break;
	case ("staffAdd"): staffAdd(); break;
	case ("staffRemove"): staffRemove(); break;

	case ("newsAction"): newsAction(); break;
	case ("newsAdd"): newsAdd(); break;
	case ("newsRemove"): newsRemove(); break;
}

function projectAction() {
	if($_FILES["proj_img"]["tmp_name"] != null) {
		imagepng(imagecreatefromstring(file_get_contents($_FILES["proj_img"]["tmp_name"])), 'project/img/' . $_POST["filename"] . '.png');
	}

	$linked = array();
	if(!isset($_POST["linked"]) || in_array("none", $_POST["linked"])) {
		$linked = array("");
	} else {
		$linked = $_POST["linked"];
	}
	$fn = 'project/json/' . $_POST["filename"] . '.json';
	$data = array($_POST["proj_name"], MarkdownExtended::parse($_POST["proj_desc"])->getContent(), $_POST["proj_desc"], $linked);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data, FILE_APPEND));
}

function projectAdd() {
	include("../utils/phputils.php");
	$rand = generateRandomString(8);
	$filename = 'project/json/' . $rand . '.json';
	file_put_contents($filename, json_encode(array("","","",array(""))));
	chmod($filename, 0755);
	mkdir('project/web/' . $rand . '/');
	copy('project/templates/index.php', 'project/web/' . $rand . '/index.php');
}

function projectRemove() {
		include("../utils/phputils.php");
		$jsons = array(""); $pngs = array("");
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
	removeDirectory("project/web");
}

function staffAction() {
	if($_FILES["staff_img"]["tmp_name"] != null) {
		imagepng(imagecreatefromstring(file_get_contents($_FILES["staff_img"]["tmp_name"])), 'staff/img/' . $_POST["filename"] . '.png');
	}
	$fn = 'staff/json/' . $_POST["filename"] . '.json';
	$data = array($_POST["staff_name"], MarkdownExtended::parse($_POST["staff_desc"])->getContent(), $_POST["staff_desc"], $_POST["group"]);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data), FILE_APPEND);
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

function newsAction() {
	$fn = 'news/' . $_POST["filename"] . '.json';
	$data = array($_POST["article_name"], $_POST["author"], MarkdownExtended::parse($_POST["article_desc"])->getContent(), $_POST["article_desc"]);
	ftruncate(fopen($fn, "r+"), 0);
	file_put_contents($fn, json_encode($data, FILE_APPEND));
}

function newsAdd() {
	include("../utils/phputils.php");
	$filename = 'news/' . round(microtime(true) * 1000) . '.json';
	file_put_contents($filename, json_encode(array("","","","")));
	chmod($filename, 0755);
}

function newsRemove() {
	if($_POST["article"] === "all") {
		$jsons = glob("news/*.json", GLOB_BRACE);
		foreach($jsons as $json) {
			unlink($json);
		}
	} else {
		$json = 'news/' . $_POST["article"] . '.json';
		if(file_exists($json)) {
			unlink($json);
		}
	}
}

echo '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">';
header("refresh:0; url=../admin/");
?>
