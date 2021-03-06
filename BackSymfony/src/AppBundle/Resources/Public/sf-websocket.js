var defaultChannel = 'general';
var botName = 'ChatBot';
var ws = new WebSocket('ws://' + wsUrl);
var _receiver = document.getElementById('ws-content-receiver');
var userName = prompt('Hi! I need your name for the Chat please :)');
var _textInput = document.getElementById('ws-content-to-send');
var _textSender = document.getElementById('ws-send-content');
var enterKeyCode = 13;
//var message ='';

var addMessageToChannel = function(message1) {
    _receiver.innerHTML += '<div class="message">' + message1 + '</div>';
};

var botMessageToGeneral = function (message2) {
    return addMessageToChannel(JSON.stringify({
        action: 'message',
        channel: defaultChannel,
        user: botName,
        message: message2
    }));
};

ws.onopen = function () {
    ws.send(JSON.stringify({
        action: 'subscribe',
        channel: defaultChannel,
        user: userName
    }));
};

ws.onmessage = function (event) {
    addMessageToChannel(event.data);
};

ws.onclose = function () {
    botMessageToGeneral('Connection closed');
};

ws.onerror = function () {
    botMessageToGeneral('An error occured!');
};


var sendTextInputContent = function () {
    // Get text input content
    var content = _textInput.value;

    // Send it to WS
    ws.send(JSON.stringify({
        action: 'message',
        user: userName,
        message: content,
        channel: 'general'
    }));

    // Reset input
    _textInput.value = '';
};

_textSender.onclick = sendTextInputContent;
_textInput.onkeyup = function(e) {
    // Check for Enter key
    if (e.keyCode === enterKeyCode) {
        sendTextInputContent();
    }
};
