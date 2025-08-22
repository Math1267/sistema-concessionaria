<?php
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';
$host = 'localhost';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carro'])) {
        $id_carro = $_POST['id_carro'];

        // Excluir acessórios vinculados ao carro
        $stmt = $pdo->prepare("DELETE FROM tb_carroacessorio WHERE id_carro = :id_carro");
        $stmt->execute([':id_carro' => $id_carro]);

        // Excluir o carro
        $stmt = $pdo->prepare("DELETE FROM tb_carro WHERE id_carro = :id_carro");
        $stmt->execute([':id_carro' => $id_carro]);

        echo "Carro e acessórios excluídos com sucesso!";
        header("Refresh: 2; URL=deletar.php");
        exit();
    } else {
        echo "ID do carro não fornecido.";
    }
} catch (PDOException $e) {
    echo "Erro:::: " . $e->getMessage();
}
?>
