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
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=BD_RevendedoraCarros;port=3307;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>Vendidos:</h2>";
    $consulta = $pdo->query("SELECT * FROM vw_vendas");

    echo "<table border='1'>";
    echo "<tr>
            <th>Placa</th>
            <th>Chassi</th>
            <th>Valor</th>
            <th>Quilometragem</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Ano</th>
            <th>Cadastrador</th>
            <th>Vendedor</th>
          </tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$linha['Placa']}</td>
                <td>{$linha['Chassi']}</td>
                <td>{$linha['Valor']}</td>
                <td>{$linha['Quilometragem']}</td>
                <td>{$linha['Modelo']}</td>
                <td>{$linha['Cor']}</td>
                <td>{$linha['Ano']}</td>
                <td>{$linha['Cadastrador']}</td>
                <td>{$linha['Vendedor']}</td>
              </tr>";
    }

    echo "</table><hr>";

    echo "<h2>Disponíveis:</h2>";

    // Ordenação para permitir filtrar pelo valor, quilometragem e ano
    $colunasPermitidas = ['Valor', 'Quilometragem', 'Ano'];
    $ordenarPor = isset($_GET['ordenar']) && in_array($_GET['ordenar'], $colunasPermitidas) ? $_GET['ordenar'] : 'Valor';

    $consulta2 = $pdo->query("SELECT * FROM vw_disponiveis ORDER BY $ordenarPor");

    echo "<table border='1'>";
    echo "<tr>
            <th>Placa</th>
            <th>Chassi</th>
            <th><a href='?ordenar=Valor'>Valor</a></th>
            <th><a href='?ordenar=Quilometragem'>Quilometragem</a></th>
            <th>Modelo</th>
            <th>Cor</th>
            <th><a href='?ordenar=Ano'>Ano</a></th>
            <th>Cadastrador</th>
          </tr>";

    while ($linha = $consulta2->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$linha['Placa']}</td>
                <td>{$linha['Chassi']}</td>
                <td>{$linha['Valor']}</td>
                <td>{$linha['Quilometragem']}</td>
                <td>{$linha['Modelo']}</td>
                <td>{$linha['Cor']}</td>
                <td>{$linha['Ano']}</td>
                <td>{$linha['Cadastrador']}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Erro:::: " . $e->getMessage();
}
?>

<a href="../principal/index.html" class="btn secondary">Voltar ao início</a>


</body>