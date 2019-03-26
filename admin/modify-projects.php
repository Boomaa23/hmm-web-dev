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
	$fileArray = json_decode(file_get_contents('../data/project/json/' . $file . '.json'));
	echo '<title>HMM Project Editor | ' . $file .'</title>';
	echo '<form action="../data/data-action.php?dest=projectAction" method="post" enctype="multipart/form-data">
	
	<a>Project Name: </a><input type="text" name="proj_name" value="' . $fileArray[0] . '" required><br />
	
	<a>Project Image Upload: </a><br /><input type="file" name="proj_img"></input><br /><br />';

	$tmp_disp = "";
	if(file_exists('../data/project/img/' . $file . '.png')) {
		echo '<a href="../data/project/img/' . $file . '.png" style="max-width:500px;">Current Project Image</a><br />';
	} else {
		echo 'No Project Image Found <br />';
	}
	
	echo '<br /><a>Project Description: <br />
	<textarea name="proj_desc" cols="70" rows="15" required>'
	. $fileArray[2]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>	
	<br /><a>Linked Project(s)</a><br />';
	
	$staff = glob("../data/staff/json/*.json", GLOB_BRACE);
	foreach($staff as $person) {
		$personArray = json_decode(file_get_contents($person));
		$projectArray = json_decode(file_get_contents('../data/project/json/' . $file . '.json'));
		if(in_array(trim(basename($person, ".json")), $projectArray[3])) {
			echo '<input type="checkbox" name="linked[]" value="' . basename($person, ".json") . '" checked>' . basename($person, ".json") . ' - ' . $personArray[0] . '<br />';
		} else {
			echo '<input type="checkbox" name="linked[]" value="' . basename($person, ".json") . '">' . basename($person, ".json") . ' - ' . $personArray[0] . '<br />';
		}
	}
	echo '<input type="checkbox" name="linked[]" value="none">None<br /><br />';
	
	echo '<a>Project ID: </a><input width="20px" type="text" name="filename" value="' . $file . '" readonly><br />
	<input type="submit"></form><br />
	<a href="../admin/"><button>Back to admin browser</button></a>';
	include("../include/footer.html");
?>
</body>
</html>