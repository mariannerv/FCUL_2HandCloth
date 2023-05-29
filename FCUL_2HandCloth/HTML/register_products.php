<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=../CSS/register_products.css>
    <title>Anunciar artigo!</title>

    <div class="w3-top">
      <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="home.php" class="w3-bar-item w3-button"><img src="Imagens/logo.png" height="40"
                      alt="Logo"><b>FCUL</b>2HandCloth</a>
              <!-- Float links to the right. Hide them on small screens -->
              <div class="w3-right w3-hide-small">
                  <a href="aboutus.php" class="w3-bar-item w3-button">Sobre</a>
                  <a href="buy_products.php" class="w3-bar-item w3-button">Comprar</a>
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
</head>

<body>
  <div class="selling_form">
    <form class="w3-container w3-card-4" method="post" action="PHP/create_product.php" enctype="multipart/form-data">
      <br><br><br>
      <p style="font-size: 20px;">Vende o teu produto!</p>
      <label for="title">Título:</label>
      <input type="text" name="title" required><br><br>
      
      <label for="description">Descrição:</label>
      <textarea name="description" required></textarea><br><br>
      
      <label for="category">Categoria:</label>
      <select name="category" required>
        <option value="">--Seleciona Categoria--</option>
        <option value="women">Mulher</option>
        <option value="men">Homem</option>
        <option value="child">Criança</option>
        <option value="other">Outro</option>
      </select><br><br>

      <label for="type">Tipo:</label>
      <select name="type" required>
        <option value="">--Selecion Tipo--</option>
        <option value="calca">Calça</option>
        <option value="blusa">Blusa</option>
        <option value="Tshirts">T-shirt</option>
        <option value="calcado">Calçado</option>
        <option value="other">Outro</option>
      </select><br><br>
      
      <label for="size">Tamanho:</label>
      <input type="text" name="size" required><br><br>
      
      <label for="brand">Marca:</label>
      <input type="text" name="brand" required><br><br>
      
      <label for="state">Estado:</label>
      <select name="state" required>
        <option value="">--Seleciona Estado--</option>
        <option value="excellent">Excelente</option>
        <option value="very_good">Muito Bom</option>
        <option value="good">Bom</option>
        <option value="satisfactory">Satisfatório</option>
      </select><br><br>
      
      <label for="price">Preço:</label>
      <input type="number" name="price" required><br><br>
      
      <label for="photo">Foto:</label>
      <input type="file" name="photo"><br><br>
      
      <input class="w3-button w3-section w3-teal w3-ripple" type="submit" value="Sell">
    </form>
  </div>
  
  
  
</body>

</html>