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
    <a class="navbar-brand" href="">
    <img src="../navbar_logo.png" class="d-inline-block align-center" alt="Logo">
    Only Friends
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="./MatchMaker.php">Find friends<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Feed<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">My friends<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Public chat<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Direct Messages<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
</nav>
</div>

<?php
$name = $_SESSION["username"];
$matches = $_SESSION["matches"];
$order = $_SESSION["order"];
$rating = $_SESSION["rating"];

$match = $matches[$rating][$order];
$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}

$prompt = "SELECT * FROM Login WHERE Username = '$match'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
$Name = $row[4];
$LastName = $row[5];
$Gender = $row[6];
$PFP = $row[9];
$Age = $row[10];
$city = $row[8];
$city = explode('|',$city);
$city = $city[2];
$interests = $row[13];
$occupation = $row[16];
$bio = $row[17];
if($bio == ''){
    $bio = 'Biography not written yet';
}
if($interests == ''){
    $interests = 'none';
}
echo "<br>";
$_SESSION['matchusername'] =$row[1];
//profile picture
if ($PFP == 'defaultpic.png'){
    $PFP = '../ProfilePic/'.$PFP;
}else{
    $PFP = '../'.$PFP;
}

?>


<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-12">
    <div class="box-profile">
      <div class="row"> 
        <div class="col-md-4 col-12" align="center">
          <?php echo "<img src='$PFP' style='object-fit: cover;'class='profilepic'/>"; ?>
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
            <td class="inputs-profile">
              '.$bio.'
              <br>
              </td>
          </tr>';
          echo '
          </table>';
          ?>
            <br><br>
            <a class="btn btn-danger" style="margin-right: 15px;line-height: 40px; width: 160px"href="NextMatch.php" role="button">NEXT</a>
            <a class="btn btn-success" style="line-height: 40px; width: 160px" href="../Interested.php" role="button">Interested</a>


        </div>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>