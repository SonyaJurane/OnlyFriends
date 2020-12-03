<?php
session_start();

$db = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
if ($db->connect_error) {
    echo ("Failed to connect to MySQL: " . $db->connect_error);
    exit();
}
$name = $_SESSION["username"];
//get preference data of user
$prompt = "SELECT * FROM Login WHERE Username = '$name'";
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
$commandText = "SELECT * FROM Login WHERE Username != '$name'";
$result = $db->query($commandText);
if ($result) {
    //retrieve data from all users 
    while ($row = mysqli_fetch_row($result)) {
        $rating = 0;
        $FriendUsername = $row[1];
        $FriendGender = $row[6];
        $FriendPreference = $row[7];
        $FriendCity = $row[8];
        $FriendAge = $row[10];
        $FriendMaxdistance = $row[11];
        $FriendMaxage = $row[12];
        $FriendInterest = $row[13];

        if ($FriendGender == Null) {
            continue;
        }
        //gender
        if ($preference == 'both') {
            if ($FriendPreference == 'both') {
                $rating++;
            } else if ($FriendPreference == $Gender) {
                $rating++;
            }
        } else if ($preference == $FriendGender) {
            if ($FriendPreference == 'both') {
                $rating++;
            } else if ($FriendPreference == $Gender) {
                $rating++;
            }
        } else {
            if ($FriendPreference == 'both') {
                $rating++;
            } else if ($FriendPreference == $Gender) {
                $rating++;
            }
        }
        //calculate prefered distance
        $lonlan = explode('|', $city);
        $friendlonlan = explode('|', $FriendCity);
        $lat = $lonlan[0];
        $lon = $lonlan[1];
        $Friendlat = $friendlonlan[0];
        $Friendlon = $friendlonlan[1];
        $distance = calculateDistance($lat, $lon, $Friendlat, $Friendlon);
        if ($distance < $maxdistance) {
            $rating++;
        }
        //age preference
        if ($age < $FriendMaxage && $FriendAge < $maxage) {
            $rating++;
        }
        //matching interests
        $userlist = explode('|', $interest);
        $friendlist = explode('|', $FriendInterest);
        $intersect = array_intersect($userlist, $friendlist);

        $rating += sizeof($intersect);

        //set start of matching array
        if ($highestrate < $rating) {
            $highestrate = $rating;
        }

        if (isset($matches[$rating])) {
            array_push($matches[$rating], $FriendUsername);
        } else {
            $matches[$rating] = [$FriendUsername];
        }
    }
    // sort array of matches depending on rating
    ksort($matches);
    $matches = array_reverse($matches, true);
    $_SESSION["matches"] = $matches;
    $_SESSION["rating"] = $highestrate;
    $_SESSION["order"] = 0;
    mysqli_close($db);
}
?>
<script>
    location.replace("Match.php");
</script>