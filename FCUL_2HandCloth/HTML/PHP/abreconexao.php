<?php
$servername = "appserver-01.alunos.di.fc.ul.pt";
$username = "asw07";
$password = "DDMGrupo07";
$dbname = "asw07";
// Cria a ligação à BD
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica a ligação à BD
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>