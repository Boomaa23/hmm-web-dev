<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/global-headers.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/display-style.css">
	<link rel="stylesheet" type="text/css" href="project-index-style.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
</head>
<body>
	<?php include('../include/menubar.php');?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>Case Studies<hr width="300px" /></h1></span>
	<div class="table-container"align="center">
		<table cellspacing="25">
		<?php
		include("../utils/display-helper.php");
		$files = glob("../data/project/json/*.json", GLOB_BRACE);
		$ct = 0;
		foreach($files as $file) {
			$fileArray = json_decode(file_get_contents($file));
			if($fileArray != array("","","",array(""))) {
				$contributors = array();
				for($i = 0;$i < sizeof($fileArray[3]);$i++) {
					$fn = '../data/staff/json/' . $fileArray[3][$i] . '.json';
					if(file_exists($fn)) {
						array_push($contributors, json_decode(file_get_contents($fn))[0]);
					}
				}
				$picture = '../data/project/img/' . basename($file, ".json") . '.png';
				if($ct % 2 != 0) {
					leftPicture($fileArray, $file, $contributors, $picture);
				} else {
					rightPicture($fileArray, $file, $contributors, $picture);
				}
			}
			echo '<tr>
					<td colspan="3"><hr /></td>
				</tr>';
			$ct++;
		}
		?>
		</table>
	</div>
	</div>
	<?php include('../include/footer.html'); ?>
</body>
</html>
