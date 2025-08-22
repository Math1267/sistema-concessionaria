<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "BD_RevendedoraCarros";
$conn = new mysqli($host, $usuario, $senha, $banco, 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT nm_marca, id_marca FROM TB_marca ORDER BY nm_marca";
$resultado = $conn->query($sql);

$sql2 = "SELECT nm_combustivel, id_combustivel FROM TB_combustivel ORDER BY nm_combustivel";
$resultado2 = $conn->query($sql2);

$sql3 = "SELECT nm_cambio, id_cambio FROM TB_cambio ORDER BY nm_cambio";
$resultado3 = $conn->query($sql3);

$sql4 = "SELECT nm_carroceria, id_carroceria FROM TB_carroceria ORDER BY nm_carroceria";
$resultado4 = $conn->query($sql4);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modelos.css?v=1">
    <title>Cadastro de Modelo</title>
    <link rel="icon"  href="../img/carroicone.svg">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Sistema de Gerenciamento</h1>
            <p></p>
        </div>
        <div class="right-panel">
            <form action="modelos_banco.php" method="POST">
                <h2>Cadastro de Modelo</h2>

                <div class="input-group">
                    <label for="nm_modelo">Nome do modelo:</label>
                    <input type="text" name="nm_modelo" id="nm_modelo" maxlength="40" placeholder="Modelo" required>
                </div>

                <div class="input-group">
                    <label for="ano_modelo">Ano do modelo:</label>
                    <input type="number" name="aa_ano" id="ano_modelo" maxlength="4" placeholder="Ano" required>
                </div>

                <div class="input-group">
                    <label for="id_marca">Marca:</label>
                    <select name="id_marca" required>
                        <option value="">Escolha a marca desejada</option>
                        <?php while ($linha = $resultado->fetch_assoc()): ?>
                            <option value="<?= htmlspecialchars($linha["id_marca"]) ?>"><?= htmlspecialchars($linha["nm_marca"]) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="id_combustivel">Combustível:</label>
                    <select name="id_combustivel" required>
                        <option value="">Escolha o combustível desejado</option>
                        <?php while ($linha = $resultado2->fetch_assoc()): ?>
                            <option value="<?= htmlspecialchars($linha["id_combustivel"]) ?>"><?= htmlspecialchars($linha["nm_combustivel"]) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="id_cambio">Câmbio:</label>
                    <select name="id_cambio" required>
                        <option value="">Escolha o câmbio desejado</option>
                        <?php while ($linha = $resultado3->fetch_assoc()): ?>
                            <option value="<?= htmlspecialchars($linha["id_cambio"]) ?>"><?= htmlspecialchars($linha["nm_cambio"]) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="id_carroceria">Carroceria:</label>
                    <select name="id_carroceria" required>
                        <option value="">Escolha a carroceria desejada</option>
                        <?php while ($linha = $resultado4->fetch_assoc()): ?>
                            <option value="<?= htmlspecialchars($linha["id_carroceria"]) ?>"><?= htmlspecialchars($linha["nm_carroceria"]) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" class="btn primary">Cadastrar</button>
                <a href="../principal/index.html" class="btn secondary">Voltar ao início</a>
            </form>
        </div>
    </div>
</body>
</html>