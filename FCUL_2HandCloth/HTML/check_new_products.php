<?php
// Connect to the database (replace with your database credentials)
include "abreconexao.php";

// Get the last checked timestamp from session or another source
session_start();

$lastCheckedTimestamp = $_SESSION['last_checked_timestamp'];

// Retrieve new product listings since the last check
$sql = "SELECT * FROM clothes_listings WHERE timestamp > '$lastCheckedTimestamp'";
$result = mysqli_query($conn, $sql);

$newProducts = array();

if ($result->num_rows > 0) {
  // Store the new product details in an array
  while ($row = $result->fetch_assoc()) {
    $newProduct = array(
      "name" => $row['title'],
      // Add other relevant product details
    );
    $newProducts[] = $newProduct;
  }

  // Update the last checked timestamp
  $_SESSION['last_checked_timestamp'] = time();
}

// Return the new product listings as a JSON response
header('Content-Type: application/json');
echo json_encode($newProducts);

$conn->close();

?>