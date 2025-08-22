<?php
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
        $id_combustivel = $_POST['id_combustivel'];
        $id_cambio = $_POST['id_cambio'];  
        $id_carroceria = $_POST['id_carroceria'];
        $id_marca = $_POST['id_marca'];
        $nm_modelo = $_POST['nm_modelo'];
        $aa_ano = $_POST['aa_ano'];
       

        // Preparando a query de inserção
        $sql = "INSERT INTO tb_modelo (id_combustivel,id_cambio,id_carroceria,id_marca,nm_modelo,aa_ano) VALUES (:id_combustivel,:id_cambio,:id_carroceria,:id_marca,:nm_modelo,:aa_ano)";
        


        //A próxima linha prepara uma instrução SQL antes de sua execução no banco de dados.
        
        $stmt = $pdo->prepare($sql);
        
        // $pdo é o objeto da classe PDO, que representa a conexão com o banco de dados.
        // O método prepare() é utilizado para preparar uma consulta SQL antes de sua execução.
        // A variável $sql contém a instrução SQL que será preparada.


        // Executando a query com os valores do formulário
        $stmt->execute([
            ':id_combustivel' => $id_combustivel,
            ':id_cambio' => $id_cambio,
            ':id_carroceria' => $id_carroceria,
            ':id_marca' => $id_marca,
            ':nm_modelo' => $nm_modelo,
            ':aa_ano' => $aa_ano,
        ]);



        //echo "Dados gravados com sucesso!";

        echo "Dados gravados com sucesso!";
        header("Refresh: 2; URL=modelos.php"); // Aguarda 2 segundos e redireciona
        exit();


    }
} catch (PDOException $e) {
    // Em caso de erro na conexão ou execução da query
    echo "Erro:::: " . $e->getMessage();
}
?>