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
	$fileArray = json_decode(file_get_contents('../data/news/' . $file . '.json'));
	echo '<title>HMM News Editor | ' . $file .'</title>';
	echo '<form action="../data/data-action.php?dest=newsAction" method="post" enctype="multipart/form-data">

	<a>News Article Name: </a><input type="text" name="article_name" value="' . $fileArray[0] . '" required><br />
	<a>Author: </a><input type="text" name="author" value="' . $fileArray[1] . '" required><br />';

	echo '<br /><a>News Article Description:</a><br />
	<textarea name="article_desc" cols="70" rows="15" required>' . $fileArray[3]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>
	<br /><a>News Article ID: </a><input width="20px" type="text" name="filename" value="' . $file . '" readonly><br />';
	echo '<input type="submit">
	</form><br />
	<a href="../admin/"><button>Back to admin browser</button></a>';
	include("../include/footer.html");
?>
</body>
</html>
