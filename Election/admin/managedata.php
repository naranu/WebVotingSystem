<?php
session_start();
require('../connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Data Change</title>
</head>
<body leftmargin="20%">
<div style="border:1px solid black;background-color:SkyBlue;">	
	<div>
		<center><h1>Admin Data Management</h1>
			<a href="refresh.php">Poll Results</a> | <a href="states.php">Manage States</a> | <a href="candidates.php">Manage Candidates</a> | <a href="managedata.php">Manage Account</a> | <a href="pwchange.php">Change Password</a>  | <a href="logout.php">Logout</a></center>
			</div>

<div>

<?php
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
		$adminId = $row['admin_id'];
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$email = $row['email'];
	}

	//Updating to new password
	if (isset($_GET['id']) && isset($_POST['update'])){
		$myId = addslashes( $_GET['id']);
		$myFirstName = addslashes( $_POST['firstname'] );
		$myLastName = addslashes( $_POST['lastname'] );
		$myEmail = $_POST['email'];

		$sql = mysqli_query($con, "UPDATE admin_table SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
	}
?>

			<table align="center">
				<tr>
					<td>
					<form action="managedata.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
					<table align="center">
					<CAPTION><h4>Update Account</h4></CAPTION>
					<tr><td>First Name:</td><td><input type="text" name="firstname" maxlength="20" value="<?php echo $firstName ?>"></td></tr>
					<tr><td>Last Name:</td><td><input type="text" name="lastname" maxlength="20" value="<?php echo $lastName ?>"></td></tr>
					<tr><td>Email Address:</td><td><input type="text" name="email" maxlength="80" value="<?php echo $email?>"></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
					</table>
					</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>