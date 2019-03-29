<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../utils/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/global-headers.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>

	<style>
		.submenubar-body {margin-left:20px;font-family:"Arial";}
		.title {font-weight:bold;font-size:28px;}
		.author {font-size:20px;}
	</style>
</head>

<body>
<div class="body-container">
	<?php include('../include/menubar.php'); ?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>News<hr width="220px" /></h1></span>
		<?php
			$articles = glob("../data/news/*.json");
			array_multisort(array_map('filemtime', $articles), SORT_NUMERIC, SORT_ASC, $articles);
			$ct = 0;
			echo '<div class="title">Recent News</div><br />';
			for($i = 0;$i < 10;$i++) {
				if($i < sizeof($articles)) {
					$articleArray = json_decode(file_get_contents($articles[$i]));
					echo '<a href="#' . basename($articles[$i], ".json") . '">' . $articleArray[0] . '</a> - <em>' . $articleArray[1] . '</em><br />';
				}
			}

			foreach($articles as $article) {
				echo '<div class="title" id="' . basename($article, ".json") . '"><hr />' . $articleArray[0] . "</div>";
				echo '<div class="author"><em>' . $articleArray[1] . '</em></div><br />';
				echo $articleArray[2];
				$ct++;
			}
		?>
	</div>
</div>
</body>
</html>
