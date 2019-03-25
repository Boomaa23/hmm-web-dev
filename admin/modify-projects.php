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
	echo '<title>HMM Project Editor | ' . $file .'</title>';
	echo '<form action="../data/data-action.php?dest=studentAction" method="post" enctype="multipart/form-data">
	
	<a>Project Name: </a><input type="text" name="proj_name" value="' . $fileArray[0] . '" required><br />
	
	<a>Project Image Upload: </a><br /><input type="file" name="proj_img"></input><br /><br />';

	$tmp_disp = "";
	if(file_exists('../data/img/project/' . $file . '.png')) {
		echo '<a href="../data/img/project/' . $file . '.png" style="max-width:500px;">Current Project Image</a><br />';
	} else {
		echo 'No Project Image Found <br />';
	}
	
	echo '<br /><a>Project Description: <br />
	<textarea name="proj_desc" cols="70" rows="15" required>'
	. $fileArray[4]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>	
	</form><br />
	<a href="../admin/"><button>Back to admin browser</button></a>';
	include("../include/footer.html");
?>
</body>
</html>