<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../fadein.css">
	<link rel="stylesheet" type="text/css" href="index-style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
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
			<script>
			var myIndex = 0;
			gallery();

			function gallery() {
			  var i;
			  var x = document.getElementsByClassName("gallery");
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			  }
			  myIndex++;
			  if (myIndex > x.length) {myIndex = 1}
			  x[myIndex-1].style.display = "block";
			  setTimeout(gallery, 10000);
			}
			</script>
		</div>

		<div class="grid-container">
			<div class="body-panel">
				<h1>Hello there</h1>
				<p>testing testing</p>
			</div>
			<div class="body-panel">
				<h1>Hello there</h1>
				<p>testing testing</p>
			</div>
			<div class="body-panel">
				<h1>Hello there</h1>
				<p>testing testing</p>
			</div>
			<div class="body-panel">
				<h1>Hello there</h1>
				<p>testing testing</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
