<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Public Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="chat.css">

    <?php
    $username = $_SESSION["username"];
    $db = new mysqli("localhost", "id15483164_memberdb","@NV(G4!f0KbtMO/<","id15483164_members");
    if ($db -> connect_error) {
        echo ("Failed to connect to MySQL: " . $db -> connect_error);
        exit();
    }
    $prompt = "SELECT * FROM Login WHERE Username LIKE '$username'";
    $data = $db->query($prompt);
    $row = mysqli_fetch_row($data);
    $FirstName = $row[4];
    $LastName =$row[5];
    $FullName = $FirstName . " " . $LastName;
    ?>
    <script type="text/javascript" src="messages.js"></script>

</head>
<body>
<!--JavaScript: jQuery first, then Popper.js, then Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--Navigation bar (Menu)-->
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="../LoginSystem/index.html">
    <img src="../navbar_logo.png" class="d-inline-block align-center" alt="Logo">
    Only Friends
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../LoginSystem/MatchMaker.php">Find friends<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../friends/friends.php">My friends<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../chat/index.php">Public chat<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../dm/index.php">Direct Messages<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="../LoginSystem/profile.php">Profile<span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
</nav>
</div>
<div class="container">
<div class="row">
    <div class="col-12">
        <div id="messages"></div>
        <form>
            <input type="text" id="message" autocomplete="off" autofocus placeholder="Type message...">
            <input type="submit" value="Send">
        </form>
    </div>
</div>
</div>
</body>
</html>
