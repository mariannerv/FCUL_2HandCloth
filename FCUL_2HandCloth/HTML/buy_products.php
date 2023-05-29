<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/buy_products.css">
  <title>Buy</title>
</head>

<body>
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="home.php" class="w3-bar-item w3-button"><img src="Imagens/logo.png" height="40" alt="Logo"><b>FCUL</b>2HandCloth</a>
    <div class="w3-right w3-hide-small">
      <a href="aboutus.php" class="w3-bar-item w3-button">Sobre</a>
      <a href="register_products.php" class="w3-bar-item w3-button">Vender</a>
      <a href="cart.php" class="w3-bar-item w3-button">Carrinho</a>
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

<form class="search-form" method="GET" action="search.php">
  <label for="search_title">Procurar por título:</label>
  <input type="text" name="search_title" id="search_title">

  <label for="search_desc">Procurar por descrição:</label>
  <input type="text" name="search_desc" id="search_desc">

  <label for="search_cat">Categoria:</label>
  <select name="search_cat" id="search_cat">
    <option value=""></option>
    <option value="women">Mulher</option>
    <option value="men">Homem</option>
    <option value="child">Criança</option>
    <option value="other">Outro</option>
  </select>

  <label for="search_type">Tipo:</label>
  <select name="search_type" id="search_type">
    <option value=""></option>
    <option value="calca">Calça</option>
    <option value="blusa">Blusa</option>
    <option value="t-shirt">T-Shirt</option>
    <option value="other">Outro</option>
  </select>

  <label for="search_brand">Marca:</label>
  <input type="text" name="search_brand" id="search_brand">

  <label for="search_state">Estado:</label>
  <select name="search_state" id="search_state">
    <option value=""></option>
    <option value="excellent">Excelente</option>
    <option value="very_good">Muito Bom</option>
    <option value="good">Bom</option>
    <option value="satisfactory">Satisfatório</option>
  </select>

  <label for="search_price">Preço:</label>
  <input type="text" name="search_price" id="search_price">

  <button type="submit">Procurar</button>
</form>

<div class="products-container">
  <?php
  include('check_login.php');
  include('abreconexao.php');

  $user_name = $_SESSION['nome'];

  if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    echo "Search query: " . $search_query . "<br>";
    $sql = "SELECT * FROM clothes_listings WHERE title LIKE '%" . $search_query . "%' AND nome != '" . $user_name . "'";
  } else {
    $sql = "SELECT * FROM clothes_listings WHERE nome != '" . $user_name . "'";
  }

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="product-item">';
      echo '  <div class="product-details">';
      echo '    <p class="product-title">Title: ' . $row["title"] . '</p>';
      echo '    <p class="product-description">Descrição: ' . $row["description"] . '</p>';
      echo '    <p class="product-category">Categoria: ' . $row["category"] . '</p>';
      echo '    <p class="product-type">Tipo: ' . $row["type"] . '</p>';
      echo '    <p class="product-size">Tamanho: ' . $row["size"] . '</p>';
      echo '    <p class="product-brand">Marca: ' . $row["brand"] . '</p>';
      echo '    <p class="product-state">Estado: ' . $row["state"] . '</p>';
      echo '    <p class="product-price">Preço: ' . $row["price"] . '</p>';
      echo '    <p class="product-seller">Vendido por: ' . $row["nome"] . '</p>';
      echo '  </div>';
      echo '  <img class="product-image" src="Imagens/' . $row["photo_name"] . '" alt="Product Image">';
      echo '  <div class="product-buttons">';
      echo '    <form method="post" action="add_to_cart.php">';
      echo '      <input type="hidden" name="product_title" value="' . $row["title"] . '">';
      echo '      <input type="hidden" name="product_id" value="' . $row["id"] . '">';
      echo '      <input type="hidden" name="price" value="' . $row["price"] . '">';
      echo '      <input type="hidden" name="seller" value="' . $row["nome"] . '">';
      echo '      <input type="hidden" name="photo_name" value="' . $row["photo_name"] . '"> ';
      echo '      <button type="submit" name="add_to_cart">Add to Cart</button>';
      echo '      <button type="submit" name="remove_from_cart">Remove from Cart</button>';
      echo '    </form>';
      echo '    <form method="post" action="add_to_favorites.php">';
      echo '      <input type="hidden" name="product_title" value="' . $row["title"] . '">';
      echo '      <input type="hidden" name="product_id" value="' . $row["id"] . '">';
      echo '      <input type="hidden" name="price" value="' . $row["price"] . '">';
      echo '      <input type="hidden" name="seller" value="' . $row["nome"] . '">';
      echo '      <input type="hidden" name="photo_name" value="' . $row["photo_name"] . '"> ';
      echo '      <button type="submit" name="add_to_favorites">Add to Favorites</button>';
      echo '      <button type="submit" name="remove_from_favorites">Remove from Favorites</button>';
      echo '    </form>';
      echo '    <form method="post" action="chat.php">';
      echo '      <input type="hidden" name="seller" value="' . $row["nome"] . '">';
      echo '      <input type="hidden" name="product_id" value="' . $row["id"] . '">';
      echo '      <button type="submit" name="chat">Chat</button>';
      echo '    </form>';
      echo '  </div>';
      echo '</div><br>';
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
  ?>
</div>
</body>
</html>
