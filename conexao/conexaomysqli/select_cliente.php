<?php
//Inclui o arquivo de conexão se há registros retornados
require_once "conexao.php";

//Estabelece conxão
$conexao= conectadb();

$sql= "SELECT id_cliente, nome, email FROM cliente";

$result= $conexao->query($sql);

if(mysqli_num_rows($result)> 0){
    while($linha= $result->fetch_assoc()){
        echo "ID: ".$linha["id_cliente"]." Nome: ".$linha["nome"]." Email: ".$linha["email"]."<br>";
    }
}else{
    echo "Nenhum cliente cadastrado encontrado";}

    $conexao->close();
?>