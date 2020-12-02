<?php
session_start();

//Getting messages from database
$db = new mysqli("localhost", "d46wang", "NobJoov5", "d46wang");
if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}

//Checking validity of message
$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$sender = isset($_POST['sender']) ? $_POST['sender'] : null;
$recipient = isset($_POST['recipient']) ? $_POST['recipient'] : null;
$username =  $_SESSION["username"];
//If the message exists and is valid, insert into the database
if (!empty($message) && !empty($sender)) {
    $sql = "INSERT INTO `dm` (`message`, `sender`, `recipient`) VALUES ('$message', '$sender', '$recipient');";
    $result['send_status'] = $db->query($sql);
}

//($var > 2 ? echo "greater" : echo "smaller") is an ex of what below does
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
//$items = $db->query("SELECT * FROM `dm` WHERE sender = '$username' >" .$start);
$items = $db->query("SELECT * FROM `dm` WHERE `id` >" . $start);

//Looping through database and getting items to print
while ($row = $items->fetch_assoc()) {
    $result['items'][] = $row;
}
$db->close();

header('Access-Control-Allow-Orgin: *');
header('Content-Type: application/json');

echo json_encode($result);
