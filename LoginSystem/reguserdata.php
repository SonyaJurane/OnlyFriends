<?php
session_start();
ob_start();
?>
<?php
$username = $_SESSION['username'];
$db = new mysqli("localhost", "id15483164_memberdb","@NV(G4!f0KbtMO/<","id15483164_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$city = $_POST['city'];
$age = $_POST['age'];
$maxage = $_POST['maxage'];
$gender = $_POST['gender'];
$findgender = $_POST['findgender'];
$maxdistance = $_POST['maxdistance'];
$i =$_POST['interest'];
if($i == ''){
    $interestList = $i;
}else{
    $interestlist = implode("|",$i);
}
$occupation = $_POST['occupation'];

$sql="UPDATE Login SET Names='$name', LastName='$lastname', Gender='$gender', Preference='$findgender', City='$city', Age='$age',maxdistance='$maxdistance', maxage='$maxage', interests='$interestlist', occupation='$occupation' WHERE Username='$username'";
echo $_SESSION['httpreferer'];
if(mysqli_query($db, $sql) && $_SESSION['httpreferer'] == "https://onlyfriendspage.000webhostapp.com/LoginSystem/signup.php"){
    header("Location: login.php");
    mysqli_close($db);
    exit();
}
else if(mysqli_query($db, $sql) && $_SESSION['httpreferer'] == "https://onlyfriendspage.000webhostapp.com/Login/System/profile.php"){
    header("Location: profile.php");
    mysqli_close($db);
    exit();
} 
else{
    echo $_SESSION['httpreferer'];
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
    mysqli_close($db);
?>