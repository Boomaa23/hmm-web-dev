<?php include "../include/auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>
<!-- project viewer/form -->
<?php
	$file = $_GET["src"];
	$fileArray = json_decode(file_get_contents('../data/json/' . $file . '.json'));
	echo '<title>HMM Admin Editor | ' . $file .'</title>';
	echo '<form action="../data/data-action.php?dest=studentAction" method="post" enctype="multipart/form-data">

	<a>Student Name: </a><input type="text" name="stud_name" value="' . $fileArray[1] . '" required><br /><br />
	<a>Student Image Upload: </a><br /><input type="file" name="stud_img"></input><br /><br />';
	
	$tmp_disp = "";
	if(file_exists('../data/img/student/' . $file . '.png')) {
		echo '<a href="../data/img/student/' . $file . '.png" style="max-width:500px;">Current Student Image</a><br />';
	} else {
		echo 'No Student Image Found <br />';
	}
	
	echo '<br /><a>Project Description: <br />
	<textarea name="proj_desc" cols="70" rows="15" required>'
	. $fileArray[4]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>
	<br />
	<a>Student Description:</a><br />
	<textarea name="stud_desc" cols="70" rows="15" required>' . $fileArray[5]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>
	<br />
	<a>Student ID: </a><input width="20px" type="text" name="filename" value="' . $file . '" readonly><br />
	<input type="submit">
	</form><br />
	<a href="../admin/"><button>Back to admin browser</button></a>';
	include("../include/footer.html");
?>
</body>
</html>