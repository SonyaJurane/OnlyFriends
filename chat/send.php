<?php

//Getting info from database
$db = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}
//Checking if message exists, if it doesn't, create it
$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;

//If message exists and is not empty, insert into database
if (!empty($message) && !empty($from)) {
    $sql = "INSERT INTO `chat` (`message`, `from`) VALUES ('" . $message . "','" . $from . "')";
    $result['send_status'] = $db->query($sql);
}

//print messages by looping through entire database
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$items = $db->query("SELECT * FROM `chat` WHERE `id` >" . $start);
while ($row = $items->fetch_assoc()) {
    $result['items'][] = $row;
}
$db->close();

header('Access-Control-Allow-Orgin: *');
header('Content-Type: application/json');

echo json_encode($result);
