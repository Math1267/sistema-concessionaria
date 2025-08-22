<?php
$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nm_cambio = $_POST['nm_cambio'];
}

  $sql = "INSERT INTO tb_cambio (nm_cambio) VALUES (:nm_cambio)";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nm_cambio' => $nm_cambio,         
        ]);

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=cambio.html");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>