<?php
session_start();
include('abreconexao.php');
$errorsInst = array();

if(isset($_POST["alterar"])){


    header('Location: editar_utilizador.php');

}

if(isset($_POST["alterei"])){


        $nome =         $_POST["nome"];
        $passwd =         $_POST["passwd"];
        $morada =     $_POST["morada"];
        $localidade =     $_POST["localidade"];
        $telefone =        $_POST["telefone"];
        $codigo_postal =           $_POST["codigo_postal"];

        $passwd = password_hash($passwd, PASSWORD_BCRYPT);

        $teste = $_SESSION['email'];

        $mudar = "UPDATE registos SET nome = '$nome', passwd = '$passwd', morada ='$morada', localidade = '$localidade', telefone = '$telefone', codigo_postal = '$codigo_postal' WHERE email = '$teste'";

        $result = mysqli_query($conn, $mudar);




        if ($conn->query($mudar) === TRUE) {
                    echo "Seu perfil foi atualizado";
                } else {
                    echo "Error: " . $mudar . "<br>" . $conn->error;
                }


        $_SESSION['nome'] = $nome;
        $_SESSION['passwd'] = $passwd;
        $_SESSION['morada'] = $morada;
        $_SESSION['localidade'] = $localidade;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['codigo_postal'] = $codigo_postal;

        header('Location: area_utilizador.php');

        }

