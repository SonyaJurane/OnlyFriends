<?php
session_start();

$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$name = $_SESSION["username"];
//get preference data
//age 
$prompt = "SELECT * FROM Login WHERE Username LIKE '$name'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
$Username = $row[1];
$Gender = $row[5];
$preference = $row[6];
$city = $row[7];
$maxdistance = $row[10];
$maxage = $row[11];

include 'distance.php';
$matches = [];
$commandText = "SELECT * FROM Login WHERE Username NOT LIKE '$name'";
$result = $db->query($commandText);
if ($result) {
    while ($row == mysqli_fetch_row($result)){
        $rating = 0;
        $Friend = [1,$row];
        $FriendUsername = $row[1];
        $FreindGender = $row[5];
        $FriendPreference = $row[6];
        $FreindCity = $row[7];
        $FriendAge = $row[9];
        $FriendMaxdistance = $row[10];
        $FriendMaxage = $row[11];
        
        //gender
        if ($preference == 'both'){
            if($FriendPreference == 'both'){
                $rating++;
            }else if($FriendPreference == $Gender){
                $rating++;
            }
        }else if(($preference == $FriendGender)){
            if($FriendPreference == 'both'){
                $rating++;
            }else if($FriendPreference == $Gender){
                $rating++;
            }
        }else{
            if($FriendPreference == 'both'){
                $rating++;
            }else if($FriendPreference == $Gender){
                $rating++;
            }
        }
        //insert preferences calculation
        if($rating ==1){
            print_r($row);
        }
        if (1>1){
            pass;
        }
        if (1>1){
            pass;
        }
        if (1>1){
            pass;
        }
        if (1>1){
            pass;
        }
        if (1>1){
            pass;
        }
        
        
    }

}
?>
