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
$Gender = $row[6];
$preference = $row[7];
$city = $row[8];
$age = $row[10];
$maxdistance = $row[11];
$maxage = $row[12];
$interest = $row[13];
include 'distance.php';
$matches = [];
$highestrate = 0;
$commandText = "SELECT * FROM Login WHERE Username NOT LIKE '$name'";
$result = $db->query($commandText);
if ($result) {
    while ($row = mysqli_fetch_row($result)){
        $rating = 0;
        $FriendUsername = $row[1];
        $FriendGender = $row[6];
        $FriendPreference = $row[7];
        $FriendCity = $row[8];
        $FriendAge = $row[10];
        $FriendMaxdistance = $row[11];
        $FriendMaxage = $row[12];
        $FriendInterest = $row[13];
        //gender

        if ($preference == 'both'){
            if($FriendPreference == 'both'){
                $rating++;
            }else if($FriendPreference == $Gender){
                $rating++;
            }
        }else if($preference == $FriendGender){
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
        //calculate prefered distance
        $lonlan = explode('|',$city);
        $friendlonlan = explode('|',$FriendCity);
        $lat = $lonlan[0];
        $lon = $lonlan[1];
        $Friendlat = $friendlonlan[0];
        $Friendlon = $friendlonlan[1];
        $distance = calculateDistance($lat,$lon,$Friendlat,$Friendlon);
        if($distance < $maxdistance){
            $rating++;
        }
        //age preference
        if($age < $FriendMaxage && $FriendAge < $maxage){
            $rating++;
        }
        if($interest == $FriendInterest){
            $rating++;
        }
        if($highestrate < $rating){
            $highestrate = $rating;
        }
        if(isset($matches[$rating])){
            array_push($matches[$rating], $FriendUsername);
        }else{
            $matches[$rating] = [$FriendUsername];
        }

        
    }
    ksort($matches);
    $matches = array_reverse($matches, true);
    $_SESSION["matches"] = $matches;
    $_SESSION["rating"] = $highestrate;
    $_SESSION["order"] = 0;

}
?>
 <script> location.replace("Match.php"); </script>