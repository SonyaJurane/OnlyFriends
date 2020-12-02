var from = null, receiver = null, start = 0, url = "http://webdev.scs.ryerson.ca/~d46wang/dm/send.php";
$(document).ready(function () {
    $('th').on('click', function () {
        document.getElementById("message").disabled = false;
        from = "<?php echo $username ?>";
        receiver = $(this).html();
        //load() UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS
        //COMMENT BELOW THIS OUT IF WANT INSTANT MESSAGING
        setInterval(function () {
            load();
        //}, 1500); //1.5 seconds
        //}, 5000); //5 seconds
        }, 3600000); //1 hours
        //COMMENT ABOVE THIS OUT IF WANT INSTANT MESSAGING (It'll max out a free database quick tho)

        //This is just to send messages into chat, not actually print anything
        $('form').submit(function (e) {
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
    $.get(url + '?start=' + start, function (result) {
        if (result.items) {
            for (let item of result.items) {
                //If click on someone else to talk to, wipe the message box
                $('th').on('click', function () {
                    $("#messages").empty();
                    start = 0;
                });
                start += 1;

                //The timeouts here are so messages aren't duplicated, but its not 100% a fix cause still happens but it seems to help
                setTimeout(function () {
                    $('#messages').append(displayMessage(item));
                }, 50); //50 ms
            }
            //Display the animated message and scrolldown
            setTimeout(function () {
                $('#messages').animate({ scrollTop: $('#messages')[0].scrollHeight });
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
        }
        else {
            //If friend is sender, their message appears on left
            return `<div class="msg"><p>${item.sender}</p>${item.message} <span>${time}</span></div>`;
        }
    }
}