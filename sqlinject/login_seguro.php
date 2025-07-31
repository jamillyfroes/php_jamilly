<?php
// Confiuguração do banco de dados
$servidor= "localhost";
$usuario= "root";
$senha= "";
$banco= "empresa_teste";

// Conexão usando Mysqli sem proteção contra SQL Injection
$conexao= new mysqli($servidor, $usuario,$senha, $banco);

//Verifica  se há erro na conexão
if($conexao->connect_error){
    die("Erro de conexão:".$conexao->connect_error);
}

// Captura os dados do formulário(nome de usuário)
$nome= $_POST['nome'];

// Prepara a consulta SQL segura
$stmt= $conexao->prepare("SELECT * FROM cliente_teste WHERE nome= ?");
$stmt->bind_param("s", $nome);
$stmt->execute();
$result= $stmt->get_result();


// Executa a consulta SEM proteção contra SQL Injection
$sql="SELECT * FROM cliente_teste WHERE nome= '$nome'";
$result= $conexao->query($sql);

//se houver resultado , o login é considerado bem-sucedido
if ($result->num_rows> 0){
    header ("Location: area_restrita.php");
    // Garantindo que o código para aqui para evitar execução indevida
    exit();
}else{
    echo "Nome não encontrado";
}

// Fecha a consulta e a conexão
$stmt->close();
$conexao->close();
//Jamilly Fróes
?>