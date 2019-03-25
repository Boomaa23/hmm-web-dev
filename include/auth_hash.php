<?php
file_put_contents("hash.txt", password_hash("password", PASSWORD_DEFAULT));
?>