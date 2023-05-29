<?php
session_start();

// check if the add_to_cart button was pressed
if(isset($_POST['add_to_cart'])) {
  echo "<script>alert('Artigo adicionado ao carrinho!');</script>";
  // get the product ID and price from the form
  $product_title = $_POST['product_title'];
  $product_id = $_POST['product_id'];
  $price = $_POST['price'];
  $vendedor_id = $_POST['seller'];
  $photo_name = $_POST['photo_name'];

  // create a new cart item
  $cart_item = array(
    'title' => $product_title, 
    'id' => $product_id,
    'price' => $price,
    'quantity' => 1,
    'seller' => $vendedor_id,
    'photo_name' => $photo_name

  );

  // check if the cart array is empty
  if(empty($_SESSION['cart'])) {
    // if it's empty, add the cart item as the first element of the array
    $_SESSION['cart'][0] = $cart_item;
  } else {
    // if it's not empty, check if the cart item already exists
    $item_index = -1;
    foreach($_SESSION['cart'] as $index => $item) {
      if($item['id'] == $product_id) {
        $item_index = $index;
        break;
      }
    }

    // if the cart item already exists, increase its quantity
    if($item_index >= 0) {
      $_SESSION['cart'][$item_index]['quantity']++;
    } else {
      // if the cart item doesn't exist, add it to the end of the array
      $array_size = count($_SESSION['cart']);
      $_SESSION['cart'][$array_size] = $cart_item;
    }
  }

    // redirect the user back to the clothes listings page
    header("Location: buy_products.php");
    exit();
}
// check if the remove_from_cart button was pressed
if(isset($_POST['remove_from_cart'])) {
    echo "<script>alert('Artigo removido do carrinho!');</script>";
    // get the product ID from the form
    $product_id = $_POST['product_id'];
  
    // search for the product in the cart
    foreach($_SESSION['cart'] as $index => $item) {
      if($item['id'] == $product_id) {
        // remove the product from the cart
        unset($_SESSION['cart'][$index]);
        break;
      }
    }
  
    // redirect the user back to the cart page
    header("Location: buy_products.php");
    exit();
} 


?>