<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>

<script language="JavaScript" src="js/user.js"></script>
</head>
	<body leftmargin="20%">	
	<div style="border:1px solid black;background-color:LightPink;">
		<div>
		<h1><center>Register to Vote </center></h1>
		</div>
		<div>
			<?php
			require('connection.php');
			if (isset($_POST['submit'])){
				$myFirstName = addslashes( $_POST['firstname'] );
				$myLastName = addslashes( $_POST['lastname'] );
				$myEmail = $_POST['email'];
				$myPassword = $_POST['password'];
				$newpass = md5($myPassword);
				// Inserting voters data for registration
				$sql = mysqli_query($con, "INSERT INTO voters(first_name, last_name, email, password) 
				VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass') ");
				
			die( "<center>Your account is registered. <br><br>Please <a href=\"index.php\">Login</a> to vote</center>" );
			}

			echo '<form action="register.php" method="post" onsubmit="return registerValidate(this)">';
			echo '<table align="center"><tr><td>';
			echo "<tr><td>First Name:</td><td><input type='text' name='firstname' maxlength='15' value=''></td></tr>";
			echo "<tr><td>Last Name:</td><td><input type='text' name='lastname' maxlength='15' value=''></td></tr>";
			echo "<tr><td>Email Address:</td><td><input type='email' name='email' maxlength='100' id='email'value=''></td><td><span id='result' style='color:red;'></span></td></tr>";
			echo "<tr><td>Password:</td><td><input type='password' name='password' maxlength='15' value=''></td></tr>";
			echo "<tr><td>Confirm Password:</td><td><input type='password' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
			echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
			echo "<tr><td colspan = '2'><p>Already have an account? <a href='index.php'><b>Login Here</b></a></td></tr>";
			echo "</tr></td></table>";
			echo "</form>";
			?>
		</div> 
	</div>
</body>
	<script src="js/jquery-1.2.6.min.js"></script>
		<script>
		$(document).ready(function(){		  
			$('#email').blur(function(event){			 
				event.preventDefault();
				var emailId=$('#email').val();
					$.ajax({                     
					url:'checkuser.php',
					method:'post',
				data:{email:emailId},  
					dataType:'html',
					success:function(message)
					{$('#result').html(message);}
				});
			});
		});	   
    </script>
</html>