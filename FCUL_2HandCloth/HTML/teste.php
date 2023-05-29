<?php
session_start();

// Check if the add_to_cart button was pressed
if (isset($_GET['product_id']) && isset($_GET['price'])) {
  // Get the product ID, price, and seller from the AJAX request
  $product_id = $_POST['product_id'];
  $price = $_POST['price'];
  $vendedor_id = $_POST['seller'];

  // Create a new cart item
  $cart_item = array(
    'id' => $product_id,
    'price' => $price,
    'quantity' => 1,
    'seller' => $vendedor_id
  );

  // Check if the cart array is empty
  if (empty($_SESSION['cart'])) {
    // If it's empty, add the cart item as the first element of the array
    $_SESSION['cart'][0] = $cart_item;
  } else {
    // If it's not empty, check if the cart item already exists
    $item_index = -1;
    foreach ($_SESSION['cart'] as $index => $item) {
      if ($item['id'] == $product_id) {
        $item_index = $index;
        break;
      }
    }

    // If the cart item already exists, increase its quantity
    if ($item_index >= 0) {
      $_SESSION['cart'][$item_index]['quantity']++;
    } else {
      // If the cart item doesn't exist, add it to the end of the array
      $array_size = count($_SESSION['cart']);
      $_SESSION['cart'][$array_size] = $cart_item;
    }
  }

  // Provide a response
  echo "Product added to cart successfully.";
} else {
  // Handle the case when the required parameters are not provided
  echo "Error: Invalid product ID or price.";
}
?>
