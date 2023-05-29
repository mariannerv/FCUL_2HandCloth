<?php
// Connect to the database (replace with your database credentials)
include "abreconexao.php";

// Retrieve the chat history
$sql = "SELECT * FROM messages WHERE product_id = '$product_id' ORDER BY timestamp ASC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // Display each message
    while ($row = $result->fetch_assoc()) {
        $sender = ($row['sender_id'] === $sender_id) ? 'You' : 'Seller';
        $message = $row['message'];
        $timestamp = $row['timestamp'];

        echo "<p><strong>$sender:</strong> $message</p>";
        echo "<small>Sent at: $timestamp</small>";
        echo "<hr>";
    }
}

$conn->close();
?>
