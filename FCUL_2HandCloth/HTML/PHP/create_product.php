<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Estabelece uma ligação com a base de dados usando o programa abreconexao.php
    // A variável $conn é inicializada com a ligação estabelecida
    

    session_start();
    if(!isset($_SESSION['nome'])) {
      // Redirect to login page if user is not authenticated
      header("Location: login.php");
      exit();
    }
    
    // Handle form submission
    include "abreconexao.php";
      
    // Check connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
      
    // Get form data and sanitize it
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $photo_name = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME); // Get the image name without extension
    $nome =  $_SESSION['nome'];

    /* insert data into products */
    $sql = "INSERT INTO clothes_listings (title, description, category, type, size, brand, state, price, photo_name, nome) VALUES ('$title', '$description', '$category', '$type', '$size', '$brand', '$state', '$price', '$photo_name', '$nome')";
    $res = mysqli_query($conn, $sql);
    $caminho = "../Imagens/" . $_FILES['photo']['name'];

    if($res) {
        // Upload photo to server
        move_uploaded_file($_FILES['photo']['tmp_name'], $caminho);
        echo "Produto inserido com sucesso";
        header("Location: ../home.php");
        exit;
    } else {
        echo "Erro: insert failed" . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Termina a ligação com a base de dados
    mysqli_close($conn);
?>
