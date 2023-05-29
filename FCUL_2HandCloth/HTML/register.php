<?php
session_start();
include('PHP/abreconexao.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="home.html" class="w3-bar-item w3-button"><img src="Imagens/logo.png" height="40" alt="Logo"><b>FCUL</b>2HandCloth</a>
             <!-- Float links to the right. Hide them on small screens -->
             <div class="w3-right w3-hide-small">
                <a href="aboutus.php" class="w3-bar-item w3-button">About</a>

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
    <div class="w3-container w3-half w3-margin-top">
        <form class="w3-container w3-card-4" action="PHP/createuser.php" method="post">
            <br><br><br><br><br>
            <p>
                <label for="nome">Nome</label>
                <input class="w3-input" type="text" style="width:90%" name="nome" id="nome" pattern="[^()/><\][\\\x22,;|]+" required>
            </p>
            <p>
                <label for="email">E-mail</label>
                <input class="w3-input" type="email" style="width:90%" name="email" id="email" required>
            </p>
            <p>
                <label for="passwd">Password</label>
                <input class="w3-input" type="password" style="width:90%" name="passwd" id="passwd" required>
            </p>

            <p>
                <input class="w3-radio" type="radio" name="genero" value="male" id="male" checked>
                <label for="M">M</label>
            </p>

            <p>
                <input class="w3-radio" type="radio" name="genero" value="female" id="female">
                <label for="F">F</label>
            </p>

            <p>
                <input class="w3-radio" type="radio" name="genero" value="outro">
                <label for="Outro">Outro</label>
            </p>
            <p>
                <br>
                <label>Data de nascimento</label>
                <input class="w3-input" type="date" name="data_nascimento" required>

            </p>

            <p>
                <br>
                <label for="morada">Morada</label>
                <input class="w3-input" type="text" style="width:90%" name="morada" required>
            </p>
            <p>
                <label for="localidade">Localidade</label>
                <input class="w3-input" type="text" style="width:90%" name="localidade" required>
            </p>
            <p>
                <label for="codigo_postal">Código postal</label>
                <input class="w3-input" type="text" style="width:90%" name="codigo_postal" pattern="[0-9]{4}-[0-9]{3}" required>
            </p>
            <p>
                <label for="telefone">Telefone</label>
                <input class="w3-input" type="tel" style="width:90%" name="telefone" pattern="[0-9]{9}" required>
            </p>
            <p>

                <input class= "w3-input w3-border w3-light-grey" type="submit" value="Registar">
            </p>
        </form>


    </div>
    <div class="w3-container w3-half w3-margin-top">
        <img src="Imagens/fleamarket.jpg" height="930" alt="Fotografia de um mercado">
    </div>
</body>

</html>