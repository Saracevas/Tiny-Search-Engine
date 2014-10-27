<?php
session_start();

include "cookie.php";

if (isset($_SESSION['username'])) {
	$usname = $_SESSION['username']; { header("location: search.php"); }}

if (isset($_POST['username'])) {
	include_once("dbcon.php");
	
	$usname = strip_tags($_POST["username"]);
	$paswd = strip_tags($_POST["password"]);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	
	$sql = "SELECT Username, Password FROM PHP_Customer WHERE Username = '$usname' LIMIT 1";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$dbUsname = $row[0];
	$dbPassword = $row[1];
	
	if (mysqli_num_rows($query) == 1 && $usname == $dbUsname && $paswd == $dbPassword) {
	
		$_SESSION['username'] = $usname;
		setcookie('username', $usname, time() + 60*60*24*365);
		header("Location: search.php");
	} else {
		$error = "Wrong details, try again";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home - Sylvester's Engine</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
	</head>
	<body>
		<div id="wrapper">
			
			<div class="header">
				<a href="index.php" title="Homepage of Sylvester's Engine" class="header">Sylvester's Engine</a>
				<hr style="width: 75%;" />
			</div>
			
			<div id="content">
				<h1>Login</h1>
				<?php if(isset($error)) echo $error; ?>
				<form id="form" action="index.php" method="post" enctype="multipart/form-data">
					Username:<br /><input type="text" name="username" /><br />
					Password:<br /><input type="password" name="password" /><br />
					<label><input type="checkbox" name="remember" /> Remember me!</label><br />
					<input type="submit" value="Login" name="Submit" />
				</form>
			</div>
			
			<div id="sidebar">
				<div class="menu">
					<ul>
						<li><a href="index.php" class="current">Home</a></li>
					</ul>
				</div>
			</div>
			
			<div id="footer">
			<hr style="width: 75%;" />
			<p>&copy; Sylvester Saracevas 2014. All rights reserved.
			<a href="http://validator.w3.org/check?uri=referer"><img
			  src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="13" width="37" /></a>
			</p>
			</div>
			
		</div>
	</body>
</html>