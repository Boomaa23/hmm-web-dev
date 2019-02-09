<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index-style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Cinzel" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<div class="body-container">
	<div class="menubar-container">
		<?php include('menubar.html'); ?>
	</div>
	
	<div class="main-image">
	<div class="gallery">
		<img src="web_images/gallery/A.jpg" class="gallery-img">
		<div class="gallery-overlay">A Journey into the Ancient World</div>
	</div>
	<div class="gallery gallery-img">
		<img src="web_images/gallery/B.jpg" class="gallery-img">
		<div class="gallery-overlay">TestingB</div>
	</div>
	<div class="gallery gallery-img">
		<img src="web_images/gallery/C.jpg"  class="gallery-img">
		<div class="gallery-overlay">TestingC</div>
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
	</div>

</div>
</body>
</html>