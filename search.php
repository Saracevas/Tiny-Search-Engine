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
if (isset($_POST['search'])) {
	//do search stuff
	//query
	$sql = "SELECT ItemID AS id, Name, Price FROM PHP_Item WHERE Name LIKE '%".$_POST['search']."%' OR Description LIKE '%".$_POST['search']."%'";
	//table
	$table = '<table class="tftable" border="1px"><thead><tr>
	<th>Title</th><th>Price</th>
	</tr></thead><tbody>';
	$query = mysqli_query($dbCon, $sql);
	//$dbresult = mysqli_fetch_all($query, MYSQLI_ASSOC);
	while ($dbresult = $query->fetch_assoc()) {
		$table .= '<tr>';
			$table .= '<td>';
				$table .= '<a href="searchresults.php?id='.$dbresult['id'].'">';
				$table .= $dbresult['Name'];
				$table .= '</a>';
				$table .= '</td>';
				$table .= '<td>';
				$table .= '<a href="searchresults.php?id='.$dbresult['id'].'">';
				$table .= "&pound;".$dbresult['Price'];
				$table .= '</a>';
			$table .= '</td>';
		$table .= '</tr>';
	}
	$table .= '</tbody></table>';
}
$form = '<form id="form1" action="" method="post">
					<input type="text" name="search" size="30" maxlength="45"/>
					<input type="submit" value="Search" name="Submit" />
				</form>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Search - Sylvester's Engine</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
	</head>
	<body>
		<div id="wrapper">
			
			<div class="header">
				<a href="index.php" title="Homepage of Sylvester's Engine" class="header">Sylvester's Engine</a>
				<hr style="width: 75%;" />
			</div>
			
			<div id="content">
				<h1>Search</h1>
				<?php
				if (!isset($_SESSION['username'])) { echo $result; }
				if (isset($_SESSION['username'])) { echo $form; }
				?>
				<div><br />
					<?php if (isset($table)) echo $table; ?>
				</div>
			</div>
			
			<div id="sidebar">
				<div class="menu">
				<?php if (isset($_SESSION['username'])) { echo $result; } ?>
					<ul>
						<li><a href="search.php" class="current">Home</a></li>
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