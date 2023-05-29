<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/cart.css">
    <script src="finalize_purchases.js"></script>
    <title>Cart</title>
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="home.php" class="w3-bar-item w3-button"><img src="Imagens/logo.png" height="40"
                        alt="Logo"><b>FCUL</b>2HandCloth</a>
                <!-- Float links to the right. Hide them on small screens -->
                <div class="w3-right w3-hide-small">
                    <a href="aboutus.php" class="w3-bar-item w3-button">About</a>
                    <a href="register_products.php" class="w3-bar-item w3-button">Sell</a>
                    <a href="buy_products.php" class="w3-bar-item w3-button">Buy</a>
                    
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        echo "<div class='w3-dropdown-hover'>
                        <button class='w3-button w3-teal'>".$_SESSION['nome']."</button>
    
                        <div class='w3-dropdown-content w3-bar-block w3-border' style='width: 500px;'>
                            <a href='area_utilizador.php' class='w3-bar-item w3-button'>Preferências</a>
                            <a href='editar_utilizador.php' class='w3-bar-item w3-button'>Editar perfil</a>
                            <a href='PHP/logout.php' class='w3-bar-item w3-button'>Log out</a>
                        </div>
    
                    </div>";
                    } else {
                        echo "<a href='login_index.php' class='w3-bar-item w3-button'>Login/Signup</a>";
                    };
                    ?>
                </div>
        </div>
    </div>
  </head>

</html>
<br><br><br><br><br>
<?php
session_start();

// display cart contents
echo "<h2>Carrinho:</h2>";
if (isset($_SESSION["cart"])) {
  foreach ($_SESSION["cart"] as $product_id => $product) {
    echo '<div class="product-item">';
    echo '  <div class="product-details">';
    echo '    <p class="product-title">Title: ' . $product["title"] . '</p>';
    echo '    <p class="product-price">Preço: ' . $product["price"] . '</p>';
    echo '  <img class="product-image" src="Imagens/' . $product["photo_name"] . '" alt="Product Image">';
    echo '  </div>';
    echo '  <div class="product-buttons">';
    echo '  <form method="post" action="add_to_cart.php">';
    echo '      <input type="hidden" name="product_title" value="' . $product["title"] . '">';
    echo '      <input type="hidden" name="product_id" value="' . $product["id"] . '">';
    echo '      <input type="hidden" name="price" value="' . $product["price"] . '">';
    echo '      <input type="hidden" name="seller" value="' . $product["nome"] . '">';
    echo '      <input type="hidden" name="photo_name" value="' . $product["photo_name"] . '"> ';
    echo '      <button type="submit" name="remove_from_cart">Remover do carrinho!</button>';
    echo '  </form>';
    echo '  </div>';
    echo '  </div>';
    echo '</div><br>';
  }
}


echo "<h2>Favoritos</h2>";

if (isset($_SESSION["favorites"]) && !empty($_SESSION["favorites"])) {
  foreach ($_SESSION["favorites"] as $product_id => $producto) {
    echo '<div class="product-item">';
    echo '  <div class="product-details">';
    echo '    <p class="product-title">Title: ' . $producto["title"] . '</p>';
    echo '    <p class="product-price">Preço: ' . $producto["price"] . '</p>';
    echo '  <img class="product-image" src="Imagens/' . $producto["photo_name"] . '" alt="Product Image">';
    echo '  </div>';
    echo '  <div class="product-buttons">';
    echo '  <form method="post" action="add_to_favorites.php">';
    echo '      <input type="hidden" name="product_title" value="' . $producto["title"] . '">';
    echo '      <input type="hidden" name="product_id" value="' . $producto["id"] . '">';
    echo '      <input type="hidden" name="price" value="' . $producto["price"] . '">';
    echo '      <input type="hidden" name="seller" value="' . $producto["nome"] . '">';
    echo '      <input type="hidden" name="photo_name" value="' . $producto["photo_name"] . '"> ';
    echo '      <button type="submit" name="remove_from_favorites">Remover dos favoritos!</button>';
    echo '  </form>';
    echo '  </div>';
    echo '</div><br>';
  }
}
else {
  echo "No favorites yet.";
}


// Add the button to finalize the purchase
echo "<br><button onclick='finalizePurchase()'>Finalizar Compra!</button>";

/* echo '<pre>';
var_dump($_SESSION);
echo '</pre>'; */

?>

<script>
function finalizePurchase() {
  console.log("Finalizing purchase...");
  // Send an AJAX request to the PHP backend
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "finalize_purchase.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the PHP backend if needed
      alert(xhr.responseText);
    }
  };
  xhr.send();
}
</script>