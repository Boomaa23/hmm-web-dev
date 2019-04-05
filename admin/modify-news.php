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
	date_default_timezone_set('UTC');
	$file = $_GET["src"];
	$fileArray = json_decode(file_get_contents('../data/news/' . $file . '.json'));
	echo '<title>HMM News Editor | ' . $file .'</title>';
	echo '<form action="../data/data-action.php?dest=newsAction" method="post" enctype="multipart/form-data">

	<a>News Article Name: </a><input type="text" name="article_name" value="' . $fileArray[0] . '" required><br />
	<a>Author: </a><input type="text" name="author" value="' . $fileArray[1] . '" required><br />';

	echo '<br /><a>News Article Description:</a><br />
	<textarea name="article_desc" cols="70" rows="15" required>' . $fileArray[3]. '</textarea><br />
	</a><div style="font-size:12px;"><a>(Supports <a href="http://cheatsheet.aboutmde.org/" target="_blank">Markdown</a>)</a></div>

	<br /><a>Display on News Feed?</a><br />';
	$yes = null; $no = null;
	if($fileArray[4] === "yes") {
		$yes = 'checked="checked"';
	} else if($fileArray[4] === "no") {
		$no = 'checked="checked"';
	}
	echo '<input type="radio" name="on_news_feed" ' . $yes . ' value="yes" required>Yes<br />';
	echo '<input type="radio" name="on_news_feed" ' . $no . ' value="no">No<br />';

	echo '<br /><a>Last UTC Modification Date: <i>' . $fileArray[5] . '</i></a>
	<input style="display:none;" value="' . date("n/j/Y") . '" name="date" />
	<input style="display:none;" value="' . $file . '" name="filename" />
	<br /><a>News Article ID: <i>' . $file . '</i></a><br />';

	echo '<input type="submit">
	</form><br />
	<a href="../admin/"><button>Back to admin browser</button></a>';
	include("../include/footer.html");
?>
</body>
</html>
