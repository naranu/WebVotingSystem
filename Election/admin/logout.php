<!DOCTYPE html>
<html>
<head>
	<title>Logged Out</title>
</head>
<body leftmargin="20%">
		<div align="center" style="border:1px solid black;background-color:OldLace;">
		<div>
			<h1>Logged Out!!</h1>
			<p align="center">&nbsp;</p>
		</div>
<?php
session_start();
session_destroy();
?>
	You have been successfully logged out.<br><br><br>
	Return to <a href="index.php">Login</a>
	
		</div>
	</div>
</body>
</html>