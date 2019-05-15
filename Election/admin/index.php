<!DOCTYPE html>
<html>
<head>
<script language="JavaScript" src="js/admin.js"></script>
</head>
<body leftmargin="20%">
		<div align="center" style="border:1px solid black;background-color:LightGreen;">
		<div>
		<center><h1>Administrator Login </h1></center>
		</div>
		<div>
			<table width="300" border="0" align="center" >
				<tr>
					<form name="form1" method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
				<td>
					<table>
				<tr>
					<td width="78">Email</td>
					<td width="6">:</td>
					<td width="294"><input name="myusername" type="text" id="myusername"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input name="mypassword" type="password" id="mypassword"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input type="submit" name="Submit" value="Login"></td>
				</tr>
					</table>
				</td>
					</form>
				</tr>
			</table>
		<center>
		</center>
		</div>
	</div>
</body>
</html>