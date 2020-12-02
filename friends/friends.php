<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Friends</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="../style/stylesheet.css">
</head>

<body>
  <!--JavaScript: jQuery first, then Popper.js, then Bootstrap JS-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <!--Navigation bar (Menu)-->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="../index.html">
        <img src="../img/navbar_logo.png" class="d-inline-block align-center" alt="Logo">
        Only Friends
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../match/MatchMaker.php">Find friends<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../friends/friends.php">My friends<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../chat/chat.php">Public chat<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../dm/dm.php">Direct Messages<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../profile/profile.php">Profile<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <?php
  //Getting user data from database
  $username = $_SESSION["username"];
  echo "<title>$username | Friends</title>";

  $db = new mysqli("localhost", "d46wang", "NobJoov5", "d46wang");
  if ($db->connect_error) {
    echo ("Failed to connect to MySQL: " . $db->connect_error);
    exit();
  }

  //Get list of friends from database and convert it into an array
  $prompt = "SELECT * FROM Login WHERE Username = '$username'"; //replace with where username = friendmatch
  $data = $db->query($prompt);
  $row = mysqli_fetch_row($data);
  $friends = $row[15];
  $friends = explode("|", $friends);
  $friends = array_filter($friends);

  ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <?php
        if (count($friends) > 0) {
          foreach ($friends as $row) {
            $row = explode(' ', $row);
            //For each friend loop through the friendlist
            foreach ($row as $user) {
              //Get friend's personal data to display 
              $prompt = "SELECT * FROM Login WHERE Username LIKE '$user'";
              $data2 = $db->query($prompt);
              $row2 = mysqli_fetch_row($data2);
              $Name = $row2[4];
              $LastName = $row2[5];
              $Gender = $row2[6];
              $PFP = $row2[9];
              $Age = $row2[10];
              $city = $row2[8];
              $city = explode('|', $city);
              $city = $city[2];
              $interests = $row2[13];
              $occupation = $row2[16];
              $bio = $row2[17];
              //profile picture
              if ($PFP == 'defaultpic.png') {
                $PFP = '../img/' . $PFP;
              } else {
                $PFP = '../img/' . $PFP;
              }
              //For each loop, display all these divs in order to create friend profile list
              echo '
            <div class="box-profile">
              <div class="row"> 
                <div class="col-md-4 col-12" align="center">';
              echo "<img src='$PFP' style='object-fit: cover;border: 1px solid black;'class='profilepic'/>
                </div>
                <div class='col-md-8 col-12'>";
              echo "<td><h2 class='h2-profile'>$Name $LastName ($user)</h2></td></tr>";
              echo '<table>
                    <tr>
                      <td class="category">Likes</td>
                      <td class="inputs-profile">' . ucfirst($interests) . '</td>
                    </tr>';
              echo '<tr>
                      <td class="category">Age</td>
                      <td class="inputs-profile">' . $Age . '</td>
                    </tr>';
              echo '<tr>
                      <td class="category">Gender</td>
                      <td class="inputs-profile">' . ucfirst($Gender) . '</td>
                    </tr>';
              echo '<tr>
                      <td class="category">City</td>
                      <td class="inputs-profile">' . $city . '</td>
                    </tr>';
              echo '<tr>
                      <td class="category">Occupation</td>
                      <td class="inputs-profile">' . $occupation . '</td>
                    </tr>';
              echo '<tr>
                      <td class="category">Biography</td>
                      <td class="inputs-profile">
                        ' . $bio . '
                        <br>
                        </td>
                    </tr>';
              echo '</table>
                </div>
              </div>
            </div>';
            }
          }
        } else {
          //If they have no friends, display so
          echo "<p style=text-align:center><b>  NO FRIENDS  </b></p>";
        }
        ?>
      </div>
    </div>
  </div>


</body>

</html>