<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Estabelece uma ligação com a base de dados usando o programa abreconexao.php
    // A variável $conn é inicializada com a ligação estabelecida
    include "abreconexao.php";


    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $passwd = isset($_POST['passwd']) ? htmlspecialchars($_POST['passwd']) : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
    $morada = isset($_POST['morada']) ? htmlspecialchars($_POST['morada']) : '';
    $localidade = isset($_POST['localidade']) ? htmlspecialchars($_POST['localidade']) : '';
    $codigo_postal = isset($_POST['codigo_postal']) ? htmlspecialchars($_POST['codigo_postal']) : '';
    $telefone = isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : '';
    $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';


    $passwd = password_hash($passwd, PASSWORD_BCRYPT);

    $query = "INSERT INTO registos (codigo_postal, nome, passwd, genero, data_nascimento, morada, localidade, telefone, email)
        VALUES ('$codigo_postal', '$nome', '$passwd', '$genero', '$data_nascimento', '$morada', '$localidade', '$telefone', '$email')";

    $res = mysqli_query($conn, $query);

    if ($res) {
        echo "Um novo registo inserido com sucesso";
        header("Location: ../home.php");
        exit;
    } else {
        echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    }

    // Termina a ligação com a base de dados
    mysqli_close($conn);
?>