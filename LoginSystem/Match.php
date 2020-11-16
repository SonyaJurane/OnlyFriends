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
<?php
$name = $_SESSION["username"];
$matches = $_SESSION["matches"];
$order = $_SESSION["order"];
$rating = $_SESSION["rating"];
echo $rating;
echo $order;
echo sizeof($matches[$rating]);
print_r($matches);
$match = $matches[$rating][$order];
$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$prompt = "SELECT * FROM Login WHERE Username LIKE '$match'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
$Name = $row[4];
$Gender = $row[5];
$PFP = $row[8];
$Age = $row[9];
echo "<br>";
//profile picture
if ($PFP == 'defaultpic.png'){
    $PFP = 'ProfilePic/'.$PFP;
}

echo "<img src='$PFP' class='rounded-circle' style='display: block; margin-left: auto;margin-right: auto;width:400px;height:400px;'alt='profile'/>";
echo "<div class='h1' style='text-align:center;'>$Name</div>";
//information table
?>
<a class="btn btn-primary" href="NextMatch.php" role="button">NEXT</a>