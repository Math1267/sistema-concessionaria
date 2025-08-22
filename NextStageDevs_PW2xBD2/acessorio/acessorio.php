<?php
$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nm_acessorio = $_POST['nm_acessorio'];
}

  $sql = "INSERT INTO tb_acessorio (nm_acessorio) VALUES (:nm_acessorio)";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nm_acessorio' => $nm_acessorio,         
        ]);

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=acessorio.html");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>