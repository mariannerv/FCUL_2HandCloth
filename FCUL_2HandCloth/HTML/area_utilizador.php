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
    <title>FCUL_2Handcloth</title>
</head>

    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card z-index">
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

<body class="w3-light-grey">

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <img src="Imagens/pfp.jpg" style="width:100%" alt="Avatar">
                        <div class="w3-display-bottomleft w3-container w3-text-white">
                            <h2><?php echo $_SESSION['nome']; ?></h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $_SESSION['email']; ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $_SESSION['morada']; ?> , <?php echo $_SESSION['localidade']; ?></p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $_SESSION['telefone']; ?></p>
                        <hr>
                        <p><button class="w3-button w3-block w3-teal w3-left-align" type="submit"><i class="fa fa-search w3-margin-right"></i>
                                <a href="editar_utilizador.php">Edit Profile</a> </button></p>
                        <br>
                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-twothird">

                < class="w3-container w3-card w3-white w3-margin-bottom">
                    <br><br>
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-star fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Preferências
                    </h2>

                        <form class="w3-container w3-card-4" method="post" action="PHP/genero_pref.php">

                            <h5 class="w3-opacity"><b>Tipo de roupa.</b></h5>
                            <label class="w3-checkbox">
                                <input type="checkbox" name="mulher" value="1">
                                <span class="w3-checkmark"></span>
                                Mulher
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="Homem" value="1">
                                <span class="w3-checkmark"></span>
                                Homem
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="unisexo" value="1">
                                <span class="w3-checkmark"></span>
                                Unisexo
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="crianca" value="1">
                                <span class="w3-checkmark"></span>
                                Criança
                            </label>
                            <br><br><br>


                            <h5 class="w3-opacity"><b>Categorias:</b></h5>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="blusas" value="1">
                                <span class="w3-checkmark"></span>
                                Blusas
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="tshirts" value="1">
                                <span class="w3-checkmark"></span>
                                T-shirts
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="top" value="1">
                                <span class="w3-checkmark"></span>
                                Top
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="casaco" value="1">
                                <span class="w3-checkmark"></span>
                                Casaco
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="calcas" value="1">
                                <span class="w3-checkmark"></span>
                                Calças
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="calcoes" value="1">
                                <span class="w3-checkmark"></span>
                                Calções
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="saias" value="1">
                                <span class="w3-checkmark"></span>
                                Saias
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="outrosroupa" value="1">
                                <span class="w3-checkmark"></span>
                                Outros
                            </label>
                            <br>
                            <h6>Acessórios</h6>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="sapatos" value="1">
                                <span class="w3-checkmark"></span>
                                Sapatos
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="malas" value="1">
                                <span class="w3-checkmark"></span>
                                Malas
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="outroacess" value="1">
                                <span class="w3-checkmark"></span>
                                Outros
                            </label>
                            <br><br><br>


                            <h5 class="w3-opacity"><b>Marcas:</b></h5>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="levis" value="1">
                                <span class="w3-checkmark"></span>
                                Levis
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="everlane" value="1">
                                <span class="w3-checkmark"></span>
                                Everlane
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="madeweel" value="1">
                                <span class="w3-checkmark"></span>
                                Madeweel
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="agolde" value="1">
                                <span class="w3-checkmark"></span>
                                Agolde
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="bershka" value="1">
                                <span class="w3-checkmark"></span>
                                Bershka
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="pullebear" value="1">
                                <span class="w3-checkmark"></span>
                                Pull & Bear
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="zara" value="1">
                                <span class="w3-checkmark"></span>
                                Zara
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="tiffosi" value="1">
                                <span class="w3-checkmark"></span>
                                Tiffosi
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="vans" value="1">
                                <span class="w3-checkmark"></span>
                                Vans
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="nike" value="1">
                                <span class="w3-checkmark"></span>
                                Nike
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="newbalance" value="1">
                                <span class="w3-checkmark"></span>
                                New Balance
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="adidas" value="1">
                                <span class="w3-checkmark"></span>
                                Adidas
                            </label>
                            <label class="w3-checkbox ">
                                <input type="checkbox" name="outrasmarcas" value="1">
                                <span class="w3-checkmark"></span>
                                Outras Marcas
                            </label>
                            <br><br><br>


                            <div class="w3-dropdown-hover">
                                <button class="w3-button w3-teal">Tamanhos</button>

                                <div class="w3-dropdown-content w3-bar-block w3-border" style="width: 500px;">
                                    <h3 class="w3-bar-item w3-teal">Partes de cima</h3>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="XXS" value="1"> XXS
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="XS" value="1"> XS
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="S" value="1"> S
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="M" value="1"> M
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="L" value="1"> L
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="XL" value="1"> XL
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="XXL" value="1"> XXL
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="3XL" value="1"> 3XL
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="+3XL" value="1"> +3xl
                                    </label>
                                    <h3 class="w3-bar-item w3-teal">Partes de baixo</h3>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="32" value="1"> 32
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="34" value="1"> 34
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="36" value="1"> 36
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="38" value="1"> 38
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="40" value="1"> 40
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="42" value="1"> 42
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="44" value="1"> 44
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="46" value="1"> 46
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="+48" value="1"> +48
                                    </label>

                                    <h3 class="w3-bar-item w3-teal">Sapatos</h3>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="<35" value="1"> 34
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="35" value="1"> 35
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="36" value="1"> 36
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="37" value="1"> 37
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="38" value="1"> 38
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="39" value="1"> 39
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="40" value="1"> 40
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="41" value="1"> 41
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="42" value="1"> 42
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="43" value="1"> 43
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="44" value="1"> 44
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="45" value="1"> 45
                                    </label>
                                    <label class="w3-bar-item">
                                        <input type="checkbox" name="46" value="1"> +48
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <button class="w3-button w3-red">Guardar</button>
                            <br><br>

                        </form>


                </div>
                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-tag fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Recomendações</h2>
                        <p>Work in progress...</p>
                    </div>
                </div>

                <!-- End Right Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

    <footer class="w3-container w3-teal w3-center w3-margin-top">

        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

    </body>


</html>