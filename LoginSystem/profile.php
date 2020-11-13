<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body style='background-color: DodgerBlue; text-align:center'>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
<a href="MatchMaker.php">test matchmaker page</a>;
<?php
$name = $_SESSION["username"];
echo "<title>$name | Profile</title>";

$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}

$prompt = "SELECT * FROM Login WHERE Username LIKE '$name'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
$Name = $row[4];
$Gender = $row[5];
$PFP = $row[8];
$Age = $row[9];
$maxdistance = $row[10];
$maxage = $row[11];
$interests = $row[12];
echo "<br>";
//profile picture
if ($PFP == 'defaultpic.png'){
    $PFP = 'ProfilePic/'.$PFP;
}

echo "<img src='$PFP' class='rounded-circle' style='display: block; margin-left: auto;margin-right: auto;width:400px;height:400px;border: 2px solid black;'alt='profile'/>";
echo "<div class='h1' style='text-align:center;'>$name</div>";
//information table
echo '<table style = "border: 1px solid black;font-size: 32px;	text-align: center;" width = "1000px" cellpadding="15" border="0" align="center">';
?>
<!-- change image -->
<form action="uploadimage.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<?php
echo '<br><br><tr>
<td><b><u>Likes</u></b></td>
<td><b><u>Age</u></b></td>
<td><b><u>Gender</u></b></td>
</tr>';
echo '<tr>
<td>'.ucfirst($interests).'</td>
<td>'.$Age.'</td>
<td>'.ucfirst($Gender).'</td>
</tr>';
echo '<tr>
<td><b><u>Maximum Distance</u></b></td>
<td> </td>
<td><b><u>Maximum Age</u></b></td>
</tr>';
echo '<tr>
<td>'.$maxdistance.' km </td>
<td> </td>
<td>'.$maxage.'</td>
</tr>
</table>';

?>
</body>
</html> 