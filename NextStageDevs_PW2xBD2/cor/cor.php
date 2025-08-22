<?php
$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nm_cor = $_POST['nm_cor'];
}

  $sql = "INSERT INTO tb_cor (nm_cor) VALUES (:nm_cor)";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nm_cor' => $nm_cor,         
        ]);

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=cor.html");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>