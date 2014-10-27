<?php
//check if cookie username is set
if (isset($_COOKIE['username'])) {
	$_SESSION['username'] = $_COOKIE['username'];
}
?>