<?php
session_start();
$target_dir = "../ProfilePic/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$username = $_SESSION['username'];
$db = new mysqli("localhost", "id15483164_memberdb","@NV(G4!f0KbtMO/<","id15483164_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && $_FILES["fileToUpload"]["tmp_name"] != '') {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 800000) {
  echo "<script type='text/javascript'>
  alert('Sorry, your file is too large.');
  window.location.href = 'http://only-friends.000webhostapp.com/LoginSystem/profile.php'; 
  </script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("Location: profile.php");
    exit();
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql="UPDATE Login SET ProfilePic='$target_file' WHERE Username='$username'";
    mysqli_query($db, $sql);
    if(mysqli_query($db, $sql)){
        header("Location: profile.php");
        exit();
    } else{
        header("Location: profile.php");
        exit();
    }
        mysqli_close($db);
  }
}
?>