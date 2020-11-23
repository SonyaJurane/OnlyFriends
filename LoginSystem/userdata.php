<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Personal Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="nameverify.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../stylesheet.css">
</head>
<body>
<!--JavaScript: jQuery first, then Popper.js, then Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
$_SESSION['httpreferer'] = $_SERVER['HTTP_REFERER'];
$db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
if ($db -> connect_error) {
    echo ("Failed to connect to MySQL: " . $db -> connect_error);
    exit();
}
$username = $_SESSION["username"];
$prompt = "SELECT * FROM Login WHERE Username = '$username'";
$data = $db->query($prompt);
$row = mysqli_fetch_row($data);
$Name = $row[4];
$LastName =$row[5];
$age = $row[10];
$maxage = $row[12];
$occupation = $row[16];
$maxdistance = $row[11];
if($occupation == 'None'){
    $occupation = ''; 
}
/* echo'
<br><br><br>
<div class="corners1" style="height:auto; width:750px">
	<h1>Create Account</h1>		
	<form name="form" method="post" action="reguserdata.php" onsubmit="return validateForm(event)">
        <h2>My first name is...</h2>
        <div class="input-group">
        <input id="name" type="name" name="name" value="'.$Name.'" required>
        </div>
        <h2>My Last name is...</h2>
        <div class="input-group">
        <input id="lastname" type="lastname" name="lastname" value="'.$LastName.'" required>
        </div>
        <h2>I am from...</h2>
        <div class="input-group">
            <form>
                <select id="city" name="city" required>
                  <option value="" selected disabled hidden>Choose here</option>
                  <option value="44.3894|79.6903|Barrie">Barrie</option>
                  <option value="44.1628|77.3832|Belleville">Belleville	</option>
                  <option value="43.7315|79.7624|Brampton">Brampton</option>
                  <option value="43.1527|80.1716|Brant">Brant	</option>
                  <option value="43.1394|80.2644|Brantford">Brantford</option>
                  <option value="44.5895|75.6843|Brockville">Brockville</option>
                  <option value="43.3255|79.7990|Burlington">Burlington</option>
                  <option value="43.3616|80.3144|Cambridge">Cambridge</option>
                  <option value="45.5509|75.2804|Clarence-Rockland">Clarence-Rockland</option>
                  <option value="45.0213|74.7303|Cornwall">Cornwall</option>
                  <option value="49.7801|92.8370|Dryden">Dryden</option>
                  <option value="46.3862|82.6509|Elliot Lake">Elliot Lake</option>
                  <option value="46.4917|80.9930|Greater Sudbury">Greater Sudbury</option>
                  <option value="43.5448|80.2482|Guelph">Guelph</option>
                  <option value="42.9277|79.8762|Haldimand County">Haldimand County</option>
                  <option value="43.2557|79.8711|Hamilton">Hamilton</option>
                  <option value="44.5337|78.9006|Kawartha Lakes">Kawartha Lakes</option>
                  <option value="49.7670|94.4894|Kenora">Kenora</option>
                  <option value="44.2312|76.4860|Kingston">Kingston</option>
                  <option value="43.4516|80.4925|Kitchener">Kitchener</option>
                  <option value="42.9849|81.2453|London">London</option>
                  <option value="43.8561|79.3370|Markham">Markham</option>
                  <option value="43.5890|79.6441|Mississauga">Mississauga</option>
                  <option value="43.0896|79.0849|Niagara Falls">Niagara Falls</option>
                  <option value="42.7967|80.4136|Norfolk County">Norfolk County</option>
                  <option value="46.3091|79.4608|North Bay">North Bay</option>
                  <option value="44.6082|79.4197|Orillia">Orillia</option>
                  <option value="43.8971|78.8658|Oshawa">Oshawa</option>
                  <option value="45.4215|75.6972|Ottawa">Ottawa</option>
                  <option value="44.5690|80.9406|Owen Sound">Owen Sound</option>
                  <option value="45.8267|77.1109|Pembroke">Pembroke</option>
                  <option value="44.3091|78.3197|Peterborough">Peterborough</option>
                  <option value="43.8384|79.0868|Pickering">Pickering</option>
                  <option value="42.8865|79.2509|Port Colborne">Port Colborne</option>
                  <option value="44.0005|77.2506|Prince Edward County">Prince Edward County</option>
                  <option value="44.1790|77.5861|Quinte West">Quinte West</option>
                  <option value="43.8828|79.4403|Richmond Hill">Richmond Hill</option>
                  <option value="42.9745|82.4066|Sarnia">Sarnia</option>
                  <option value="46.5136|84.3358|Sault Ste. Marie">Sault Ste. Marie</option>
                  <option value="43.1594|79.2469|St. Catharines">St. Catharines</option>
                  <option value="42.7777|81.1827|St. Thomas">St. Thomas</option>
                  <option value="43.3700|80.9822|Stratford">Stratford</option>
                  <option value="47.5037|79.6979|Temiskaming Shores">Temiskaming Shores</option>
                  <option value="Thorold|79.1989|Thorold">Thorold</option>
                  <option value="48.3809|89.2477|Thunder Bay">Thunder Bay</option>
                  <option value="48.4758|81.3305|Timmins">Timmins</option>
                  <option value="43.6532|79.3832|Toronto">Toronto</option>
                  <option value="43.8563|79.5085|Vaughan">Vaughan</option>
                  <option value="43.4643|80.5204|Waterloo">Waterloo</option>
                  <option value="42.9922|79.2483|Welland">Welland</option>
                  <option value="42.3149|83.0364|Windsor">Windsor</option>
                  <option value="43.1315|80.7472|Woodstock">Woodstock</option>
                </select>
        </div>
        <h2>I identify as...</h2>
        <div class="radiobutton">
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
        </div>
        <h2>Looking for...</h2>
        <div class="radiobutton"style="width:140px">
            <input type="radio" id="findmale" name="findgender" value="male" required>
            <label for="findmale">Male Friends</label><br>
            <input type="radio" id="findfemale" name="findgender" value="female">
            <label for="findfemale">Female Friends</label><br>
            <input type="radio" id="findboth" name="findgender" value="both">
            <label for="findboth">Any Friends</label><br>
        </div>
        <h2>        
        <div>
        My Occupation is a <input type="text" id="occupation" name="occupation" value="'.$occupation.'" required> 
        </div>
        </h2>
        <h2>
        <h2>        
        <div>
        I am <input type="number" id="age" name="age" min=10 value="'.$age.'" required> years old
        </div>
        </h2>
        <h2>   
        <div>
        Looking for someone at most <input type="number" id="maxage" name="maxage" min=10 value="'.$maxage.'" required> years old
        </div> 
        <div>
        Preferably looking for some one less than <input type="number" id="maxdistance" name="maxdistance" min=0 value="'.$maxdistance.'" required>Km away
        </div> 
        </h2>
        </h2>
        <h2>My interests are...</h2>
        <div>
        <input type="checkbox" name="interest[]" id="Food" value="Food">
        <label for="Food">Food</label>
        <input type="checkbox" name="interest[]" id="Sports" value="Sports"> 
        <label for="Sports">Sports</label>
        <input type="checkbox" name="interest[]" id="Anime" value="Anime"> 
        <label for="Anime">Anime</label>
        <input type="checkbox" name="interest[]" id="Traveling" value="Traveling"> 
        <label for="Traveling">Traveling</label>
        <input type="checkbox" name="interest[]" id="Politics" value="Politics"> 
        <label for="Politics">Politics</label>
        <input type="checkbox" name="interest[]" id="Art" value="Art"> 
        <label for="Art">Art</label>
        <br>
        <input type="checkbox" name="interest[]" id="Music" value="Music"> 
        <label for="Music">Music</label>
        <input type="checkbox" name="interest[]" id="Cooking" value="Cooking"> 
        <label for="Cooking">Cooking</label>
        <input type="checkbox" name="interest[]" id="Movies" value="Movies"> 
        <label for="Movies">Movies</label>
        <input type="checkbox" name="interest[]" id="Water" value="Water"> 
        <label for="Water">Water</label>
        
        </div>
        <br>
        
        <button type="submit" class="btn" name="reg_user">Register</button>
        
    </form>
    
</div>';*/
?>

<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-12">
    <div class="box-userdata">
      <div class="row">
        <div class="col-sm-12"><h2 class="h2-userdata">Create Profile</h2></div>
      </div>
      <div class="row">
        <div class="col-sm-12"><h3 class="h3-userdata">My info</h3></div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <p class="text-input">First name</p>
            <?php echo'<div class="input-group"><input class="input-userdata" id="name" type="name" name="name" value="'.$Name.'" required></div>'?>
            <p class="text-input">Last name</p>
            <?php echo'<div class="input-group"><input class="input-userdata" id="lastname" type="lastname" name="lastname" value="'.$LastName.'" required></div>'?>
            <p class="text-input">Location</p>
            <?php echo'<div class="input-group">
            <form>
            <select id="city" name="city" required>
              <option value="" selected disabled hidden>Choose here</option>
              <option value="44.3894|79.6903|Barrie">Barrie</option>
              <option value="44.1628|77.3832|Belleville">Belleville	</option>
              <option value="43.7315|79.7624|Brampton">Brampton</option>
              <option value="43.1527|80.1716|Brant">Brant	</option>
              <option value="43.1394|80.2644|Brantford">Brantford</option>
              <option value="44.5895|75.6843|Brockville">Brockville</option>
              <option value="43.3255|79.7990|Burlington">Burlington</option>
              <option value="43.3616|80.3144|Cambridge">Cambridge</option>
              <option value="45.5509|75.2804|Clarence-Rockland">Clarence-Rockland</option>
              <option value="45.0213|74.7303|Cornwall">Cornwall</option>
              <option value="49.7801|92.8370|Dryden">Dryden</option>
              <option value="46.3862|82.6509|Elliot Lake">Elliot Lake</option>
              <option value="46.4917|80.9930|Greater Sudbury">Greater Sudbury</option>
              <option value="43.5448|80.2482|Guelph">Guelph</option>
              <option value="42.9277|79.8762|Haldimand County">Haldimand County</option>
              <option value="43.2557|79.8711|Hamilton">Hamilton</option>
              <option value="44.5337|78.9006|Kawartha Lakes">Kawartha Lakes</option>
              <option value="49.7670|94.4894|Kenora">Kenora</option>
              <option value="44.2312|76.4860|Kingston">Kingston</option>
              <option value="43.4516|80.4925|Kitchener">Kitchener</option>
              <option value="42.9849|81.2453|London">London</option>
              <option value="43.8561|79.3370|Markham">Markham</option>
              <option value="43.5890|79.6441|Mississauga">Mississauga</option>
              <option value="43.0896|79.0849|Niagara Falls">Niagara Falls</option>
              <option value="42.7967|80.4136|Norfolk County">Norfolk County</option>
              <option value="46.3091|79.4608|North Bay">North Bay</option>
              <option value="44.6082|79.4197|Orillia">Orillia</option>
              <option value="43.8971|78.8658|Oshawa">Oshawa</option>
              <option value="45.4215|75.6972|Ottawa">Ottawa</option>
              <option value="44.5690|80.9406|Owen Sound">Owen Sound</option>
              <option value="45.8267|77.1109|Pembroke">Pembroke</option>
              <option value="44.3091|78.3197|Peterborough">Peterborough</option>
              <option value="43.8384|79.0868|Pickering">Pickering</option>
              <option value="42.8865|79.2509|Port Colborne">Port Colborne</option>
              <option value="44.0005|77.2506|Prince Edward County">Prince Edward County</option>
              <option value="44.1790|77.5861|Quinte West">Quinte West</option>
              <option value="43.8828|79.4403|Richmond Hill">Richmond Hill</option>
              <option value="42.9745|82.4066|Sarnia">Sarnia</option>
              <option value="46.5136|84.3358|Sault Ste. Marie">Sault Ste. Marie</option>
              <option value="43.1594|79.2469|St. Catharines">St. Catharines</option>
              <option value="42.7777|81.1827|St. Thomas">St. Thomas</option>
              <option value="43.3700|80.9822|Stratford">Stratford</option>
              <option value="47.5037|79.6979|Temiskaming Shores">Temiskaming Shores</option>
              <option value="Thorold|79.1989|Thorold">Thorold</option>
              <option value="48.3809|89.2477|Thunder Bay">Thunder Bay</option>
              <option value="48.4758|81.3305|Timmins">Timmins</option>
              <option value="43.6532|79.3832|Toronto">Toronto</option>
              <option value="43.8563|79.5085|Vaughan">Vaughan</option>
              <option value="43.4643|80.5204|Waterloo">Waterloo</option>
              <option value="42.9922|79.2483|Welland">Welland</option>
              <option value="42.3149|83.0364|Windsor">Windsor</option>
              <option value="43.1315|80.7472|Woodstock">Woodstock</option>
            </select>
            </form></div>'?>
          </div>
          <div class="col-md-4">
            <p class="text-input">Occupation</p>
            <?php echo'<div class="input-group"><input type="text" id="occupation" name="occupation" value="'.$occupation.'" required></div>'?>
            <p class="text-input">Age</p>
            <?php echo '<div class="input-group"><input class="small-input" type="number" id="age" name="age" min=10 value="'.$age.'" required></div>'?>
            <p class="text-input">Gender</p>
            <?php echo'<div class="input-group"><select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select></div>'?>
          </div>
          <div class="col-md-4">
            <p class="text-input">Interests</p>
            <div>
                <table style="padding-top:0px">
                <tr>
                    <td class="userdata"><input type="checkbox" name="interest[]" id="Food" value="Food"> <label for="Food">Food</label></td>
                    <td class="userdata" style="padding-left:30px"><input type="checkbox" name="interest[]" id="Art" value="Art"> <label for="Art">Art</label></td>
                </tr>
                <tr>
                    <td class="userdata"><input type="checkbox" name="interest[]" id="Sports" value="Sports"> <label for="Sports">Sports</label></td>
                    <td class="userdata" style="padding-left:30px"><input type="checkbox" name="interest[]" id="Music" value="Music"> <label for="Music">Music</label></td>
                </tr>
                <tr>
                    <td class="userdata"><input type="checkbox" name="interest[]" id="Anime" value="Anime"> <label for="Anime">Anime</label></td>
                    <td class="userdata" style="padding-left:30px"><input type="checkbox" name="interest[]" id="Cooking" value="Cooking"> <label for="Cooking">Cooking</label></td>
                </tr>
                <tr>
                    <td class="userdata"><input type="checkbox" name="interest[]" id="Traveling" value="Traveling"> <label for="Traveling">Traveling</label></td>
                    <td class="userdata" style="padding-left:30px"><input type="checkbox" name="interest[]" id="Movies" value="Movies"> <label for="Movies">Movies</label></td>
                </tr>
                <tr>
                    <td class="userdata"><input type="checkbox" name="interest[]" id="Politics" value="Politics"> <label for="Politics">Politics</label></td>
                    <td class="userdata" style="padding-left:30px"><input type="checkbox" name="interest[]" id="Water" value="Water"> <label for="Water">Water</label></td>
                </tr>
                </table>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-sm-12"><h3 class="h3-userdata">I am looking for...</h3></div>
      </div>
      <div class="row">
        <div class="col-md-4">  
            <div class="text-input">
                Someone <?php echo '<input class="small-input" type="number" id="maxage" name="maxage" min=10 value="'.$maxage.'" required>' ?> years old at most
            </div> 
        </div>
        <div class="col-md-4">
            <div class="text-input">
                Preferably less than <?php echo '<input class="small-input" type="number" id="maxdistance" name="maxdistance" min=0 value="'.$maxdistance.'" required' ?> km away
            </div> 
        </div>
        <div class="col-md-4">
            <div class="text-input">
                Who is <?php echo '<select id="gender" name="gender" required>
                <option id="findmale" name="findgender" value="male">Male</option>
                <option id="findfemale" name="findgender" value="female">Female</option>
                <option vid="findboth" name="findgender" value="both">Any gender</option>
                </select>'?>
            </div> 
        </div>

      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>
    