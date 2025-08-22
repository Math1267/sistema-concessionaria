<?php
$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nm_carroceria = $_POST['nm_carroceria'];
}

  $sql = "INSERT INTO tb_carroceria (nm_carroceria) VALUES (:nm_carroceria)";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nm_carroceria' => $nm_carroceria,         
        ]);

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=carroceria.html");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>