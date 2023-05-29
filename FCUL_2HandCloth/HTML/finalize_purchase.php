<?php
include "abreconexao.php";
session_start();

// Check if the cart is empty
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    echo "Cart is empty. Unable to finalize the purchase.";
    exit;
}

$comprador_id = $_SESSION["nome"];
$data_venda = date("Y-m-d H:i:s");



// Loop through the cart items and process the purchase for each item
foreach ($_SESSION["cart"] as $product_id => $product) {
    // Get the relevant information for the current product
    $vendedor_id = $product["seller"]; // Assuming you have a "seller_id" associated with each product
    $sub_id = $product["id"]; // Assuming you have a "sub_id" associated with each product in the cart
    // Insert the purchase information into the database
    $sql = "INSERT INTO historico_vendas (produto_id, comprador_id, vendedor_id, data_venda)
            VALUES ('$sub_id', '$comprador_id', '$vendedor_id', '$data_venda')";
  
    if ($conn->query($sql) === TRUE) {
      // Purchase recorded successfully
      echo "Purchase of Product ID: $product_id finalized successfully!<br>";
    } else {
      // Error occurred while recording the purchase
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  
  // Clear the cart after finalizing the purchase
  unset($_SESSION["cart"]);

  /* remove the bought item from the clothes_listings*/
  $sql = "DELETE FROM clothes_listings WHERE id = '$sub_id'";
  if ($conn->query($sql) === TRUE) {
    // Purchase recorded successfully
    echo "Purchase of Product ID: $product_id finalized successfully!<br>";
  } else {
    // Error occurred while recording the purchase
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  // Close the database connection
  $conn->close();
  ?>
