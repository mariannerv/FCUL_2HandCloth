<?php
// Estabelece uma ligação com a base de dados usando o programa abreconexao.php
// A variável $conn é inicializada com a ligação estabelecida
include "abreconexao.php";

$sql = "SELECT * FROM historico_vendas";

$result=mysqli_query($conn, $sql);

echo "<table>";
echo "<tr style='background-color: #AFE1AF;'><th>ID Transação</th><th>produto_id</th><th>comprador_id</th><th>vendedor_id</th><th>Data de Venda</th></tr>";


foreach ($result as $row) {
    echo "<tr>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["id"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["produto_id"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["comprador_id"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["vendedor_id"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["data_venda"] . "</td>";
    echo "</tr>";
}
echo "</table>";
        

mysqli_close($conn);

?>
