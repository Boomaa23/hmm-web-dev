<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="staff-style.css">
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../fadein.css">
</head>
<body>
	<?php include('../include/menubar.php');?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>About Us<hr width="300px" /></h1></span>
		<div class="accordion-container">
			<button class="accordion">ImpactMania</button>
			<div class="panel">
			  <?php include("im-history.php"); ?>
			</div>

			<button class="accordion">Interns</button>
			<div class="panel">
			  <?php include("staff.php"); ?>
			</div>
			
			<button class="accordion">Interns</button>
			<div class="panel">
			  <?php include("staff.php"); ?>
			</div>
		</div>
	</div>
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight){
			  panel.style.maxHeight = null;
			} else {
			  panel.style.maxHeight = panel.scrollHeight + "px";
			} 
		  });
		}
	</script>
	<?php include('../include/footer.html'); ?>
</body>
</html>