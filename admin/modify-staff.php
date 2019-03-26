<?php include "../include/auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
</head>
<body>
<!-- project viewer/form -->
<?php
	$file = $_GET["src"];
	$fileArray = json_decode(file_get_contents('../data/staff/json/' . $file . '.json'));
	echo '<title>HMM Staff Editor | ' . $file .'</title>';
	echo '<form action="../data/data-action.php?dest=staffAction" method="post" enctype="multipart/form-data">

	<a>Staff Name: </a><input type="text" name="staff_name" value="' . $fileArray[0] . '" required><br />
	<a>Staff ID: </a><input width="20px" type="text" name="filename" value="' . $file . '" readonly><br /><br />
	<a>Staff Image Upload: </a><br /><input type="file" name="staff_img"></input><br /><br />';

	$tmp_disp = "";
	if(file_exists('../data/staff/img/' . $file . '.png')) {
		echo '<a href="../data/staff/img/' . $file . '.png" style="max-width:500px;">Current Staff Image</a><br />';
	} else {
		echo 'No Staff Image Found <br />';
	}

	echo '<br /><a>Staff Description:</a><br />
	<textarea name="staff_desc" cols="70" rows="15" required>' . $fileArray[2]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>
	<br />
	<a>Linked Project(s)</a><br />';

	$projects = glob("../data/project/json/*.json", GLOB_BRACE);
	foreach($projects as $project) {
		$staffArray = json_decode(file_get_contents('../data/staff/json/' . $file . '.json'));
		$projectArray = json_decode(file_get_contents($project));
		if(in_array(trim(basename($project, ".json")), $staffArray[3])) {
			echo '<input type="checkbox" name="linked[]" value="' . basename($project, ".json") . '" checked>' . basename($project, ".json") . ' - ' . $projectArray[0] . '<br />';
		} else {
			echo '<input type="checkbox" name="linked[]" value="' . basename($project, ".json") . '">' . basename($project, ".json") . ' - ' . $projectArray[0] . '<br />';
		}
	}
	echo '<input type="checkbox" name="linked[]" value="none">None<br /><br />';

	echo '<input type="submit">
	</form><br />
	<a href="../admin/"><button>Back to admin browser</button></a>';
	include("../include/footer.html");
?>
</body>
</html>
