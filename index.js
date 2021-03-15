const message = document.getElementById('message');
const sendButton = document.getElementById('send');

const ws = new WebSocket('ws://localhost:8080');

sendButton.addEventListener('click', e => {
    console.log('sending: ', message.value)

    ws.send(message.value);

    message.value = '';
});

ws.onmessage = (event) => {
    console.log("ws received message: ", event.data)
}

ws.onopen = () => {
    console.log("ws open")
}

ws.onclose = () => {
    console.log("ws close")
}