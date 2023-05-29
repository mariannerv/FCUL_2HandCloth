<?php
session_start();
include('PHP/mudar.php');
include('PHP/abreconexao.php');
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Fcul_2HandCloth</title>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="home.php" class="w3-bar-item w3-button"><img src="Imagens/logo.png" height="40"
                    alt="Logo"><b>FCUL</b>2HandCloth</a>
            <!-- Float links to the right. Hide them on small screens -->
            <div class="w3-right w3-hide-small">
                <a href="aboutus.php" class="w3-bar-item w3-button">About</a>
                <a href="register_products.php" class="w3-bar-item w3-button">Sell</a>
                <a href="buy_products.php" class="w3-bar-item w3-button">Buy</a>
                <a href="cart.php" class="w3-bar-item w3-button">Cart</a>

                <?php
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
</header>
<body>
    <div class="w3-container w3-half w3-margin-top">
        <form class="w3-container w3-card-4" method="post">
            <br><br><br><br><br>
            <p>
                <label for="nome">Nome</label>
                <input class="w3-input" placeholder="<?php echo $_SESSION['nome']; ?>" value="<?php echo $_SESSION['nome']; ?>" type="text" style="width:90%" name="nome" id="nome" pattern="[^()/><\][\\\x22,;|]+" required>
            </p>
            <p>
                <label for="email">E-mail</label><br>
                <?php echo $_SESSION['email']; ?>
            </p>
            <p>
                <label for="passwd">Password</label>
                <input class="w3-input" type="password" placeholder="****" value="<?php echo $_SESSION['nome']; ?>" style="width:90%" name="passwd" id="passwd" required>
            </p>

            <p>
                <label>Género</label><br>
                <?php echo $_SESSION['genero']; ?>
            </p>
            <p>
                <br>
                <label>Data de nascimento</label>
                <?php echo $_SESSION['data_nascimento']; ?>

            </p>

            <p>
                <br>
                <label for="morada">Morada</label>
                <input class="w3-input" placeholder="<?php echo $_SESSION['morada']; ?>" value="<?php echo $_SESSION['morada']; ?>" type="text" style="width:90%" name="morada" required>
            </p>
            <p>
                <label for="localidade">Localidade</label>
                <input class="w3-input" placeholder="<?php echo $_SESSION['localidade']; ?>" value="<?php echo $_SESSION['localidade']; ?>" type="text" style="width:90%" name="localidade" required>
            </p>
            <p>
                <label for="codigo_postal">Código postal</label>
                <input class="w3-input" placeholder="<?php echo $_SESSION['codigo_postal']; ?>" value="<?php echo $_SESSION['codigo_postal']; ?>" type="text" style="width:90%" name="codigo_postal" pattern="[0-9]{4}-[0-9]{3}" required>
            </p>
            <p>
                <label for="telefone">Telefone</label>
                <input class="w3-input" placeholder="<?php echo $_SESSION['telefone']; ?>" value="<?php echo $_SESSION['telefone']; ?>" type="tel" style="width:90%" name="telefone" pattern="[0-9]{9}" required>
            </p>
            <p>

                <input class= "w3-input w3-border w3-light-grey" type="submit" value="Registar" name="alterei">
            </p>
        </form>
</body>

</html>