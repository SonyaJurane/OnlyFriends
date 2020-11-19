<?php
session_start();

$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$name = $_SESSION["username"];
$frienduser = $_SESSION['matchusername'];
$prompt = "SELECT * FROM Login WHERE Username LIKE '$name'";
$data  = $db->query($prompt);
$row = mysqli_fetch_row($data);
$matchlist = $row[15];
if (is_null($matchlist)){
    $matchlist = $frienduser;
}else{
    echo 'pog';
    $matchlist .= $frienduser.'|';
}
//update match list
$sql = "UPDATE Login SET matches='$matchlist' WHERE Username='$name'"; 
mysqli_query($db, $sql);

// check if mutual in match list
$prompt2 = "SELECT * FROM Login WHERE Username LIKE '$frienduser'";
$data2  = $db->query($prompt2);
$row2 = mysqli_fetch_row($data2);
$friendmatch = $row[15];
if (is_null($friendmatch)){
    $friendmatcharray = [];
}else{
    $friendmatcharray = explode('|',$row2[15]);
}
if(in_array($name,$friendmatcharray)){
    $friendlist = $row[16];
    $friendsfriendlist = $row2[16];
    if (is_null($friendlist)){
        $friendlist = $frienduser;
    }else{
        $friendlist .= $frienduser.'|';
    }
    if (is_null($friendsfriendlist)){
        $friendsfriendlist = $name;
    }else{
        $friendsfriendlist .= $name.'|';
    }
    //update users friends
    $update1 = "UPDATE Login SET friends='$matchlist' WHERE Username='$name'"; 
    mysqli_query($db, $update1);
    //update their friends
    $update2 = "UPDATE Login SET friends='$matchlist' WHERE Username='$frienduser'"; 
    mysqli_query($db, $update2);

}
mysqli_close($db);
header("Location: NextMatch.php")
?>
