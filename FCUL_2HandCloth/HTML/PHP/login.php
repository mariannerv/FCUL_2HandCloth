<?php
session_start();
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Estabelece uma ligação com a base de dados usando o programa abreconexao.php
    // A variável $conn é inicializada com a ligação estabelecida
    include "abreconexao.php";
if (empty($_POST['email']) || empty($_POST['pass'])) {
  echo "Ola";
  header('Location: ../login_index.php');
  exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$query = "SELECT * FROM registos WHERE email = '{$email}'";

$result = mysqli_query($conn, $query);

$linha = mysqli_num_rows($result);


$row = mysqli_fetch_assoc($result);


if ($linha == 1 and password_verify($pass, $row["passwd"])) {
  $_SESSION['nome'] = $row["nome"];
  $_SESSION['pass'] = $row["passwd"];
  $_SESSION['genero'] = $row["genero"];
  $_SESSION['data_nascimento'] = $row["data_nascimento"];
  $_SESSION['morada'] = $row["morada"];
  $_SESSION['localidade'] = $row["localidade"];
  $_SESSION['telefone'] = $row["telefone"];
  $_SESSION['email'] = $row["email"];
  $_SESSION['codigo_postal'] = $row["codigo_postal"];
  $_SESSION['last_checked_timestamp'] = time();
  header('Location: ../area_utilizador.php');
  exit();
} else {
  $_SESSION['sem_registo'] = true;
  header('Location: ../login_index.php');
  exit();
}