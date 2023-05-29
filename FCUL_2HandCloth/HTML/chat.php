<!DOCTYPE html>
<html>
<head>
    <title>Product Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to retrieve and update chat messages
        function updateChat() {
            $.ajax({
                url: "get_chat_messages.php",
                cache: false,
                success: function(html) {
                    // Replace the chat history with the updated messages
                    $("#chat-history").html(html);
                    // Scroll to the bottom of the chat history to show the latest messages
                    $("#chat-history").scrollTop($("#chat-history")[0].scrollHeight);
                }
            });
        }

        // Submit message and update chat
        function sendMessage() {
            var message = $("#message-input").val();

            if (message !== "") {
                $.ajax({
                    url: "send_message.php",
                    type: "POST",
                    data: { message: message },
                    success: function() {
                        $("#message-input").val("");
                        updateChat();
                    }
                });
            }
        }

        // Update chat every X seconds (adjust as needed)
        setInterval(updateChat, 10000);
    </script>
</head>
<body>
    <div id="chat-history"></div>

    <form>
        <input type="text" id="message-input" placeholder="Type your message">
        <button type="button" onclick="sendMessage()">Send</button>
    </form>
</body>
</html>
