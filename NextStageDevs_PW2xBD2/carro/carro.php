<?php

// Conexão com o banco de dados
$host = "localhost";
$usuario = "root"; // usuario do BD
$senha = "root";       // senha do BD
$banco = "BD_RevendedoraCarros"; //nome do BD


$conn = new mysqli($host, $usuario, $senha, $banco, 3307);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta cargos
$sql = "SELECT nm_modelo, id_modelo FROM TB_modelo order by nm_modelo";
$resultado = $conn->query($sql);


$sql2 = "SELECT nm_cor, id_cor FROM TB_cor order by nm_cor";
$resultado2 = $conn->query($sql2);

//$sql3 = "SELECT nm_usuario, id_usuario FROM TB_usuario order by nm_usuario";
//$resultado3 = $conn->query($sql3);


?>


<?php
// Conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "BD_RevendedoraCarros";

$conn = new mysqli($host, $usuario, $senha, $banco, 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT nm_modelo, id_modelo FROM TB_modelo ORDER BY nm_modelo";
$resultado = $conn->query($sql);

$sql2 = "SELECT nm_cor, id_cor FROM TB_cor ORDER BY nm_cor";
$resultado2 = $conn->query($sql2);

//$sql3 = "SELECT nm_usuario, id_usuario FROM TB_usuario ORDER BY nm_usuario";
//$resultado3 = $conn->query($sql3);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carro.css?v=1">
    <link rel="icon"  href="../img/carroicone.svg">
    <title>Cadastro de Carro</title>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Sistema de Gerenciamento</h1>
            <p></p>
        </div>

        <div class="right-panel">
            <form action="carro_banco.php" method="POST">
                <h2>Cadastro de Carro</h2>

                <div class="input-group">
                    <label for="cd_placa">Código da placa:</label>
                    <input type="text" name="cd_placa" id="cd_placa" maxlength="7" placeholder="Placa" required>
                </div>

                <div class="input-group">
                    <label for="cd_chassi">Código do chassi:</label>
                    <input type="text" name="cd_chassi" id="cd_chassi" maxlength="17" placeholder="Chassi" required>
                </div>

                <div class="input-group">
                    <label for="vl_carro">Valor:</label>
                    <input type="number" name="vl_carro" id="vl_carro" maxlength="22" placeholder="Valor" required>
                </div>

                <div class="input-group">
                    <label for="qt_quilometragem">Quilometragem:</label>
                    <input type="number" name="qt_quilometragem" id="qt_quilometragem" maxlength="10" placeholder="Quilometragem" required>
                </div>

                <div class="input-group">
                    <label for="id_modelo">Modelo:</label>
                    <select name="id_modelo" id="id_modelo" required>
                        <option value="">Escolha o modelo desejado</option>
                        <?php while ($linha = $resultado->fetch_assoc()): ?>
                            <option value="<?= htmlspecialchars($linha["id_modelo"]) ?>">
                                <?= htmlspecialchars($linha["nm_modelo"]) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="id_cor">Cor:</label>
                    <select name="id_cor" id="id_cor" required>
                        <option value="">Escolha a cor desejada</option>
                        <?php while ($linha = $resultado2->fetch_assoc()): ?>
                            <option value="<?= htmlspecialchars($linha["id_cor"]) ?>">
                                <?= htmlspecialchars($linha["nm_cor"]) ?>
                            </option>
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
