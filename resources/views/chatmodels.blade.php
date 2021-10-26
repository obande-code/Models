@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class=" w-50 d-flex flex-column model_img_mobile">
        <a class="btn btn-outline-black p-0" style="width: 20px">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
        </a>
        <p class="my-2">Is it big baby? That one is for you!</p>
        <p class="my-2" style="font-size: 10px; color: darkgray">Posted 2 days ago</p>
        <img src="{{ asset('image/download (44).png') }}" class="mt-2" alt="">
        <div class="d-flex mt-2">
            <img src="{{ asset('image/download (45).png') }}" class="heard_img" alt="">
            <p class="mx-2">5 others</p>
        </div>
        <div class="line"></div>
        <div class="d-flex justify-content-around mt-2">
            <div class="d-flex">
                <img src="{{ asset('image/download (46).png') }}" class="heard_img" alt="">
                <p style="margin-left: 10px">Like</p>
            </div>
            <div class="d-flex">
                <img src="{{ asset('image/download (47).png') }}" class="heard_img" alt="">
                <p style="margin-left: 10px">Comment</p>
            </div>
        </div>
        <div class="line mb-4"></div>
        <div id="chatLog">

        </div>

        <form id="chatForm">
            <div class="d-flex mt-1">

                <!-- <input id="chatMessage" type="text" aria-label="First name" class="form-control rounded-pill"
                    placeholder="Write a comment">
                <img src="{{ asset('image/download (48).png') }}" alt="" class="ml-2 mt-1 red_arrow"> -->

            </div>
        </form>
    </div>
</div>
<script>
var username = `user_${getRandomNumber()}`
var apiKey = 'oCdCMcMPQpbvNjUIzqtvF1d2X2okWpDQj4AwARJuAgtjhzKxVEjQU6IdCjwm';
var channelId = 1;
var piesocket = new WebSocket(`wss://demo.piesocket.com/v3/${channelId}?api_key=${apiKey}&notify_self`);

var chatLog = document.getElementById('chatLog');
var chatForm = document.getElementById('chatForm');
chatForm.addEventListener("submit", sendMessage);

piesocket.onopen = function() {
    console.log(`Websocket connected`);
    piesocket.send(JSON.stringify({
        event: 'new_joining',
        sender: username,
    }));
}
piesocket.onmessage = function(message) {
    var payload = JSON.parse(message.data);
    console.log(payload);

    if (payload.sender == username) {
        payload.sender = "You";
    }

    if (payload.event == "new_message") {

        //Handle new message
        chatLog.insertAdjacentHTML('afterend',
            `<div> <img src="{{ asset('image/download (78).png') }}" class="chat_user my-1" alt=""> ${payload.sender}: ${payload.text} <div>`
        );

    } else if (payload.event == 'new_joining') {

        //Handle new joining
        // chatLog.insertAdjacentHTML('afterend', `<div> ${payload.sender} joined the chat<div>`);

    }
}

function getRandomNumber() {
    return Math.floor(Math.random() * 1000);
}

function sendMessage(e) {
    e.preventDefault();

    var message = document.getElementById('chatMessage').value;

    piesocket.send(JSON.stringify({
        event: 'new_message',
        sender: username,
        text: message
    }));
}
</script>
@endsection