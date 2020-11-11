<?php
$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}

$username = $_POST['username'];
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