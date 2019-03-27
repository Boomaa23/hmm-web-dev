<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../utils/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/fadein.css">
	<link rel="stylesheet" type="text/css" href="index-style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
</head>

<body>
<div class="body-container">
	<?php
		include('../include/menubar.php');
	?>

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
			<script src="../utils/gallery-helper.js"></script>
		</div>
		<div class="grid-container">
			<?php
				$news = glob("../data/news/*.json");
				array_multisort(array_map('filemtime', $news), SORT_NUMERIC, SORT_ASC, $news);
				include("../utils/phputils.php");
				foreach($news as $article) {
					$article = json_decode(file_get_contents($article));
					echo '<div class="body-panel">
					<h1>' . $article[0] . '</h1>
					<h3>' . $article[1] . '</h3>
					<p>' . trim_text($article[2], 350) . '</p>
					</div>';
				}
			?>
		</div>
	</div>
</div>
</body>
</html>
