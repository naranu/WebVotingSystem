<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['admin_id'])){
		header("location:index.php");
	}
//retrive states from the states table
	$result=mysqli_query($con, "SELECT * FROM states");
	if (mysqli_num_rows($result)<1){
		$result = null;
	}

// inserting sql query
	if (isset($_POST['Submit'])){
		$newState = addslashes( $_POST['statename'] );
		$sql = mysqli_query($con, "INSERT INTO states (statename) VALUES ('$newState')");

	// redirect back to states page
	header("Location: states.php");
	}

	// deleting sql query
	// check if the 'id' variable is set
	if (isset($_GET['id'])){
		// get auto genereted id value
		$id = $_GET['id'];
	 
		// deleting entry
		$result = mysqli_query($con, "DELETE FROM states WHERE stateno='$id'");
	 
		// redirect back to states page
		header("Location: states.php");
	}
	else
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration Management of States</title>
	<script language="JavaScript" src="js/admin.js"></script>
</head>

<body leftmargin="20%">
		<div style="border:1px solid black;background-color:SkyBlue;">
		<div><center>
			<h1>Manage States</h1>
			<a href="refresh.php">Poll Results</a> | <a href="states.php">Manage States</a> | <a href="candidates.php">Manage Candidates</a> | <a href="managedata.php">Manage Account</a> | <a href="pwchange.php">Change Password</a>  | <a href="logout.php">Logout</a></center>
		</div>
	<div>
		<table width="380" align="center">
			<CAPTION><h3>ADD NEW State</h3></CAPTION>
				<form name="fmPositions" id="fmPositions" action="states.php" method="post" onsubmit="return positionValidated(this)">
					<tr>
						<td>State Name</td>
						<td><input type="text" name="statename" /></td>
						<td><input type="submit" name="Submit" value="Add" /></td>
					</tr>
				</form>
		</table>
		<table border="0" width="420" align="center"><br>
		<div style="border:1px solid black;">
			<CAPTION><h3>Available States</h3></CAPTION>
				<tr>
					<th>State ID</th>
					<th>State Name</th>
				</tr>

				<?php
				//loop through all table rows
				$inc=1;
				while ($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" .$inc."</td>";
					echo "<td>" . $row['statename']."</td>";
					echo '<td><a href="states.php?id=' . $row['stateno'] . '">Delete State</a></td>';
					echo "</tr>";
					$inc++;
				}

				mysqli_free_result($result);
				mysqli_close($con);
		?>
		</table>
		</div>
	</div>
</body>
</html>