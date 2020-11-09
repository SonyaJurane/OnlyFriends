<?php
$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$commandText = "SELECT Username, Email FROM Login";
$result = $db->query($commandText);
if ($result) {
    while ($row = mysqli_fetch_row($result)){
        $dbname = $row[0];
        $dbemail = $row[1];
        if ($email==$dbemail) {
        $sql="INSERT INTO Error (Message)". " VALUES ('Email has already been used')";
            if(mysqli_query($db, $sql)){
                header("Location: index.php");
                mysqli_close($db);
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }
        }elseif($username ==$dbname){
        $sql="INSERT INTO Error (Message)". " VALUES ('Username already taken')";
            if(mysqli_query($db, $sql)){
                header("Location: index.php");
                mysqli_close($db);
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }
        }
    }
    $sql="INSERT INTO Login (Username, Password, Email)". " VALUES ('$username','$password','$email')";
    if(mysqli_query($db, $sql)){
        header("Location: userdata.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
        mysqli_close($db);
}

?>