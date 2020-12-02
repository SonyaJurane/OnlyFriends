var from = null, start = 0, url = "http://webdev.scs.ryerson.ca/~d46wang/chat/send.php";
$(document).ready(function () {
    from = "<?php echo $FullName ?>";
    //load() UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS
    //COMMENT BELOW THIS OUT IF WANT INSTANT MESSAGING
    setInterval(function () {
        load();
    //}, 1500); //1.5 seconds
    }, 5000); //5 seconds
    //}, 3600000  ); //1 hours
    //COMMENT ABOVE THIS OUT IF WANT INSTANT MESSAGING (It'll max out a free database quick tho)

    //Using jquery, send message to database
    $('form').submit(function (e) {
        $.post(url, {
            message: $('#message').val(),
            from: from
        });
        $('#message').val("")
        return false;
    })
});

//Get the actual message using jquery
function load() {
    $.get(url + '?start=' + start, function (result) {
        if (result.items) {
            result.items.forEach(item => {
                start = item.id;
                //Append the message inside message div to display to user
                $('#messages').append(displayMessage(item));
            });
            $('#messages').animate({ scrollTop: $('#messages')[0].scrollHeight });
        };
        //load(); UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS NOT RECOMMENDED
    });
}

//Display the message using jquery
function displayMessage(item) {
    let time = new Date(item.created);
    time.setHours(time.getHours() - 5);
    time = `${time.getHours()}:${time.getMinutes() < 10 ? '0' : ''}${time.getMinutes()}`;
    //If message is from user, right align
    if (item.from == "<?php echo $FullName ?>") {
        return `<div class="msg msguser"><p>${item.from}</p>${item.message} <span>${time}</span></div>`;
    }
    //Else left align
    else {
        return `<div class="msg"><p>${item.from}</p>${item.message} <span>${time}</span></div>`;
    }
}