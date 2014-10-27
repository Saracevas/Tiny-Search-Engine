<?php
session_start();
session_destroy();
setcookie('username', '', 0);
if (isset($_SESSION['username'])) {
	$msg = "You have logged off successfully.";
} else {
	$msg = "You were not logged in, logging off has failed."; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Log Out</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
	</head>
	<body>
		<div id="wrapper">
			
			<div class="header">
				<a href="index.php" title="Homepage of Sylvester's Engine" class="header">Sylvester's Engine</a>
				<hr style="width: 75%;" />
			</div>
			
			<div id="content">
				<h1>Log Out</h1>
				<?php echo $msg; ?><br /><p><a href="index.php">Home</a></p>
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