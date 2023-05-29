<?php
// Connect to the database (replace with your database credentials)
include "abreconexao.php";

// Get the current user's role and ID from session
session_start();
$sender_id = $_SESSION['nome'];
$product_id = $_POST['product_id'];

$sql = "SELECT * FROM clothes_listings WHERE id = '$product_id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // Get the receiver's ID
    $row = $result->fetch_assoc();
    $receiver_id = $row['nome'];
} else {
    // Unable to find the product
    echo "Unable to find the product";
    exit;
}

// Check if a message was submitted
if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = $_POST['message'];

    // Insert the message into the database
    $sql = "INSERT INTO messages (product_id, sender_id, receiver_id, message, timestamp)
            VALUES ('$product_id', '$sender_id', '$receiver_id', '$message', NOW())";

    if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
