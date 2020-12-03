<?php
session_start();
ob_start();
?>
<?php
$username = $_SESSION['username'];
$db = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
if ($db->connect_error) {
    echo ("Failed to connect to MySQL: " . $db->connect_error);
    exit();
}
$prompt = "SELECT * FROM Login WHERE Username = '$username'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
//If the user does not have anything in db already, set it as a default, else use the data that user gives
if ($row[9] == Null) {
    $profilepic = 'defaultpic.png';
    $matches = '';
    $friends = '';
    $occupation = 'None';
    $bio = '';
} else {
    $profilepic = $row[9];
    $matches = $row[14];
    $friends = $row[15];
    $occupation = $row[16];
    $bio = $row[17];
}

//Getting user values from session
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$city = $_POST['city'];
$age = $_POST['age'];
$maxage = $_POST['maxage'];
$gender = $_POST['gender'];
$findgender = $_POST['findgender'];
$maxdistance = $_POST['maxdistance'];
$i = $_POST['interest'];
//Creating an array of the user's interest list
if ($i == '') {
    $interestList = $i;
} else {
    $interestlist = implode("|", $i);
}
$occupation = $_POST['occupation'];

//Update the database with the values that user entered
$sql = "UPDATE Login SET Names='$name', LastName='$lastname', Gender='$gender', Preference='$findgender', City='$city',ProfilePic='$profilepic', Age='$age',maxdistance='$maxdistance', maxage='$maxage', interests='$interestlist', matches='$matches', friends='$friends', occupation='$occupation', bio='$bio' WHERE Username='$username'";
//Redirect user where they came from
if (mysqli_query($db, $sql) && $_SESSION['httpreferer'] == "http://webdev.scs.ryerson.ca/~d46wang/register/signup.php") {
    header("Location: ../login/login.php");
    mysqli_close($db);
    exit();
} else if (mysqli_query($db, $sql) && $_SESSION['httpreferer'] == "http://webdev.scs.ryerson.ca/~d46wang/profile/profile.php") {

    header("Location: ../profile/profile.php");
    mysqli_close($db);
    exit();
} else {
    //Error message
    echo $_SESSION['httpreferer'];
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
mysqli_close($db);
?>