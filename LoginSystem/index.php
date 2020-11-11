<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="assignment.css">
	<script>
	function validateForm() {
		var pass1 = document.forms["form"]["password"].value;
		var pass2 = document.forms["form"]["password2"].value;
		var div = document.getElementById('pw');
		if (pass1!==pass2){
				div.innerHTML = "Password: Password does not match"
				div.style.color = "red"
				return false;
		}
		else{
				div.innerHTML = "Password:"
				return true;
			}
		}
	</script>
</head>
<body>
<br><br><br>
<div class=corners1>
	<h2>Register</h2>		
	<?php
	$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
	if ($db -> connect_error) {
		echo ("Failed to connect to MySQL: " . $db -> connect_error);
		exit();
	}
	$commandText = "SELECT Message FROM Error";
	$result = $db->query($commandText);
	if (!is_null($row = mysqli_fetch_row($result))){
			printf("<div class='error'>%s</div", $row[0]);
			$db->query("DELETE FROM Error");
		}

	?>
	<form name="form" method="post" action="register.php" onsubmit="return validateForm()">
		<div>
			<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" minlength="4" maxlength="16">
			</div>
			<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" >
			</div>
			<div class="input-group">
			<div id="pw" style="text-align: left;">Password</div>
			<input type="password" name="password"minlength="4" maxlength="16">
			</div>
			<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password2">
			</div>
			<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
			</div>
			<p>
			Already a member? <a href="login.php">Sign in</a>
			</p>			
		</div>

	</form>
</div>
</body>
</html>
    