<?php
session_start();
include('check_login.php');
include('abreconexao.php');
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Fcul_2HandCloth</title>
</head>

<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="home.php" class="w3-bar-item w3-button">
            <img src="Imagens/logo.png" height="40" alt="Logo">
            <b>FCUL</b>2HandCloth
        </a>

        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="aboutus.php" class="w3-bar-item w3-button">About</a>

            <?php
            if (isset($_SESSION['email'])) {
                echo '
                <a href="register_products.php" class="w3-bar-item w3-button">Sell</a>
                <a href="buy_products.php" class="w3-bar-item w3-button">Buy</a>
                <a href="cart.php" class="w3-bar-item w3-button">Cart</a>';
            }

            if (isset($_SESSION['email'])) {
                echo '
                <div class="w3-dropdown-hover">
                    <button class="w3-button w3-teal">' . $_SESSION['nome'] . '</button>
                    <div class="w3-dropdown-content w3-bar-block w3-border" style="width: 500px;">
                        <a href="area_utilizador.php" class="w3-bar-item w3-button">Preferências</a>
                        <a href="editar_utilizador.php" class="w3-bar-item w3-button">Editar perfil</a>
                        <a href="PHP/logout.php" class="w3-bar-item w3-button">Log out</a>
                    </div>
                </div>';
            } else {
                echo '<a href="login_index.php" class="w3-bar-item w3-button">Login/Signup</a>';
            }
            ?>
        </div>

        <div class="w3-center">
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="Imagens/bazaar.jpg" alt="Imagem de um bazar" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
        <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Reduz</b></span> <span
                class="w3-hide-small w3-text-light-grey">o desperdício</span></h1>
    </div>
</header>
<br><br>

<div id="notifications-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Function to check for new products and update notifications
  function checkForNewProducts() {
    $.ajax({
      url: "check_new_products.php",
      cache: false,
      success: function(response) {
        // Process the response and update the notifications container
        if (response.length > 0) {
          // Clear previous notifications
          $("#notifications-container").empty();

          // Display new product notifications
          response.forEach(function(product) {
            $("#notifications-container").empty();
            var notification = "<p>Novo produto listado: " + product.name + "</p>";
            $("#notifications-container").append(notification);
          });
        }
      }
    });
  }

  // Check for new products every X seconds
  setInterval(checkForNewProducts, 10000);
</script>


<div class="w3-row w3-grayscale">
<h2>Featured</h2>
<?php
include('featured_geral.php')
?>
</div>


<div class="w3-row w3-grayscale">
<h2>T-Shirts</h2>
<?php
include('featured_prods.php')
?>
</div>


<br><br>

<div class="w3-row w3-grayscale">
<h2>Calças</h2>

<?php
include('featured_calcas.php')
?>
</div>
<div class="w3-row w3-grayscale">
<h2>Calçado</h2>

<?php
include('featured_shoes.php')
?>
</div>



</body>
</html>
