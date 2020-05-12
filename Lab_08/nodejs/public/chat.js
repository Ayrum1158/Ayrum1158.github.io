//Make connection
var socket = io();

//Query DOM
var message = document.getElementById('message');
var nickname = document.getElementById('nickname');
var btn = document.getElementById('send');
var output = document.getElementById('output');
var msgWindow = document.getElementById('chat-window');

//Emit events

btn.addEventListener('click', function() {
    if(message.value === "")
        return;
        
    socket.emit('chat', {
        message: message.value,
        nickname: nickname.value
    });
    message.value = "";
    message.focus();
});

//Listen for events

socket.on('chat', function(data) {
    output.innerHTML += '<p><strong>'+ data.nickname +': </strong>' + data.message + '</p>';

    msgWindow.scrollTop = msgWindow.scrollHeight;
});

message.addEventListener('keydown', function(event) {//message send on Enter key
    if (event.keyCode === 13) {
      event.preventDefault();
      btn.click();
    }
  });