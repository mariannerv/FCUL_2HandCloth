<?php
session_start();

// check if the add_to_favorites button was pressed
if(isset($_POST['add_to_favorites'])) {
  echo "<script>alert('Artigo adicionado aos favoritos!');</script>";
  // get the product ID from the form
  $product_id = $_POST['product_id'];
  $product_title = $_POST['product_title'];
  $price = $_POST['price'];
  $vendedor_id = $_POST['seller'];
  $photo_name = $_POST['photo_name'];

  // create a new cart item
  $favorite_item = array(
    'title' => $product_title, 
    'id' => $product_id,
    'price' => $price,
    'quantity' => 1,
    'seller' => $vendedor_id,
    'photo_name' => $photo_name

  );

  // check if the favorites array is empty
  if(empty($_SESSION['favorites'])) {
    // if it's empty, add the product ID as the first element of the array
    $_SESSION['favorites'][0] = $favorite_item;
  } else {
    // if it's not empty, check if the cart item already exists
    $item_index = -1;
    foreach($_SESSION['favorites'] as $index => $item) {
      if($item['id'] == $product_id) {
        $item_index = $index;
        break;
      }
    }

    // if the cart item already exists, increase its quantity
    if($item_index >= 0) {
      $_SESSION['favorites'][$item_index]['quantity']++;
    } else {
      // if the cart item doesn't exist, add it to the end of the array
      $array_size = count($_SESSION['favorites']);
      $_SESSION['favorites'][$array_size] = $favorite_item;
    }
  }

    // redirect the user back to the clothes listings page
    header("Location: buy_products.php");
    exit();
}

// check if the remove_from_cart button was pressed
if(isset($_POST['remove_from_favorites'])) {
  echo "<script>alert('Artigo removido dos favoritos!');</script>";
  // get the product ID from the form
  $product_id = $_POST['product_id'];

  // search for the product in the cart
  foreach($_SESSION['favorites'] as $index => $item) {
    if($item['id'] == $product_id) {
      // remove the product from the cart
      unset($_SESSION['favorites'][$index]);
      break;
    }
  }
  
    // redirect the user back to the cart page
    header("Location: buy_products.php");
    exit();
} 
?>
