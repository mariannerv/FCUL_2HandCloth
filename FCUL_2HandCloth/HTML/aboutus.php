<?php
session_start();
include('check_login.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Fcul_2HandCloth</title>
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
                    echo '<a href="register_products.php" class="w3-bar-item w3-button">Sell</a>';
                    echo '<a href="buy_products.php" class="w3-bar-item w3-button">Buy</a>';
                    echo '<a href="cart.php" class="w3-bar-item w3-button">Cart</a>';
                }

                if (isset($_SESSION['email'])) {
                    echo '<div class="w3-dropdown-hover">';
                    echo '<button class="w3-button w3-teal">' . $_SESSION['nome'] . '</button>';
                    echo '<div class="w3-dropdown-content w3-bar-block w3-border" style="width: 500px;">';
                    echo '<a href="area_utilizador.php" class="w3-bar-item w3-button">Preferências</a>';
                    echo '<a href="editar_utilizador.php" class="w3-bar-item w3-button">Editar perfil</a>';
                    echo '<a href="PHP/logout.php" class="w3-bar-item w3-button">Log out</a>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<a href="login_index.php" class="w3-bar-item w3-button">Login/Signup</a>';
                }
                ?>
            </div>
            
        </div>
    </div>
</head>

    <body>
        <!-- About Section -->
        <div class="w3-container w3-padding-32" id="about">
            <br>
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Sobre Nós</h3>
            <p>A compra e venda de roupas em segunda mão pode trazer vários benefícios para a sustentabilidade e
            para as pessoas, tais como: redução do desperdício têxtil evitando que essas roupas acabem em
            aterros sanitários, onde levariam anos para se decompor; economia de recursos naturais: ao comprar
            roupas usadas, as pessoas evitam a produção de novas roupas e a utilização de recursos naturais, como
            água, energia e matérias-primas; e diminuição da pegada de carbono: a compra e venda de roupas em
            segunda mão pode reduzir a pegada de carbono, pois evita a produção de novas roupas e reduz a
            necessidade de transporte. Vende o que não usas ou encontra achados raros – nunca foi tão fácil descobrir o mundo da moda em segunda mão como
            agora!
            </p>
        </div>
        <div class="w3-row-padding w3-grayscale">
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="Imagens/mariana.png" alt="Mariana" style="width:100%">
                <h3>Mariana Valente</h3>
                <p class="w3-opacity">Aluna de ASW</p>
                <p>Estudante de LTI</p>
                <p><button class="w3-button w3-light-grey w3-block">Contacto</button></p>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="Imagens/diogo.jpg" alt="Diogo" style="width:100%">
                <h3>Diogo Marques</h3>
                <p class="w3-opacity">Aluno de ASW</p>
                <p>Estudante de LTI</p>
                <p><button class="w3-button w3-light-grey w3-block">Contacto</button></p>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="Imagens/pfpavatar.png" alt="Diana" style="width:100%">
                <h3>Diana Patrício</h3>
                <p class="w3-opacity">Aluna de ASW</p>
                <p>Estudante de LTI</p>
                <p><button class="w3-button w3-light-grey w3-block">Contacto</button></p>
            </div>
        </div><!-- Contact Section -->
        <div class="w3-container w3-padding-32" id="contact">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contacte-nos</h3>
            <p>Para entrar em contacto connosco, preencha o seguinte formulário.</p>
            <form action="/action_page.php" target="_blank">
                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
                <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
                <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
                <button class="w3-button w3-black w3-section" type="submit">
                    <i class="fa fa-paper-plane"></i> ENVIE MENSAGEM
                </button>
            </form>
        </div>
    </body>
</html>