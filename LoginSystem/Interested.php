<?php
session_start();

$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$name = $_SESSION["username"];
$frienduser = $_SESSION['matchusername'];
//update match list
$prompt = "SELECT * FROM Login WHERE Username='".$name."'";
$data = $db->query($prompt);
$row=mysqli_fetch_row($data);
$mymatch = explode('|',$row[14]);
if(in_array($frienduser,$mymatch) == false){
    $sql = "UPDATE Login SET matches = CONCAT(matches,'".$frienduser."', '|')  WHERE Username='$name'"; 
    mysqli_query($db, $sql);
}

// check if mutual in match list
$prompt2 = "SELECT * FROM Login WHERE Username='".$frienduser."'";
$data2 = $db->query($prompt2);
$row2=mysqli_fetch_row($data2);
$friendarray = explode('|',$row2[15]);
$friendmatch = $row2[14];
if ($friendmatch == ''){
    $friendmatcharray = [];
}else{
    $friendmatcharray = explode('|',$row2[14]);
}

if(in_array($name,$friendmatcharray) && in_array($name,$friendarray) == false){
    $update1 = "UPDATE Login SET friends = CONCAT(friends,'".$frienduser."', '|')  WHERE Username='$name'"; 
    mysqli_query($db, $update1);
    $update2 = "UPDATE Login SET friends = CONCAT(friends,'".$name."', '|')  WHERE Username='$frienduser'"; 
    mysqli_query($db, $update2);
    //update users friends
    //$update1 = "UPDATE Login SET friends='$matchlist' WHERE Username='$name'"; 
    //mysqli_query($db, $update1);
    //update their friends
    //$update2 = "UPDATE Login SET friends='$matchlist' WHERE Username='$frienduser'"; 
    //mysqli_query($db, $update2);

}
mysqli_close($db);
header("Location: NextMatch.php")
?>
