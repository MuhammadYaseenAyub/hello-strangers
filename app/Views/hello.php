<!--!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}
.chat-row{
    margin:50px;
}

ul{
    margin:0px;
    padding:0px;
    list-style: none;
}

ul li {
    padding:8px;
    background:#928787;
    margin-bottom:20px;
}

ul li:nth-child(2n-2){
    background:purple;
}

.chat-input{
    border:2px solid lightgray;
    width: 100px;
    border-top-right-radius:10px;
}
</style>
</head>
<body>

<div class="container">
    <div class="row chat-row">
        <div class="chat-container">
            <ul>

            </ul>
        </div>
        <div class="chat-section">
            <div class="chat-box">
                <div id="chatInput" class="chat-input bg-white" contenteditable>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.socket.io/4.3.2/socket.io.min.js" integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
     $(function (){
        let ip_address = '127.0.0.1';
        let socket_port = '3000';
        let socket = io(ip_address+":"+socket_port);

        let chatInput = $('#chatInput');
        chatInput.keypress(
            function(e){
                let message = $(this).html();
                console.log(message);
                if(e.which===13 && !e.shiftKey){
                    socket.emit('sendChatToServer', message);
                    chatInput.html("");
                    return false;
                }
            }
        );
        socket.on('sendChatToClient', (message)=> {
            $('.chat-container ul').append("<li>"+message+"</li>");
        });
     });
</script>
</body>
</html-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Welcome to chat app</p>
    <form id="message-form">
        <input type="text" name="message" id="" placeholder="message">
        <button type="submit" id="submit-btn">Submit</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.socket.io/4.3.2/socket.io.min.js" integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  var socket = io('http://localhost:3000/');
  socket.on('connect', function(){
      console.log("connected to server....");
      /*socket.emit('createMsg', {
          from: "CJ",
          text: "Whats up homei."
      });*/
  });

  socket.on('disconnect', function(){
      console.log("disconnected from server....");
  });

  socket.on('newMsg', function(message){
      console.log('New msg:> ', message);
      let li = document.createElement('li');
      li.innerText = message.from+" "+message.text;

      document.querySelector('body').appendChild(li);
  });

  /*socket.emit('createMsg', {
      from:"JHON",
      text:"HEY"
  }, function (message){
      console.log(message+ "server got it.");
  });*/

  document.querySelector('#submit-btn').addEventListener('click', function(e){
    e.preventDefault();
    socket.emit('createMsg', {
        from: 'User',
        text: document.querySelector('input[name="message"]').value
    }, function(){

    });
  })
</script>
</html>