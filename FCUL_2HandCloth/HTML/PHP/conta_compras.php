<?php
// Estabelece uma ligação com a base de dados usando o programa abreconexao.php
// A variável $conn é inicializada com a ligação estabelecida
include "abreconexao.php";

$sql = "SELECT comprador_id, COUNT(comprador_id) AS n_compras FROM historico_vendas GROUP BY comprador_id ";

$result=mysqli_query($conn, $sql);

echo "<table>";
echo "<tr style='background-color: #AFE1AF;'><th>Comprador ID</th><th>Número de compras</th></tr>";


foreach ($result as $row) {
    echo "<tr>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row['comprador_id'] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row['n_compras'] . "</td>";
    echo "</tr>";
}
echo "</table>";
        

mysqli_close($conn);

?>