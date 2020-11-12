<?php
session_start();
ob_start();
?>
<?php
$username = $_SESSION['username'];
$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$name = $_POST['name'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$findgender = $_POST['findgender'];

$sql="UPDATE Login SET Names='$name', Gender='$gender', Preference='$findgender', City='$city' WHERE Username='$username'";
if(mysqli_query($db, $sql)){
    header("Location: login.php");
    mysqli_close($db);
    exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
    mysqli_close($db);
?>