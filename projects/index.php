<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../about/staff-style.css">
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../fadein.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
</head>
<body>
	<?php include('../include/menubar.php');?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>Case Studies<hr width="300px" /></h1></span>
	<div class="table-container"align="center">
		<table cellspacing="25">
		<?php
		$files = glob("../data/project/json/*.json", GLOB_BRACE);
		$ct = 0;
		foreach($files as $file) {
			$fileArray = json_decode(file_get_contents($file));
			if($fileArray != array("","","","")) {
				if($ct % 2 == 0) {
					// left side picture
					echo '<tr>
						<td class="table-studentname table-left table-element">
							<a class="inner-studentname">' . $fileArray[1] . '</a>
						</td>
						<td colspan="2" class="table-projectname table-right table-element">
							<a class="inner-projectname">' . $fileArray[0] . '</a>
						</td>
					</tr>
					<tr>
						<td class="table-studentpicture table-left table-element">
							<img class="inner-studentpicture" src="../data/project/img/' . basename($file, ".json") . '.png">
						</td>
						<td colspan="2" class="table-projectbrief table-right table-element">
							<span class="inner-projectbrief">' . $fileArray[2] . '</span>
						</td>
					</tr>';
					
				} else {
					// right side picture
					echo '<tr>
						<td colspan="2" class="table-projectname table-left table-element">
							<a class="inner-projectname">' . $fileArray[0] . '</a>
						</td>
						<td class="table-studentname table-right table-element">
							<a class="inner-studentname">' . $fileArray[1] . '</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="table-projectbrief table-left table-element">
							<span class="inner-projectbrief">' . $fileArray[2] . '</span>
						</td>
						<td class="table-studentpicture table-right table-element">
							<img class="inner-studentpicture" src="../data/project/img/' . basename($file, ".json") . '.png">
						</td>
					</tr>';
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