<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "BD_RevendedoraCarros";

$conn = new mysqli($host, $usuario, $senha, $banco, 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT cd_placa, id_carro FROM TB_carro ORDER BY cd_placa";
$resultado = $conn->query($sql);

$sql2 = "SELECT nm_acessorio, id_acessorio FROM TB_acessorio ORDER BY nm_acessorio";
$resultado2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carro Acessório</title>
    <link rel="stylesheet" href="carroacessorio.css?v=1"> <!-- Reaproveita o mesmo CSS -->
    <link rel="icon"  href="../img/carroicone.svg">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Sistema de Gerenciamento</h1>
            <p></p>
        </div>

        <div class="right-panel">
            <h2>Formulário</h2>
            <form action="carroacessoriobanco.php" method="POST">

                <div class="input-group">
                    <label for="id_carro">Carro:</label>
                    <select name="id_carro" id="id_carro" required>
                        <option value="">Escolha o carro desejado</option>
                        <?php
                        if ($resultado->num_rows > 0) {
                            while($linha = $resultado->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($linha["id_carro"]) . '">' . htmlspecialchars($linha["cd_placa"]) . '</option>';
                            }
                        } else {
                            echo '<option disabled>Nenhum carro disponível</option>';
                        }
                        ?>
                    </select>
                </div>

                
                    <label>Acessórios:</label>
    <?php
    if ($resultado2->num_rows > 0) {
        while($linha = $resultado2->fetch_assoc()) {
            echo '<div>';
            echo '<input type="checkbox" name="id_acessorio[]" value="' . htmlspecialchars($linha["id_acessorio"]) . '" id="acessorio_' . htmlspecialchars($linha["id_acessorio"]) . '">';
            echo '<label for="acessorio_' . htmlspecialchars($linha["id_acessorio"]) . '">' . htmlspecialchars($linha["nm_acessorio"]) . '</label>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum acessório disponível</p>';
    }
    ?>
                

                <button type="submit" class="btn secondary">Cadastrar</button>
                <a href="../principal/index.html" class="btn secondary">Voltar ao início</a>
            </form>
        </div>
    </div>
</body>
</html>
