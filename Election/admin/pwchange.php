<?php
session_start();
require('../connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>
<script language="JavaScript" src="js/admin.js"></script>
</head>
<body leftmargin="20%">
		<div style="border:1px solid black;background-color:SkyBlue;">
<div align="center">
<h1>Admin Password</h1>
			<a href="refresh.php">Poll Results</a> | <a href="states.php">Manage States</a> | <a href="candidates.php">Manage Candidates</a> | <a href="managedata.php">Manage Account</a> | <a href="pwchange.php">Change Password</a>  | <a href="logout.php">Logout</a><div>
<br>
<?php
//Invalid session, redirected backto login
	if(empty($_SESSION['admin_id'])){
		header("location:index.php");
	}

//fetch data for update file
$result=mysqli_query($con, "SELECT * FROM admin_table WHERE admin_id = '$_SESSION[admin_id]'");
	if (mysqli_num_rows($result)<1){
		$result = null;
	}
	$row = mysqli_fetch_array($result);
	if($row){ 
		$enPassword = $row['password'];
	}

	if (isset($_GET['id']) && isset($_POST['update'])){
			$myId = addslashes( $_GET['id']);
			$mypassword = md5($_POST['oldpass']);
			$newpass= $_POST['newpass'];
			$confpass= $_POST['confpass'];
			
			if($enPassword==$mypassword){
				if($newpass==$confpass){
					$newpass = md5($newpass);
					$sql = mysqli_query($con, "UPDATE admin_table SET password='$newpass' WHERE admin_id = '$myId'" );
					echo "<script>alert('Your password is updated');</script>";
				}
				else{
					echo "<script>alert('Your new password and confirm password does not match');</script>";
				}    
			}
			else
			{
				echo "<script>alert('Your old password is not matching with database');</script>";
			}
	}
?>

		<div style="border:1px solid black;">
		<table align="center">
			<tr>
				<td>
					<form action="pwchange.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
						<table align="center">
							<CAPTION><h4>Change Password</h4></CAPTION>
							<tr><td>Old Password:</td><td><input type="password" name="oldpass" maxlength="15" value=""></td></tr>
							<tr><td>New Password:</td><td><input type="password" name="newpass" maxlength="15" value=""></td></tr>
							<tr><td>Confirm Password:</td><td><input type="password" name="confpass" maxlength="15" value=""></td></tr>
							<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
		</div>
		</div>
	</div>
</body>
</html>