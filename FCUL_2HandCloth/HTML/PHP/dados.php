<?php
// Estabelece uma ligação com a base de dados usando o programa abreconexao.php
// A variável $conn é inicializada com a ligação estabelecida
include "abreconexao.php";

$sql = "SELECT * FROM registos";

$result=mysqli_query($conn, $sql);

// Imprimir os dados da tabela
echo "<table>";
echo "<tr style='background-color: #AFE1AF;'><th>Nome</th><th>Password</th><th>Email</th><th>Genero</th><th>Data de Nascimento</th><th>Morada</th><th>Localidade</th><th>Telefone</th><th>Código Postal</th></tr>";


foreach ($result as $row) {
    echo "<tr>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["nome"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["passwd"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["email"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["genero"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["data_nascimento"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["morada"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["localidade"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["telefone"] . "</td>";
    echo "<td style='border: 2px solid #ddd; padding: 8px;'>" . $row["codigo_postal"] . "</td>";
    echo "</tr>";
}
echo "</table>";
        

mysqli_close($conn);

?>
