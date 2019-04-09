<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="contact-style.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/global-headers.css">
	<?php echo '<link rel="icon" href="' . trim(fgets(fopen("../utils/icon.txt", "r+"))) . '">'; ?>
	<title>Contact | Human Mind and Migration</title>
	<script type="text/javascript">
		function confirm_reset() {
			return confirm("Are you sure you want to reset your response?");
		}
	</script>
</head>
<body>
	<?php include("../include/menubar.php") ?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>Contact Us<hr width="220px" /></h1></span>
		<div class="grid-container">
			<div class="body-panel left-panel">
				<div class="contact-info">
					<a>Here's our contact info:</a>
					<ul>
						<li>Phone: (888) 888-8888</li>
						<li>Email: test@test.com</li>
					</ul>
				</div>
				<div class="support-container">
					<a>Support Us!</a><br />
					<a href="https://www.paypal.me/impactmania" target="_blank">
						<img src="http://www.impactmania.com/im/wp-content/uploads/2018/12/paypal-e1543897265917.png" alt="PayPal" width="148" height="67">
					</a>
				</div>
			</div>
			<div class="body-panel right-panel">
				<div class="contact-form-container">
					<div class="form-title">Inquiries</div><br />
					<form action="contact-action.php" method="post" enctype="multipart/form-data">
						<a>Name*</a><br /><input type="text" name="name" required/><br /><br />
						<a>Email*</a><br /><input type="text" name="email" required /><br /><br />
						<a>Message Type*</a><br />
							<select name="type">
								<option value="general">General</option>
								<option value="support">Support</option>
								<option value="feedback">Feedback</option>
							</select><br /><br />
						<a>Title of Message*</a><br /><input type="text" name="title" required /><br /><br />
						<a>Message*</a><br /><textarea name="message" cols="60" rows="15" required></textarea><br />
						<button type="submit">Submit</button>
						<button type="reset" onclick="return confirm_reset();">Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include("../include/footer.html"); ?>
</body>
</html>
