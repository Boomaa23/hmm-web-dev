<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="contact-style.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/global-headers.css">
	<?php echo '<link rel="icon" href="' . trim(fgets(fopen("../utils/icon.txt", "r+"))) . '">'; ?>
	<title>Contact | Human Mind and Migration</title>
</head>
<body>
	<?php include("../include/menubar.php") ?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>Contact Us<hr width="220px" /></h1></span>
		<div class="contact-info">
			<a>Here's our contact info:</a>
			<ul>
				<li>Phone: (888) 888-8888</li>
				<li>Email: test@test.com</li>
		</div>
		<div class="support-container">
			<a>Support Us!</a><br />
			<a href="https://www.paypal.me/impactmania" target="_blank">
				<img src="http://www.impactmania.com/im/wp-content/uploads/2018/12/paypal-e1543897265917.png" alt="PayPal" width="148" height="67">
			</a>
		</div>
		<div class="contact-form-container">
			<br /><a>Contact Us!</a>
			<form action="contact-action.php" method="post" enctype="multipart/form-data">

			</form>
	</div>
	<?php include("../include/footer.html"); ?>
</body>
</html>
