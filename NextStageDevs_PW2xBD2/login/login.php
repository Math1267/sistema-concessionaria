<?php

session_start();

$host = 'localhost';
$dbname = 'BD_RevendedoraCarros';
$username = 'root';
$password = 'root';
$port = '3307';

$login = $_POST["cd_identificacao"];
$entrar = $_POST["entrar"];
$senha = $_POST["cd_senha"];

$conn = mysqli_connect($host, $username, $password, $dbname,$port);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if (isset($entrar)) {
    $verifica = mysqli_query($conn, "SELECT * FROM tb_funcionario WHERE cd_identificacao = '$login' AND cd_senha = '$senha'")
        or die("Erro ao selecionar");

    if (mysqli_num_rows($verifica) <= 0) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');
            window.location.href='login.html';
        </script>";
        die();
    } else {
        setcookie("login", $login);

        //Salva o login
         $funcionario = mysqli_fetch_assoc($verifica);
        $_SESSION['id_funcionario'] = $funcionario['id_funcionario']; 
        $_SESSION['cd_identificacao'] = $funcionario['cd_identificacao']; 
        header("Location: ../principal/index.html");
        exit;
    }
}
?>

