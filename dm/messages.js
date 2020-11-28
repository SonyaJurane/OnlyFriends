var from=null, receiver=null, start = 0, url = "http://only-friends.000webhostapp.com/dm/chat.php";
//var chatswap = false;
$(document).ready(function(){
    $('th').on('click', function() {
        document.getElementById("message").disabled = false;
        //$("#messages").empty();
        from = "<?php echo $username ?>";
        receiver = $(this).html();
        //chatswap=true;
        //load() UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS
        //COMMENT BELOW THIS OUT IF WANT INSTANT MESSAGING
        setInterval(function () {
            load();
        //}, 1500); //1.5 seconds
        //}, 1000000); //17 minutes
        }, 8000000 ); //3 hours
        //COMMENT ABOVE THIS OUT IF WANT INSTANT MESSAGING (It'll max out a free database quick tho)
        
        //This is just to send messages into chat, not actually print anything
        $('form').submit(function(e){
            //Ajax
            //https://www.w3schools.com/jquery/jquery_ajax_get_post.asp
            $.post(url, {message: $('#message').val(),
            sender: from,
            recipient: receiver 
            });
            $('#message').val("")
            return false;
        }) 
    });
});

//Load the messages
function load(){
    $.get(url + '?start=' +start, function(result){
        if(result.items){
            //result.items.forEach(item =>{
            //    start = item.id;
            //    $('#messages').append(renderMessage(item));
            //});
            for (let item of result.items) {
                ///This select shit here is the source of spaghetti, but idk how to replace it lmao
                //Try using the messages.empty above and comment this one below out, and see how it works
                $('th').on('click', function() {
                    $("#messages").empty();
                    //if (chatswap==true){
                    //    chatswap=false;
                        //is it possible the bug is caused because when u press
                        //a button, it goes here and then goes to the code below as well?
                        //try moving this to its own function or below the  shit below
                        //https://jsfiddle.net/phpdeveloperrahul/CAKG4/
                        //also see what happens when u set start=1 here
                        //also test using alerts and see how the program itself works and if
                        //its infinitely calling from sql. like lets say its read the first
                        //30 msgs from database already, does it keep looping 1-30 or goes 31+
                        //could duplication glitch be because the id(start) goes to like 6,
                        //but theres only 3 things actually being printed?
                        //unlikely because i think program actually goes through everything
                        //and it just checks using if statements if the sender and recipient
                        //matches up and displays that.
                        start=0;         
                        //console.log("test");
                    //}
                });
                //alert(start);
                start+=1;
                //start = item.id;
                
                //The timeouts here are so messages aren't duplicated, but its not 100% a fix cause still happens but it seems to help
                setTimeout(function () {
                    $('#messages').append(renderMessage(item));
                }, 50); //1.5 seconds
            }
            setTimeout(function () {
                $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
            }, 50); //1.5 seconds
        };
        //load(); UNCOMMENT IF WANT INSTANT MESSAGING ON PAID SERVERS NOT RECOMMENDED
    });
}

function renderMessage(item){
    let time = new Date(item.created);
    time.setHours(time.getHours()-5);
    time = `${time.getHours()}:${time.getMinutes() < 10? '0' :''}${time.getMinutes()}`;
        //NEED TO EDIT THIS LINE SO NOT HARD CODED, EXTRACT THE RECIPIENT FROM FRIEND LIST
        if ((item.recipient == receiver && item.sender == "<?php echo $username ?>") || (item.recipient == "<?php echo $username ?>" && item.sender == receiver))
        {
            if (item.sender == "<?php echo $username ?>")
            {
                return `<div class="msg msguser"><p>${item.sender}</p>${item.message} <span>${time}</span></div>`;
            }
            else
            {
                return `<div class="msg"><p>${item.sender}</p>${item.message} <span>${time}</span></div>`;
            }
        }
}