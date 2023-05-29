<?php
session_start();
include('abreconexao.php');
$email = $_SESSION['email'];
$query = "SELECT * FROM preferencias WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
#$linha = mysqli_num_rows($result);

$mulher = $user['mulher'];
$homem = $user['homem'];
$unisexo = $user['unisexo'];
$crianca = $user['crianca'];
$blusas = $user['blusas'];
$tshirt = $user['tshirt'];
$top = $user['top'];
$casaco = $user['casaco'];
$calcas = $user['calcas'];
$calcoes = $user['calcoes'];
$saia = $user['saia'];
$outro_roupa = $user['outro_roupa'];
$sapato = $user['sapato'];
$mala = $user['mala'];
$outro_acess = $user['outro_acess'];
$levis = $user['levis'];
$everlane = $user['everlane'];
$madeweel = $user['madeweel'];
$agolde = $user['agolde'];
$bershka = $user['bershka'];
$pullebear = $user['pullebear'];
$zara = $user['zara'];
$tiffosi = $user['tiffosi'];
$vans = $user['vans'];
$nike = $user['nike'];
$newbalance = $user['newbalance'];
$adidas = $user['adidas'];
$outro_marca = $user['outro_marca'];
$tm1 = $user['tm1'];
$tm2 = $user['tm2'];
$tm3 = $user['tm3'];
$tm4 = $user['tm4'];
$tm5 = $user['tm5'];
$tm6 = $user['tm6'];
$tm7 = $user['tm7'];
$tm8 = $user['tm8'];
$tm9 = $user['tm9'];
$tm10 = $user['tm10'];
$tm11 = $user['tm11'];
$tm12 = $user['tm12'];
$tm13 = $user['tm13'];
$tm14 = $user['tm14'];
$tm15 = $user['tm15'];
$tm16 = $user['tm16'];
$tm17 = $user['tm17'];
$tm18 = $user['tm18'];
$tm19 = $user['tm19'];
$tm20 = $user['tm20'];
$tm21 = $user['tm21'];
$tm22 = $user['tm22'];
$tm23 = $user['tm23'];
$tm24 = $user['tm624'];
$tm25 = $user['tm25'];
$tm26 = $user['tm26'];
$tm27 = $user['tm27'];
$tm28 = $user['tm28'];
$tm29 = $user['tm29'];
$tm30 = $user['tm830'];
$tm31 = $user['tm931'];

$sql = "SELECT * FROM clothes_listings WHERE 1 = 1";

if ($mulher === "1") {
    $sql .= " AND categoria = 'mulher'";
}
if ($homem === "1") {
    $sql .= " AND category = 'homem'";
}
if ($unisexo === "1") {
    $sql .=  " AND category = 'unisexo'";
}
if ($criança === "1") {
    $sql .= " AND category = 'criança'";
}
if ($blusas === "1") {
    $sql .= "AND type ='blusas'";
}
if ($tshirt === "1") {
    $sql .= "AND type ='tshirt'";
}
if ($top === "1") {
    $sql .= "AND type ='top'";
}
if ($casaco === "1") {
    $sql .= "AND type ='casaco'";
}
if ($calcas === "1") {
    $sql .= "AND type ='calcas'";
}
if ($calcoes === "1") {
    $sql .= "AND type ='calcoes'";
}

if ($saia === "1") {
    $sql .= "AND type ='saia'";
}
if ($outro_roupa === "1") {
    $sql .= "AND type ='outro_roupa'";
}
if ($sapato === "1") {
    $sql .= "AND type ='sapato'";
}
if ($mala === "1") {
    $sql .= "AND type ='mala'";
}
if ($outro_acess === "1") {
    $sql .= "AND type ='outro_acess'";
}
if ($levis === "1") {
    $sql .= "AND brand ='levis'";
}
if ($everlane === "1") {
    $sql .= "AND brand ='everlane'";
}
if ($madeweel === "1") {
    $sql .= "AND brand ='madeweel'";
}
if ($agolde === "1") {
    $sql .= "AND brand ='agolde'";
}
if ($bershka === "1") {
    $sql .= "AND brand ='bershka'";
}
if ($pullebear === "1") {
    $sql .= "AND brand ='pullebear'";
}
if ($zara === "1") {
    $sql .= "AND brand ='zara'";
}
if ($tiffosi === "1") {
    $sql .= "AND brand ='tiffosi'";
}
if ($mulher === "1") {
    $sql .= "AND brand ='tiffosi'";
}
if ($vans === "1") {
    $sql .= "AND brand ='vans'";
}
if ($nike === "1") {
    $sql .= "AND brand ='nike'";
}
if ($newbalance === "1") {
    $sql .= "AND brand ='newbalance'";
}
if ($adidas === "1") {
    $sql .= "AND brand ='adidas'";
}
if ($outro_marca === "1") {
    $sql .= "AND brand ='outro_marca'";
}

/*
if ($tm1 === "1") {
    $tm1 = "tm1";
}
if ($tm2 === "1") {
    $tm2 = "tm2";
}
if ($tm3 === "1") {
    $tm3 = "tm3";
}
if ($tm4 === "1") {
    $tm4 = "tm4";
}
if ($tm5 === "1") {
    $tm5 = "tm5";
}
if ($tm6 === "1") {
    $tm6 = "tm6";
}
if ($tm7 === "1") {
    $tm7 = "tm7";
}
if ($tm8 === "1") {
    $tm8 = "tm8";
}
if ($tm9 === "1") {
    $tm9 = "tm9";
}
if ($tm10 === "1") {
    $tm10 = "tm10";
}
if ($tm11 === "1") {
    $tm11 = "tm11";
}
if ($tm12 === "1") {
    $tm12 = "tm12";
}
if ($tm13 === "1") {
    $tm13 = "tm13";
}
if ($tm14 === "1") {
    $tm14 = "tm14";
}
if ($tm15 === "1") {
    $tm15 = "tm15";
}
if ($tm16 === "1") {
    $tm16 = "tm16";
}
if ($tm17 === "1") {
    $tm17 = "tm17";
}
if ($tm18 === "1") {
    $tm18 = "tm18";
}
if ($tm19 === "1") {
    $tm19 = "tm19";
}
if ($tm20 === "1") {
    $tm20 = "tm20";
}
if ($tm21 === "1") {
    $tm21 = "tm21";
}
if ($tm22 === "1") {
    $tm22 = "tm22";
}
if ($tm23 === "1") {
    $tm23 = "tm23";
}
if ($tm24 === "1") {
    $tm24 = "tm24";
}
if ($tm25 === "1") {
    $tm25 = "tm25";
}
if ($tm26 === "1") {
    $tm26 = "tm26";
}
if ($tm27 === "1") {
    $tm27 = "tm27";
}
if ($tm28 === "1") {
    $tm28 = "tm28";
}
if ($tm29 === "1") {
    $tm29 = "tm29";
}
if ($tm30 === "1") {
    $tm30 = "tm30";
}
if ($tm31 === "1") {
    $tm31 = "tm31";
}*/

// Execute query

$result = mysqli_query($conn, $sql);

// Display results
if (mysqli_num_rows($result) > 0) {
    echo"entro";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "Title: " . $row['title'] . "<br>";
    echo "Description: " . $row['description'] . "<br>";
    echo "Category: " . $row['category'] . "<br>";
    echo "Type: " . $row['type'] . "<br>";
    echo "Brand: " . $row['brand'] . "<br>";
    echo "State: " . $row['state'] . "<br>";
    echo "Price: " . $row['price'] . "<br><br>";
  }
} else {
  echo "No results found.";
}

// Close connection
mysqli_close($conn);
?>
?>