<?php
// Estabelece uma ligação com a base de dados usando o programa abreconexao.php
// A variável $conn é inicializada com a ligação estabelecida
include "abreconexao.php";

$sql = "SELECT * FROM clothes_listings";

$result=mysqli_query($conn, $sql);

// Imprimir os dados da tabela
echo "<table>";
echo "<tr style='background-color: #AFE1AF;'><th>Title</th><th>Description</th><th>Category</th><th>Type</th><th>Size</th><th>Brand</th><th>State</th><th>Price</th><th>Photo</th></tr>";


foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['size'] . "</td>";
    echo "<td>" . $row['brand'] . "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['photo'] . "</td>";
    echo "</tr>";
}

echo "</table>";

  



mysqli_close($conn);

?>
