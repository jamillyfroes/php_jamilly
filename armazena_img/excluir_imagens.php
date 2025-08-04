<?php
require("conecta.php");

$id_imagem= isset($_GET['id'])? intval($_GET['id']):0;


//verifica se o id é válido ou seja maior que 0
if($id_imagem>0){
    //cria a query segura usando o prepared statement
    $queryExclusao= "DELETE FROM imagens WHERE codigo = ?";

    //prepara a query
    $stmt= $conexao->prepare($queryExclusao);
    $stmt->bind_param("i",$id_imagem);//define o id como um inteiro
    $stmt->execute();
    $resultado= $stmt->get_result();
    
    if($stmt->execute()){
        echo "Imagem excluída com sucesso!";
    }else{
        die ("Erro ao excluir imagem: ".$stmt->error);
    }

    $stmt->close();
}else{
    echo "ID inválido";
}

    header("location: index.php");
    exit();

?>