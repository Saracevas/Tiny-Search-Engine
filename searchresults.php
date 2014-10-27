<?php 
session_start();
include "cookie.php";
if (isset($_SESSION['username'])) {
	$usname = $_SESSION['username'];
	$result = "Welcome, ".$usname."!";
} else {
	$result = "You're not logged in yet. Click <a href='index.php'>here</a> to try again.";
}
	include_once("dbcon.php");
	if (isset($_SESSION['username'])) {
	$id = $_GET['id'];
	
	//query
	$sql = "SELECT Name, Description, Image, Price FROM PHP_Item WHERE ItemID = $id";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_assoc($query);
	$image = $row['Image'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Search Results - Sylvester's Engine</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
	</head>
	<body>
		<div id="wrapper">
			
			<div class="header">
				<a href="index.php" title="Homepage of Sylvester's Engine" class="header">Sylvester's Engine</a>
				<hr style="width: 75%;" />
			</div>
			
			<div id="content">
				<h1>Search Result</h1>
				<?php if (!isset($_SESSION['username'])) echo $result; ?>
				<?php if (isset($_SESSION['username'])): ?>
				<h2><?php echo $row['Name']?></h2>
				<?php echo "<img src=\"images/".$image."\"alt=\"Movie poster\" height=\"300\" />";?>
				<h3>Description</h3>
					<?php echo $row['Description'];  ?>
				<h3>Price</h3>
				<?php echo "&pound;".$row['Price']; ?>
				<?php endif; ?>
			</div>
			
			<div id="sidebar">
				<div class="menu">
				<?php if (isset($_SESSION['username'])) { echo $result; } ?>
					<ul>
						<li><a href="search.php" class="current">Home</a></li>
						<?php if (isset($_SESSION['username'])): ?><li><a href='search.php'>Back</a></li><?php endif; ?>
						<?php if (isset($_SESSION['username'])): ?><li><a href='logout.php'>Log Out</a></li><?php endif; ?>
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