<?php
$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nm_combustivel = $_POST['nm_combustivel'];
}

  $sql = "INSERT INTO tb_combustivel (nm_combustivel) VALUES (:nm_combustivel)";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nm_combustivel' => $nm_combustivel,         
        ]);

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=combustivel.html");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>