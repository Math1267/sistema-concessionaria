<?php

session_start();

$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';

try{

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
 $id_funcionarioVenda = $_SESSION['id_funcionario'];
 $id_carro = $_POST['id_carro'];
}

  $sql = "UPDATE tb_carro SET id_funcionarioVenda = :id_funcionarioVenda WHERE id_carro = :id_carro";


   $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':id_funcionarioVenda' => $id_funcionarioVenda, 
             ':id_carro' => $id_carro        
        ]);

        echo "Veículo Vendido!";
        header("Refresh: 2; URL=vender.php");  
        exit();

    }
 catch (PDOException $e) {

    echo "Erro:::: " . $e->getMessage();
}
?>