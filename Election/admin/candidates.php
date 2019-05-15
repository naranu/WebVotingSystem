<?php
session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
	header("location:index.php");
} 
	//query candidates from the candidates table
	$result=mysqli_query($con,"SELECT * FROM candidates");
	if (mysqli_num_rows($result)<1){
		$result = null;
	}

	// retrieving states from state table
	$states_received=mysqli_query($con, "SELECT * FROM states");



if (isset($_POST['Submit'])){
	$newCandidateName = addslashes( $_POST['name'] );
	$newCandidateState = $_POST['state'];

	$sql = mysqli_query($con, "INSERT INTO candidates(candidate_name,candidate_state) VALUES ('$newCandidateName','$newCandidateState')" );

	// Insert and refresh the candidate page
	 header("Location: candidates.php");
}


 if (isset($_GET['id'])){
	 $id = $_GET['id'];
	 $result = mysqli_query($con, "DELETE FROM candidates WHERE candidate_id='$id'");
	 
	 // Remove and refresh the candidate page
	 header("Location: candidates.php");
 }
 else
?>

<!DOCTYPE html>
<html>
<head>
<title>Administration :Candidates</title>
<script language="JavaScript" src="js/admin.js"></script>
</head>
<body leftmargin="20%">
	<div style="border:1px solid black;background-color:SkyBlue;">
			<div align="center">
			  <h1>Manage Candidates</h1>
						<a href="refresh.php">Poll Results</a> | <a href="states.php">Manage States</a> | <a href="candidates.php">Manage Candidates</a> | <a href="managedata.php">Manage Account</a> | <a href="pwchange.php">Change Password</a>  | <a href="logout.php">Logout</a>
			</div>
	<div>
		<table align="center">
			<CAPTION><h3>Add Candidates</h3></CAPTION>
			<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
			<tr>
				<td>Candidate Name</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Candidate State</td>
				<td><SELECT NAME="state" id="state">select
					<OPTION VALUE="select">select
					
					<?php 
					//get all the states
					while ($row=mysqli_fetch_array($states_received)){
						echo "<OPTION VALUE=$row[statename]>$row[statename]";
					}
					?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Add" /></td>
			</tr>
		</table>
		<table border="0" width="620" align="center">
		<div style="border:1px solid black;">
			<CAPTION><h3>Current Candidates</h3></CAPTION>
			<tr>
			<th>Candidate ID</th>
			<th>Candidate Name</th>
			<th>Candidate State</th>
			</tr>

			<?php
			//while loop through all table rows listing candidate names with their state
			$inc=1;
			while ($row=mysqli_fetch_array($result)){			
					echo "<tr>";
					echo "<td>" . $inc."</td>";
					echo "<td>" . $row['candidate_name']."</td>";
					echo "<td>" . $row['candidate_state']."</td>";
					echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
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