<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/fadein.css">
	<link rel="stylesheet" type="text/css" href="index-style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<?php echo '<link rel="icon" href="' . trim(fgets(fopen("../utils/icon.txt", "r+"))) . '">'; ?>
</head>

<body>
<div class="body-container">
	<?php include('../include/menubar.php'); ?>

	<div class="submenubar-body">
		<div class="main-image">
		<div class="gallery">
			<img src="../images/gallery/A.jpg" class="gallery-img">
			<div class="gallery-overlay">Testing A</div>
		</div>
		<div class="gallery gallery-img">
			<img src="../images/gallery/B.jpg" class="gallery-img">
			<div class="gallery-overlay">Testing B</div>
		</div>
		<div class="gallery gallery-img">
			<img src="../images/gallery/C.jpg"  class="gallery-img">
			<div class="gallery-overlay">Testing C</div>
		</div>
			<script src="../utils/js/gallery-helper.js"></script>
		</div>
		<div class="grid-container">
			<?php
				$news = glob("../data/news/*.json");
				array_multisort(array_map('filemtime', $news), SORT_NUMERIC, SORT_DESC, $news);
				include("../utils/php/phputils.php");
				foreach($news as $article) {
					$articleArray = json_decode(file_get_contents($article));
					if($articleArray[4] ==="yes") {
						echo '<div class="body-panel">
						<h1><a href="../news/#' . basename($article, ".json") . '">' . $articleArray[0] . '</a></h1>
						<h3>' . $articleArray[1] . ' - <span class="article-date">' . $articleArray[5] . '</span></h3>

						<p>' . trim_text($articleArray[2], 250) . '</p>
						</div>';
					}
				}

				$newsProjects = glob("../data/project/json/*.json");
				foreach($newsProjects as $proj) {
					$project = json_decode(file_get_contents($proj));
					if($project[4] === "yes") {
						$contributors = array();
						for($i = 0;$i < sizeof($project[3]);$i++) {
							$fn = '../data/staff/json/' . $project[3][$i] . '.json';
							if(file_exists($fn)) {
								array_push($contributors, json_decode(file_get_contents($fn))[0]);
							}
						}
						echo '<div class="body-panel">
						<h1><a href="../data/project/web/' . basename($proj, ".json") . '">' . $project[0] . '</a></h1>
						<h3>' . implode(", ", $contributors) . '</h3>
						<p>' . trim_text($project[2], 350) . '</p>
						</div>';
					}
				}
			?>
		</div>
	</div>
</div>
</body>
</html>
