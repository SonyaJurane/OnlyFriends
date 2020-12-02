<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Direct Messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../style/stylesheet.css">
    <link rel="stylesheet" href="../style/dm.css">

    <?php
    $username = $_SESSION["username"];
    $db = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");
    if ($db->connect_error) {
        echo ("Failed to connect to MySQL: " . $db->connect_error);
        exit();
    }

    //Get user's personal information from database
    $prompt = "SELECT * FROM Login WHERE Username LIKE '$username'";
    $data = $db->query($prompt);
    $row = mysqli_fetch_row($data);
    $FirstName = $row[4];
    $LastName = $row[5];
    $FullName = $FirstName . " " . $LastName;

    //Getting friendlist and converting it into an array
    $friends = $row[15];
    $friends = explode("|", $friends);
    $friends = array_filter($friends);
    ?>
    <script>
        //dm code based on microcode
        var from = null,
            receiver = null,
            start = 0,
            url = "http://webdev.scs.ryerson.ca/~d46wang/dm/send.php";
        $(document).ready(function() {
            $('th').on('click', function() {
                document.getElementById("message").disabled = false;
                from = "<?php echo $username ?>";
                receiver = $(this).html();
                //load() UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS
                //COMMENT BELOW THIS OUT IF WANT INSTANT MESSAGING
                setInterval(function() {
                    load();
                    //}, 1500); //1.5 seconds
                //}, 5000); //5 seconds
                }, 3600000); //1 hours
                //COMMENT ABOVE THIS OUT IF WANT INSTANT MESSAGING (It'll max out a free database quick tho)

                //This is just to send messages into chat, not actually print anything
                $('form').submit(function(e) {
                    //Ajax and jquery, sending messages into database
                    //https://www.w3schools.com/jquery/jquery_ajax_get_post.asp
                    $.post(url, {
                        message: $('#message').val(),
                        sender: from,
                        recipient: receiver
                    });
                    $('#message').val("")
                    return false;
                })
            });
        });

        //Load the messages
        function load() {
            $.get(url + '?start=' + start, function(result) {
                if (result.items) {
                    for (let item of result.items) {
                        //If click on someone else to talk to, wipe the message box
                        $('th').on('click', function() {
                            $("#messages").empty();
                            start = 0;
                        });
                        start += 1;

                        //The timeouts here are so messages aren't duplicated, but its not 100% a fix cause still happens but it seems to help
                        setTimeout(function() {
                            $('#messages').append(displayMessage(item));
                        }, 50); //50 ms
                    }
                    //Display the animated message and scrolldown
                    setTimeout(function() {
                        $('#messages').animate({
                            scrollTop: $('#messages')[0].scrollHeight
                        });
                    }, 50); //1.5 seconds
                };
                //load(); UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS NOT RECOMMENDED
            });
        }

        //Display the message
        function displayMessage(item) {
            let time = new Date(item.created);
            //Converting time to EST from fixed server time
            time.setHours(time.getHours() - 5);
            time = `${time.getHours()}:${time.getMinutes() < 10 ? '0' : ''}${time.getMinutes()}`;
            //Getting messages from database that match friend's name and our name
            if ((item.recipient == receiver && item.sender == "<?php echo $username ?>") || (item.recipient == "<?php echo $username ?>" && item.sender == receiver)) {
                if (item.sender == "<?php echo $username ?>") {
                    //If we are the sender, message is aligned on the right
                    return `<div class="msg msguser"><p>${item.sender}</p>${item.message} <span>${time}</span></div>`;
                } else {
                    //If friend is sender, their message appears on left
                    return `<div class="msg"><p>${item.sender}</p>${item.message} <span>${time}</span></div>`;
                }
            }
        }
    </script>
</head>

<body>
    <!--JavaScript: jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!--Navigation bar (Menu)-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../index.html">
                <img src="../img/navbar_logo.png" class="d-inline-block align-center" alt="Logo">
                Only Friends
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../match/MatchMaker.php">Find friends<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../friends/friends.php">My friends<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../chat/chat.php">Public chat<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../dm/dm.php">Direct Messages<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../profile/profile.php">Profile<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div style="overflow: scroll">
                    <table>
                        <tr>
                            <?php
                            //Dynamically displaying the user's friend in a table so they can select who to talk to
                            if (count($friends) > 0) {
                                foreach ($friends as $row) {
                                    $row = explode(' ', $row);
                                    //print_r($row);
                                    foreach ($row as $cell) {
                                        echo '<th>';
                                        echo $cell;
                                        echo '</th>';
                                    }
                                }
                            } else {
                                echo "<p style=text-align:center top><b>  NO FRIENDS  </b></p>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!--Chat box-->
                <div class="box-profile" id="messages"></div>
                <form>
                    <!--Message box-->
                    <input type="text" id="message" autocomplete="off" autofocus placeholder="Type message..." disabled>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
</body>

</html>