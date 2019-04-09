<?php
  include("../utils/php/phputils.php");
  email($_POST["message"], $_POST["title"], $_POST["email"]);
  email($_POST["message"], $_POST["title"], "");
?>
