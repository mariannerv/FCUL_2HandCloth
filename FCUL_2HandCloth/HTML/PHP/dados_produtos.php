<?php
// Estabelece uma ligação com a base de dados usando o programa abreconexao.php
// A variável $conn é inicializada com a ligação estabelecida
include "abreconexao.php";

$sql = "SELECT * FROM clothes_listings";

$result=mysqli_query($conn, $sql);

echo "<table>";
echo "<tr style='background-color: #AFE1AF;'><th>ID Produto</th><th>Title</th><th>Descrição</th><th>Categoria</th><th>Tipo</th><th>Tamanho</th><th>Marca</th><th>Estado</th><th>Preço</th><th>photo_name</th><th>photo_tmp</th><th>Vendedor</th></tr>";


foreach ($result as $row) {
    echo "<tr>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["id"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["title"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["description"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["category"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["type"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["size"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["brand"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["state"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["price"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["photo_name"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["photo_tmp"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["nome"] . "</td>";
    echo "</tr>";
}
echo "</table>";
        

mysqli_close($conn);

?>