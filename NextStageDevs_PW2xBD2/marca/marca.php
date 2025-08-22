<?php
$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nm_marca = $_POST['nm_marca'];
}

  $sql = "INSERT INTO tb_marca (nm_marca) VALUES (:nm_marca)";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nm_marca' => $nm_marca,         
        ]);

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=marca.html");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>