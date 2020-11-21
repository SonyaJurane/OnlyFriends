<?php
session_start();

$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if($db->connect_error){
    die("Connection Failed: " . $db->connect_error);
}
$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;

if(!empty($message) && !empty($from)){
    $sql = "INSERT INTO `chat` (`message`, `from`) VALUES ('".$message."','".$from."')";
    $result['send_status'] = $db->query($sql);
}

//print messages
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$items = $db->query("SELECT * FROM `chat` WHERE `id` >" .$start);
while($row = $items->fetch_assoc()){
    $result['items'][] = $row;
}
$db->close();

header('Access-Control-Allow-Orgin: *');
header('Content-Type: application/json');

echo json_encode($result);
?>