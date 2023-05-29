<?php
session_start();

// check if the user's cart is empty
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  echo '<p>Your cart is empty.</p>';
} else {
  // retrieve the user's cart from the session
  $cart = $_SESSION['cart'];

  // retrieve the selected listings from the database
  $listing_ids = array_keys($cart);
  $sql = "SELECT * FROM clothes_listings WHERE id IN (" . implode(',', $listing_ids) . ")";
  $result = $conn->query($sql);
  $listings = $result->fetch_all(MYSQLI_ASSOC);

  // display the user's cart and allow them to remove items or update their quantities
  echo '<table>';
  echo '<tr><th>Title</th><th>Quantity</th><th>Price</th><th>Subtotal</th><th>Remove</th></tr>';
  $total = 0;
  foreach($listings as $listing) {
    $quantity = $cart[$listing['id']];
    $subtotal = $listing['price'] * $quantity;
    echo '<tr>';
    echo '<td>' . $listing['title'] . '</td>';
    echo '<td><input type="number" name="quantity[' . $listing['id'] . ']" value="' . $quantity . '" min="1" max="' . $listing['quantity'] . '"></td>';
    echo '<td>' . $listing['price'] . '</td>';
    echo '<td>' . $subtotal . '</td>';
    echo '<td><a href="remove_from_cart.php?id=' . $listing['id'] . '">Remove</a></td>';
    echo '</tr>';
    $total += $subtotal;
    }
    echo '</table>';
    echo '<p>Total: ' . $total . '</p>';
    echo '<p><a href="checkout.php">Checkout</a></p>';
    }
?>

