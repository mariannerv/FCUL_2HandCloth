<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
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
    <div class="w3-container w3-half w3-margin-top">
        <form class="w3-container w3-card-4" action="PHP/login.php" method="post">

            <br><br><br>
            <p style="font-size: 20px;">Bem vindo(a) de volta!</p>
            <p>
                <input class="w3-input" type="text" style="width:90%" required name="email">
                <label>E-mail</label>
            </p>
            <p>
                <input class="w3-input" type="password" style="width:90%" required name="pass">
                <label>Password</label>
                <button id="toggle-password" type="button" aria-label="Show password as plain text. Warning: this will display your password on the screen.">Show password</button>
            </p>

            <?php
            if (isset($_SESSION['sem_registo'])) :
            ?>
              <div class="w3-panel w3-red" >
                E-mail ou password errada
              </div>
            <?php
            endif;
            unset($_SESSION['sem_registo']);
            ?>

            <p>
                <button class="w3-button w3-section w3-teal w3-ripple"> Log in </button>
            </p>

            <p>Ainda não tem conta? <a href="register.html">Registe-se aqui</a></p>

        </form>

    </div>
    <div class="w3-container w3-half w3-margin-top">
        <img src="Imagens/clothes.jpg" height="360">
    </div>
</body>

</html>