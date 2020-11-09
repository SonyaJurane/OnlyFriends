<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="assignment.css">
</head>
<body>
<br><br><br>
<div class=corners1>
	<h2>Login</h2>		
	<?php
	$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
	if ($db -> connect_error) {
		echo ("Failed to connect to MySQL: " . $db -> connect_error);
		exit();
	}
	$commandText = "SELECT Message FROM Error";
	$result = $db->query($commandText);
	if ($result) {
		while($row = mysqli_fetch_row($result)) {
			printf("<div class='error'>%s</div", $row[0]);
			$db->query("DELETE FROM Error");
			break;
		}
	}
	mysqli_close($db);
	?>
	<form method="post" action="validation.php">
		<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" >
		</div>
		<div class="input-group">
		<label>Password</label>
		<input type="text" name="password">
		</div>
		<div class="input-group">
		<button type="submit" class="btn" name="reg_user">Login</button>
		</div>
		<p>
		Make an account:<a href="index.php">Sign Up</a>
		</p>
	</form>
</div>
</body>
</html>
    