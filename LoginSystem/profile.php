<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../stylesheet.css">
</head>
<body>
<!--JavaScript: jQuery first, then Popper.js, then Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!--Navigation bar (Menu)-->
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.html">
    <img src="../navbar_logo.png" class="d-inline-block align-center" alt="Logo">
    Only Friends
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="MatchMaker.php">Find friends<span class="sr-only">(current)</span></a>
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
            <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
</nav>
</div>

<?php
$username = $_SESSION["username"];
echo "<title>$username | Profile</title>";

$db = new mysqli("localhost", "id15483164_memberdb","@NV(G4!f0KbtMO/<","id15483164_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}

$prompt = "SELECT * FROM Login WHERE Username = '$username'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
$Name = $row[4];
$LastName =$row[5];
$Gender = $row[6];
$PFP = $row[9];
$Age = $row[10];
$city = $row[8];
$city = explode('|',$city);
$city = $city[2];
$maxage = $row[12];
$interests = $row[13];
$occupation = $row[16];
$bio = $row[17];
echo "<br>";
//profile picture
if ($PFP == 'defaultpic.png'){
    $PFP = '../ProfilePic/'.$PFP;
}else{
    $PFP = '../'.$PFP;
}

//echo "<img src='$PFP' class='rounded-circle' style='display: block; margin-left: auto;margin-right: auto;width:400px;height:400px;border: 2px solid black;'alt='profile'/>";
//echo "<div class='h1' style='text-align:center;'>$Name $LastName</div>";
//information table
//echo '<table style = "border: 1px solid black;font-size: 32px;	text-align: center;" width = "1000px" cellpadding="15" border="0" align="center">';
?>


<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-12">
    <div class="box-profile">
      <div class="row"> 
        <div class="col-md-4 col-12" align="center">
          <?php echo "<img src='$PFP' style='object-fit: cover;border: 1px solid black;'class='profilepic'/>"; ?>
        </div>
        <div class="col-md-8 col-12">
          <?php echo "<h2 class='h2-profile'>$Name $LastName</h2>"; ?>
          <?php
          echo '<table>
          <tr>
            <td class="category">Likes</td>
            <td class="inputs-profile">'.ucfirst($interests).'</td>
          </tr>';
          echo '<tr>
            <td class="category">Age</td>
            <td class="inputs-profile">'.$Age.'</td>
          </tr>';
          echo '<tr>
            <td class="category">Gender</td>
            <td class="inputs-profile">'.ucfirst($Gender).'</td>
          </tr>';
          echo '<tr>
            <td class="category">City</td>
            <td class="inputs-profile">'.$city.'</td>
          </tr>';
          echo '<tr>
            <td class="category">Occupation</td>
            <td class="inputs-profile">'.$occupation.'</td>
          </tr>';
          echo '<tr>
            <td class="category">Biography</td>
            <td class="inputs-profile"><form action="updatebio.php" method="post">
              <textarea rows="5" cols="50" maxlength="300" name="bio">
              '.$bio.'
              </textarea>
              <br>
              <input class="button-profile" type="submit" value="Change" name="submit">
              </form></td>
          </tr>';
          echo '
          </table>
          <a href="userdata.php">EDIT</a>';
          ?>
          <!-- change image -->
          <form action="uploadimage.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input class="button-profile" type="submit" value="Upload Image" name="submit">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>


</body>
</html>