<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/global-headers.css">
	<link rel="stylesheet" type="text/css" href="news-style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
	<title>News | Human Mind and Migration</title>
</head>

<body>
<div class="body-container">
	<?php include('../include/menubar.php'); ?>
	<span class="submenubar-header"><h1>News<hr width="170px" /></h1></span>
	<div class="submenubar-body">

		<?php
			$articles = glob("../data/news/*.json");
			array_multisort(array_map('filemtime', $articles), SORT_NUMERIC, SORT_ASC, $articles);
			$ct = 0;
			echo '<div class="recent-news"><div class="title">Recent News</div><br />';
			for($i = 0;$i < 10;$i++) {
				if($i < sizeof($articles)) {
					$articleArray = json_decode(file_get_contents($articles[$i]));
					echo '<a href="#' . basename($articles[$i], ".json") . '">' . $articleArray[0] . '</a> - <em>' . $articleArray[1] . '</em><br />';
				}
			}
			echo '</div>';

			for($i = 0;$i < sizeof($articles);$i++) {
				$articleArray = json_decode(file_get_contents($articles[$i]));
				echo '<div class="title" id="' . basename($articles[$i], ".json") . '"><hr />' . $articleArray[0] . "</div>";
				echo '<div class="author"><em>' . $articleArray[1] . '</em> - ' . $articleArray[5] . '</div><br />';
				echo $articleArray[2];
			}
		?>
	</div>
</div>
</body>
</html>
