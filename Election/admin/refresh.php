<?php
require('../connection.php');

// retrieving candidate with the states
if (isset($_POST['Submit'])){   

  $state_name = addslashes( $_POST['state_name'] );
  
    $results = mysqli_query($con, "SELECT * FROM candidates where candidate_state='$state_name'");
	// for the first candidate name and vote
    $row1 = mysqli_fetch_array($results); 
	// for the second candidate
    $row2 = mysqli_fetch_array($results); 
      if ($row1){
		  $candidate_name_1=$row1['candidate_name'];
		  $candidate_1=$row1['candidatevotes'];
      }

      if ($row2){
		  $candidate_name_2=$row2['candidate_name'];
		  $candidate_2=$row2['candidatevotes'];
      }
}
    else

?> 

<?php
// retrieving allstates sql query
$allstates=mysqli_query($con, "SELECT * FROM states");
?>
<?php
session_start();
//If invalid session then redirected to login panel
if(empty($_SESSION['admin_id'])){
 header("location:index.php");
}
?>

<?php if(isset($_POST['Submit'])){
	$totalvotes=$candidate_1+$candidate_2;} ?>

<!DOCTYPE html>
<html>
<head>
<script language="JavaScript" src="js/admin.js"></script>
</head>
	<body leftmargin="20%">	
	<div style="border:1px solid black;background-color:SkyBlue;">
		<div>
			<center><h1>Poll Result </h1>
			<a href="refresh.php">Poll Results</a> | <a href="states.php">Manage States</a> | <a href="candidates.php">Manage Candidates</a> | <a href="managedata.php">Manage Account</a> | <a href="pwchange.php">Change Password</a>  | <a href="logout.php">Logout</a></center><br>
		</div>
		<div>
			<table width="420" align="center">
				<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return stateValidate(this)">
				<tr>
						<td>Choose State</td>
						<td><SELECT NAME="state_name" id="state_name">
							<OPTION VALUE="select">select
							<?php 
							//while loop through all table rows
							while ($row=mysqli_fetch_array($allstates)){
							echo "<OPTION VALUE=$row[statename]>$row[statename]";
							}
							?>
							</SELECT>
						</td>
						<td><input type="submit" name="Submit" value="See Results" />
						</td>
				</tr>
				</form> 
			</table><center>
			<div style="border:1px solid black;">
			<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>This candidate vote count is <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>This candidate vote count is <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
		</div>
		</div>
		</div>
	</body>
</html>