<?php
session_start();
$name = $_SESSION["username"];
$matches = $_SESSION["matches"];
$order = $_SESSION["order"];
$rating = $_SESSION["rating"];
//iterates through array of matches
if(end($matches[$rating])==$matches[$rating][$order] && $rating != 0){
    $rating = $rating - 1;
    while(array_key_exists($rating,$matches) == false && $rating >0){
        $rating = $rating - 1;
    }
    $_SESSION["rating"] = $rating;
    $_SESSION["order"] = 0;
}else{
    $_SESSION["order"] = ($order + 1);
}
//if no one is left on the list
if($rating <= 0 ){
    header("Location: End.html");
    exit();
}
header("Location: Match.php");
?>