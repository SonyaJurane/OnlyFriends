<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<script type="text/javascript" src="passverify.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="../stylesheet.css">
</head>
<body class="bg-homepage">

<!--JavaScript: jQuery first, then Popper.js, then Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!--Navigation bar (Menu)-->
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="">
    <img src="navbar_logo.png" class="d-inline-block align-center" alt="Logo">
    Only Friends
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="signup.php">Sign up <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Log in <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About us <span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
</nav>
</div>

<div class="container">
	<div class="row justify-content-center">
        <div class="col-sm-6">

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

			<div class="jumbotron">

				<h2 class="signup-h2">Sign up</h2>	

				

				<form name="form" method="post" action="register.php" onsubmit="return validateForm()">
					<div class="form-group">
						<label class="signup-label">Username</label>
						<input type="text" name="username" minlength="4" maxlength="16">
					</div>
					<div class="form-group">
						<label class="signup-label">Email</label>
						<input type="email" name="email" >
					</div>
						<div class="form-group">
						<label id="pw" class="signup-label">Password</label>
						<input type="password" name="password"minlength="4" maxlength="16">
					</div>
					<div class="form-group">
						<label class="signup-label">Confirm password</label>
						<input type="password" name="password2">
					</div>
					<button type="submit" class="btn" name="reg_user">Register</button>
					<p>Already a member? <a href="login.php">Sign in</a></p>			
				</form>
				
			</div>

		</div>
	</div>

</div>


</body>
</html>
    
