<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/chatbox.css') }}">
    <link rel="stylesheet" href="{{ asset('js/chatbot.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div id="phone-wrapper">
            <div id="app">
                <div id="landing" class="bg-dark text-light" style="">
                    <span class="fas fa-robot fa-4x"></span>
                    <div>
                        <h1 class="mt-3 text-lg" id="start-message">Welcome {{ Auth::user()->name }} , <br>Click start
                            to begin chat
                        </h1>
                    </div>
                    <div id="start">
                        <button id="start-chat">Start chat</button>
                    </div>
                </div>
                <div id="header" class="bg-dark">
                    <div><button id="back-button"
                            class="text-light btn-transparent btn-icon fas fa-arrow-left"></button></div>
                    <div class="text-light align-center">
                        <h2>ChatBot</h2>
                    </div>
                    <div>
                        <button id="nav-icon" class="text-light btn-transparent btn-icon fas fa-bars"></button>
                        <nav id="nav-container" style="display: none;">
                            <ul class="nav">
                                <li id="search" class="nav-link"><span class="fas fa-search"></span>Search</li>
                                <li id="clear-history" class="nav-link"><span class="fas fa-trash-alt"></span>Clear
                                    history</li>
                                <li id="theme" class="nav-link"><span class="fas fa-cogs"></span>Settings</li>
                                <hr>
                                <li id="sign-out" class="nav-link"><span class="fas fa-sign-out-alt"></span>Sign
                                    out</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div id="message-board">
                </div>
                <div id="form" class="bg-light">
                    <div id="emoijis" style="display: none;">
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-grin-beam"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-grin"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-grin-wink"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span
                                class="far fa-grin-tongue"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span
                                class="far fa-grin-tongue-wink"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span
                                class="far fa-kiss-wink-heart"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span
                                class="far fa-grin-hearts"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-surprise"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-angry"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-tired"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-sad-tear"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span
                                class="far fa-grin-squint-tears"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-sad-cry"></span></button>
                        <button class="smiley btn-transparent btn-icon"><span class="far fa-dizzy"></span></button>
                    </div>
                    <div><button id="emoi" class="btn-transparent btn-icon far fa-grin"></button></div>
                    <div id="message" placeholder="Type your message here" rows="1" contenteditable></div>
                    <div><button id="send" type=""
                            class="btn-transparent btn-icon fas fa-paper-plane"></button></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(() => {

            /******************/
            /*** START CHAT ***/
            /******************/

            // start chatbox
            $("#start-chat").on("click", (event) => {
                event.preventDefault();
                const html =
                    `<div class="post post-user">Hi, How can I help you today ${timeStamp()} </span></div>`; // convert post to html
                $("#message-board").append(html);
                $("#landing").slideUp(300);
                setTimeout(() => {
                    $("#start-chat").html("Continue chat")
                }, 300);
            });

            /*****************/
            /*** USER CHAT ***/
            /*****************/


            // Post a message to the board
            function $postMessage() {
                $("#message").find("br").remove();
                let $message = $("#message").html().trim(); // get text from text box
                $message = $message.replace(/<div>/, "<br>").replace(/<div>/g, "").replace(/<\/div>/g, "<br>")
                    .replace(/<br>/g, " ").trim();
                if ($message) { // if text is not empty
                    const html =
                        `<div class="post post-user">${$message + timeStamp()}</span></div>`; // convert post to html
                    $("#message-board").append(html); // add post to board
                    $scrollDown(); // stay at bottom of chat
                    botReply($message);
                };
                $("#message").empty();
            };

            // Chat input
            $("#message").on("keyup", (event) => {
                if (event.which === 13) $postMessage(); // Use enter to send
            }).on("focus", () => {
                $("#message").addClass("focus");
            }).on("blur", () => {
                $("#message").removeClass("focus");
            });
            $("#send").on("click", $postMessage);

            /**********************/
            /*** AUTO REPLY BOT ***/
            /**********************/


            function botReply(userMessage) {
                $.post("http://localhost:5000/message",{'message':userMessage, 'user_id': {{ Auth::user()->id}}} , function(data, status){
                    postBotReply(data);
                });
            };

            async function generateReply(userMessage) {
                const message = userMessage.toLowerCase();

                const nlp = await setupNLP("{{ asset('corpus-en.json')}}");
                let reply = await onChatSubmit(message, nlp);
                return reply;
            };

            function postBotReply(reply) {
                const html = `<div class="post post-bot">${reply + timeStamp()}</div>`;
                const timeTyping = 500 + Math.floor(Math.random() * 2000);
                $("#message-board").append(html);
                $scrollDown();
            };

            /******************/
            /*** TIMESTAMPS ***/
            /******************/

            function timeStamp() {
                const timestamp = new Date();
                const hours = timestamp.getHours();
                let minutes = timestamp.getMinutes();
                if (minutes < 10) minutes = "0" + minutes;
                const html = `<span class="timestamp">${hours}:${minutes}</span>`;
                return html;
            };

            /***************/
            /*** CHAT UI ***/
            /***************/

            // Back arrow button
            $("#back-button").on("click", () => {
                $("#landing").show();
            });

            // Menu - navigation
            $("#nav-icon").on("click", () => {
                $("#nav-container").show();
            });

            $("#nav-container").on("mouseleave", () => {
                $("#nav-container").hide();
            });

            $(".nav-link").on("click", () => {
                $("#nav-container").slideToggle(200);
            });

            // Clear history
            $("#clear-history").on("click", () => {
                $("#message-board").empty();
                $("#message").empty();
            });

            // Sign out
            $("#sign-out").on("click", () => {
                $("#message-board").empty();
                $("#message").empty();
                $("#landing").show();
                $("#username").val("");
                $("#start-chat").html("Start chat");
            });

            /*********************/
            /*** SCROLL TO END ***/
            /*********************/

            function $scrollDown() {
                const $container = $("#message-board");
                const $maxHeight = $container.height();
                const $scrollHeight = $container[0].scrollHeight;
                if ($scrollHeight > $maxHeight) $container.scrollTop($scrollHeight);
            }

            /***************/
            /*** EMOIJIS ***/
            /***************/

            // toggle emoijis
            $("#emoi").on("click", () => {
                $("#emoijis").slideToggle(300);
                $("#emoi").toggleClass("fa fa-grin far fa-chevron-down");
            });

            // add emoiji to message
            $(".smiley").on("click", (event) => {
                const $smiley = $(event.currentTarget).clone().contents().addClass("fa-lg");
                $("#message").append($smiley);
                $("#message").select(); // ==> BUG: message field not selected after adding smiley !!
            });

        });
    </script>
</x-app-layout>
