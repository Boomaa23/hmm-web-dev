<?php include "../include/auth.php"; ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="admin-style.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/folding-style.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
	<title>HMM Admin Editor</title>
</head>
<body>
	<div class="accordion-container">
		<!-- blank folding section to avoid auto-click of ../utils/folding-helper.js -->
		<button class="accordion" style="display:none;"></button>
		<button class="accordion">Case Studies / Projects</button>
		<div class="panel"><br />
		<!-- add a project -->
		<form action="../data/data-action.php?dest=projectAdd" method="post">
			<input class="mod" type="submit" value="Add another Project">
		</form>

		<!-- remove a project -->
		<form action="../data/data-action.php?dest=projectRemove" method="post">
			<input class="mod" type="text" name="project" placeholder="Project ID" required>
			<input class="mod" type="submit" value="Remove a Project">
		</form><br />

		<?php
			$projects = glob("../data/project/json/*.json", GLOB_BRACE);
			foreach($projects as $file) {
				$fileArray = json_decode(file_get_contents($file));
				$file = trim(basename($file, ".json"));
				if($fileArray != array("","","",array(""),"")) {
					echo '<a href="modify-projects.php?src=' . $file . '">' . $fileArray[0] . '</a>';
				} else {
					echo '<a href="modify-projects.php?src=' . $file . '">NEW PROJECT</a>';
				}
				$x = "'" . $file ."'";
				echo ' - <input id="' . $file . '" value="' . $file . '" readonly size="7"></input>
				<button class="tooltip" onclick="copyToClipboard(' . $x . ')">
				<img src="../images/paste.png" height="20"></img>
				<span class="tooltiptext">Copy ID</span>
				</button><br />';
			}
		?>
		<br />

		</div>
		<button class="accordion">Staff / Faculty / Interns</button>
		<div class="panel"><br />
			<!-- add a staff -->
			<form action="../data/data-action.php?dest=staffAdd" method="post">
				<input class="mod" type="submit" value="Add another Staff">
			</form>

			<!-- remove a staff -->
			<form action="../data/data-action.php?dest=staffRemove" method="post">
				<input class="mod" type="text" name="staff" placeholder="Staff ID" required>
				<input class="mod" type="submit" value="Remove a Staff">
			</form><br />

			<?php
			$staff = glob("../data/staff/json/*.json", GLOB_BRACE);
			foreach($staff as $file) {
				$fileArray = json_decode(file_get_contents($file));
				$file = trim(basename($file, ".json"));
				if($fileArray != array("","","","")) {
					echo '<a href="modify-staff.php?src=' . $file . '">' . $fileArray[0] . '</a>';
				} else {
					echo '<a href="modify-staff.php?src=' . $file . '">NEW STAFF</a>';
				}
				$x = "'" . $file ."'";
				echo ' - <input id="' . $file . '" value="' . $file . '" readonly size="7"></input>
				<button class="tooltip" onclick="copyToClipboard(' . $x . ')">
				<img src="../images/paste.png" height="20"></img>
				<span class="tooltiptext">Copy ID</span>
				</button><br />';
			}
			?>
			<br />
	</div>

	<button class="accordion">News Articles</button>
	<div class="panel"><br />
		<!-- add a news article -->
		<form action="../data/data-action.php?dest=newsAdd" method="post">
			<input class="mod" type="submit" value="Add another News Article">
		</form>

		<!-- remove a news article -->
		<form action="../data/data-action.php?dest=newsRemove" method="post">
			<input class="mod" type="text" name="article" placeholder="News Article ID" required>
			<input class="mod" type="submit" value="Remove a News Article">
		</form><br />
		<?php
		$news = glob("../data/news/*.json", GLOB_BRACE);
		foreach($news as $file) {
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			if($fileArray != array("","","","","","")) {
				echo '<a href="modify-news.php?src=' . $file . '">' . $fileArray[0] . '</a>';
			} else {
				echo '<a href="modify-news.php?src=' . $file . '">NEW NEWS ARTICLE</a>';
			}
			$x = "'" . $file ."'";
			echo ' - <input id="' . $file . '" value="' . $file . '" readonly size="7"></input>
			<button class="tooltip" onclick="copyToClipboard(' . $x . ')">
			<img src="../images/paste.png" height="20"></img>
			<span class="tooltiptext">Copy ID</span>
			</button><br /><br />';
		}
	?>
	</div>
	<button class="accordion">HMM Story Submissions</button>
	<div class="panel"><br />

	</div>
</div>
</body>
<script type="text/javascript" src="../utils/js/jsutils.js"></script>
<script type="text/javascript" src="../utils/js/folding-helper.js"></script>
<?php include("../include/footer.html"); ?>
</html>
