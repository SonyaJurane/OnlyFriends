<?php
session_start();
?>
<?php
$username = $_SESSION['username'];
$db = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
if ($db->connect_error) {
    echo ("Failed to connect to MySQL: " . $db->connect_error);
    exit();
}
$bio = $_POST['bio'];
$sql = "UPDATE Login SET bio='$bio' WHERE Username='$username'";
mysqli_query($db, $sql);
header("Location: profile.php");
mysqli_close($db);
?>
