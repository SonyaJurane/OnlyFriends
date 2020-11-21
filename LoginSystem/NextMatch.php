<?php
session_start();
$name = $_SESSION["username"];
$matches = $_SESSION["matches"];
$order = $_SESSION["order"];
$rating = $_SESSION["rating"];
if(end($matches[$rating])==$matches[$rating][$order] && $rating != 0){
    $_SESSION["rating"] = $rating - 1;
    while(!isset($matches[$rating])){
        $_SESSION["rating"] = $rating - 1;
    }
    $_SESSION["order"] = 0;
}else{
    $_SESSION["order"] = ($order + 1);
}
if($rating == 1 && sizeof($matches[$rating]) >= $order){
    echo "you have reached the end of the list";
    header("Location: signup.php");
}
header("Location: Match.php");
?>