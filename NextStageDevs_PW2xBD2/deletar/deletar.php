<?php

// Conexão com o banco de dados
$host = "localhost";
$funcionario = "root"; // funcionario do BD
$senha = "root";       // senha do BD
$banco = "BD_RevendedoraCarros"; //nome do BD


$conn = new mysqli($host, $funcionario, $senha, $banco, 3307);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta cargos
$sql = "SELECT cd_placa, id_carro FROM tb_carro WHERE id_funcionarioVenda IS NULL ORDER BY cd_placa";
$resultado = $conn->query($sql);




?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="deletar.css">
  <link rel="icon"  href="../img/carroicone.svg">
  <title>Deletar Veículo</title>
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <h1>Sistema de Gerenciamento</h1>
    </div>

    <div class="right-panel">
      <form action="deletarbanco.php" method="POST">
        <h2>Selecione o Veículo para Deletar</h2>

        <div class="input-group">
          <label for="id_carro">Veículo:</label>
          <select name="id_carro" id="id_carro" required>
            <option value="">Escolha o veículo desejado</option>
            <?php
              if ($resultado->num_rows > 0) {
                while($linha = $resultado->fetch_assoc()) {
                  echo '<option value="' . htmlspecialchars($linha["id_carro"]) . '">' . htmlspecialchars($linha["cd_placa"]) . '</option>';
                }
              } else {
                echo '<option>Nenhum veículo disponível</option>';
              }
            ?>
          </select>
        </div>

        <button type="submit" class="btn primary">Deletar</button>
        <a href="../principal/index.html" class="btn secondary">Voltar ao início</a>
      </form>
    </div>
  </div>
</body>
</html>
