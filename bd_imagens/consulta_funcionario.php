<?php
//conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagens';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //recupera todos ps funcionarios do banco de dados
    $sql="SELECT id, nome FROM funcionarios";
    $stmt=$pdo->prepare($sql);//prepara a instrução sql para execução
    $stmt->execute();//executa a intrução sql

    $funcionarios=$stmt->fetchALL(PDO::FETCH_ASSOC);//busca todos os resultados como uma matrizassociativa

    //verifica se foi solicitado a exclusão de um funcionario
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['excluir_id'])){
        $excluir_id= $_POST['excluir_id'];
        $sql_excluir="DELETE FROM funcionarios WHERE id= :id";
        $stmt_excluir= $pdo->prepare($sql_excluir);//prepara a instrução sql para execução
        $stmt_excluir->bindParam(':id', $excluir_id,PDO::PARAM_INT);//protege o id
        $stmt_excluir->execute();//Executa a instrução $sql_excluir

        //redireciona para evitar reeenvio de formulário
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

}catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();//exibe a mensagem de erro se a consulta ou a conexão falhar
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Consulta de funcionários</title>
</head>
<body>
    <h1>Consulta de Funcionários</h1>
    <ul>
        <?php foreach($funcionarios as $funcionario): ?>
        <li>
            <!-- A linha abaixo exibe o link para visualizar os detalhes do funcionario com basde no id-->
            <a href="visualizar_funcionario.php?id=<?$funcionario['id']?>">
                <!-- A linha abaixo exibe o nome do funcionario-->
                <?=htmlspecialchars($funcionario['nome'])?>
            </a>
            <!--Formulario para excluir funcionarios-->
            <form method="POST" style="display:inline;">
                <input type="hidden" name= "excluir_id" value="<?=$funcionario['id']?>">
                <button type="submit">Excluir</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>