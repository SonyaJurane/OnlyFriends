<?php
session_start();
$db = new mysqli("localhost", "id15483164_memberdb","@NV(G4!f0KbtMO/<","id15483164_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}

$username = $_POST['username'];
$_SESSION['username'] = $username;
$password = $_POST['password'];
$commandText = "SELECT Username, Password FROM Login";
$result = $db->query($commandText);
if ($result) {
    while ($row = mysqli_fetch_row($result)){
        $name = $row[0];
        $pass = $row[1];
        if ($name==$username and $password == $pass) {
            header("Location: profile.php");
            mysqli_close($db);
            exit();
        }
    }
    $sql="INSERT INTO Error (Message)". " VALUES ('Invalid username or password')";
    if(mysqli_query($db, $sql)){
        header("Location: login.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}
mysqli_close($db);
?>