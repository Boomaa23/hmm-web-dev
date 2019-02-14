<?php
	if(isset($_POST["filename"])) {
		if(isset($_FILES["img"])) {
			imagepng(imagecreatefromstring(file_get_contents($_FILES["img"]["tmp_name"])), 'staff_data/img/' . $_POST["filename"] . '.png');
		}

		ftruncate(fopen('staff_data/json/' . $_POST["filename"] . '.json', "r+"), 0);
		$data = array($_POST["proj_name"], $_POST["stud_name"], $_POST["proj_desc"]);
		file_put_contents('staff_data/json/' . $_POST["filename"] . '.json', json_encode($data, FILE_APPEND));
	}
	header("refresh:0; url=../admin/");
?>