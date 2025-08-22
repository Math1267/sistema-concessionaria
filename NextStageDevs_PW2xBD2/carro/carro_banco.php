<?php
session_start();
// Definindo as variáveis de conexão ao banco de dados
$host = 'localhost'; // Define o endereço do servidor onde o banco está hospedado. O valor da variável $host pode ser "localhost" (se o banco estiver na mesma máquina) ou um IP/nome de domínio.
$dbname = 'BD_RevendedoraCarros'; // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = 'root'; // Senha do banco de dados

try {
    // Conectando ao banco de dados 

    // A linha de código em PHP utiliza PDO (PHP Data Objects) para estabelecer uma conexão com um banco de dados MySQL. Cria uma nova instância da classe, que é usada para interagir com bancos de dados.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3307;charset=utf8", $username, $password);

    // Configura o PDO para lançar exceções em caso de erro. É recomendável configurar o modo de erro para capturar exceções e evitar falhas em tempo de execução:
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtendo os valores do formulário HTML
        $cd_placa = $_POST['cd_placa'];
        $cd_chassi = $_POST['cd_chassi'];  
        $vl_carro = $_POST['vl_carro'];
        $qt_quilometragem = $_POST['qt_quilometragem'];
        $id_modelo = $_POST['id_modelo'];
        $id_cor = $_POST['id_cor'];
        $id_funcionario = $_SESSION['id_funcionario'];
       

        // Preparando a query de inserção
        $sql = "INSERT INTO tb_carro (cd_placa,cd_chassi,vl_carro,qt_quilometragem,id_modelo,id_cor,id_funcionario) VALUES (:cd_placa,:cd_chassi,:vl_carro,:qt_quilometragem,:id_modelo,:id_cor,:id_funcionario)";
        


        //A próxima linha prepara uma instrução SQL antes de sua execução no banco de dados.
        
        $stmt = $pdo->prepare($sql);
        
        // $pdo é o objeto da classe PDO, que representa a conexão com o banco de dados.
        // O método prepare() é utilizado para preparar uma consulta SQL antes de sua execução.
        // A variável $sql contém a instrução SQL que será preparada.


        // Executando a query com os valores do formulário
        $stmt->execute([
            ':cd_placa' => $cd_placa,
            ':cd_chassi' => $cd_chassi,
            ':vl_carro' => $vl_carro,
            ':qt_quilometragem' => $qt_quilometragem,
            ':id_modelo' => $id_modelo,
            ':id_cor' => $id_cor,
            ':id_funcionario' => $id_funcionario
        ]);



        //echo "Dados gravados com sucesso!";

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=carro.php"); // Aguarda 2 segundos e redireciona
        exit();


    }
} catch (PDOException $e) {
    // Em caso de erro na conexão ou execução da query
    echo "Erro:::: " . $e->getMessage();
}
?>