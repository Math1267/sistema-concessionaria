<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Carros</title>
    <link rel="stylesheet" href="listar.css">
    <link rel="icon"  href="../img/carroicone.svg">
</head>
<body>

<?php

$host = 'localhost';
$dbname = 'BD_RevendedoraDeCarros';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=BD_revendedoraCarros;port=3307;charset=utf8", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>Carros com acessórios:</h2>";

    $consulta = $pdo->query("SELECT * FROM vw_carroAcessorio");

    echo "<table border='1'>";
    echo "<tr>
            <th>Placa</th>
            <th>Acessório</th>
          </tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$linha['Placa']}</td>
            <td>{$linha['Acessorio']}</td>
              </tr>";
    }

    echo "</table>";
   

} catch (PDOException $e) {
    echo "Erro:::: " . $e->getMessage();
}
?>

<a href="../principal/index.html" class="btn secondary">Voltar ao início</a>

</body>

</html>