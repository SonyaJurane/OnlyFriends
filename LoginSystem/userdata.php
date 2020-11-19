<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Personal Information</title>
    <link rel="stylesheet" href="assignment.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="nameverify.js"></script>
</head>
<?php
$_SESSION['httpreferer'] = $_SERVER['HTTP_REFERER'];
?>
<body>
<br><br><br>
<div class="corners1" style="height:auto; width:750px">
	<h1>Create Account</h1>		
	<form name="form" method="post" action="reguserdata.php" onsubmit="return validateForm(event)">
        <h2>My first name is...</h2>
        <div class="input-group">
        <input id="name" type="name" name="name" required>
        </div>
        <h2>My Last name is...</h2>
        <div class="input-group">
        <input id="lastname" type="lastname" name="lastname" required>
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
        I am <input type="number" id="age" name="age" min=10 required> years old
        </div>
        </h2>
        <h2>   
        <div>
        Looking for someone at most <input type="number" id="maxage" name="maxage" min=10 requiredrequired> years old
        </div> 
        <div>
        Preferably looking for some one less than <input type="number" id="maxdistance" name="maxdistance" min=0 required>Km away
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
    
</div>
</body>
</html>
    