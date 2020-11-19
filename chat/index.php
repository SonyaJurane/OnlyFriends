<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Public Chat</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="chat.css">
    <?php
    $username = $_SESSION["username"];
    $db = new mysqli("localhost", "id15345354_memberdb","CPS530Group123-","id15345354_members");
    if ($db -> connect_error) {
        echo ("Failed to connect to MySQL: " . $db -> connect_error);
        exit();
    }

    $prompt = "SELECT * FROM Login WHERE Username LIKE '$username'";
    $data = $db->query($prompt);
    $row = mysqli_fetch_row($data);
    $FirstName = $row[4];
    $LastName =$row[5];
    $FullName = $FirstName . " " . $LastName;
    ?>
    <script>
        var from=null, start = 0, url = "https://onlyfriendspage.000webhostapp.com/chat/chat.php";
        $(document).ready(function(){
            from = "<?php echo $FullName ?>";
            //load() UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS
            //COMMENT BELOW THIS OUT IF WANT INSTANT MESSAGING
            setInterval(function () {
            load();
            //}, 1500); //1.5 seconds
            //}, 1000000); //17 minutes
            }, 1000 ); //3 hours
            //COMMENT ABOVE THIS OUT IF WANT INSTANT MESSAGING (It'll max out a free database quick tho)
            $('form').submit(function(e){
                $.post(url, {message: $('#message').val(),
                from: from
                });
                $('#message').val("")
                return false;
            }) 
        });

        function load(){
            $.get(url + '?start=' +start, function(result){
                if(result.items){
                    result.items.forEach(item =>{
                      start = item.id;
                      $('#messages').append(renderMessage(item));
                    });
                    $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
                };
                //load(); UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS NOT RECOMMENDED
            });
        }

        function renderMessage(item){
            let time = new Date(item.created);
            time.setHours(time.getHours()-5);
            time = `${time.getHours()}:${time.getMinutes() < 10? '0' :''}${time.getMinutes()}`;
            if (item.from == "<?php echo $FullName ?>")
            {
                return `<div class="msg msguser"><p>${item.from}</p>${item.message} <span>${time}</span></div>`;
            }
            else
            {
                return `<div class="msg"><p>${item.from}</p>${item.message} <span>${time}</span></div>`;
            }
        }
    </script>

</head>
<body>
    <div id="messages"></div>
    <form>
        <input type="text" id="message" autocomplete="off" autofocus placeholder="Type message...">
        <input type="submit" value="Send">
    </form>
</body>
</html>
