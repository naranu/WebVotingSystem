<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<script language="JavaScript" src="js/user.js"></script>
</head>
	<body leftmargin="20%">	
	<div style="border:1px solid black;background-color:LightGreen;">
			<div>
			<center><h1>Login to Vote </h1></center><a href="admin/index.php"></a>
			</div>
			<div>
				<table width="300" border="0" align="center" >
					<tr>
					<form name="form1" method="post" action="checklogin.php" onsubmit="return loginValidate(this)">
						<td>
						<table width="100%" border="0" cellpadding="3" cellspacing="1">
							<tr>
								<td >Email</td>
								<td>:</td>
								<td width="294"><input name="myusername" type="text" id="myusername"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input name="mypassword" type="password" id="mypassword"></td>
							</tr>
							<tr>
								<td>&nbsp;</td><td>&nbsp;</td>
								<td><input type="submit" name="Submit" value="Login"></td>
							</tr>
						</table>
						</td>
					</form>
					</tr>
				</table>
				<center><br><a href="register.php"><b>Register Now</a></b><br><br><br><br><b><a href="admin/index.php">Go to Admin Panel</a>
				</center>
			</div>
		</div>
	</body>
</html>
