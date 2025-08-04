<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_clean();//limpa qualquer saída inesperada antes do header

//inclui a conexao com o banco de dados
require("conecta.php");

//obtem o id da imagem da url, garantindo que seja um número inteiro
$id_imagem= isset($_GET['id'])? intval($_GET['id']):0;

//cria a consulta para buscar a imagem no banco de dados
$querySelecionaPorCodigo= "SELECT imagem,tipo_imagem FROM imagens WHERE codigo= ?";

//usa prepared statement PARA MAIOR SEGURANÇA
$stmt= $conexao->prepare($querySelecionaPorCodigo);
$stmt->bind_param("i",$id_imagem);
$stmt->execute();
$resultado= $stmt->get_result();

//verifica se a imagem existe no banco de dados
if($resultado->num_rows>0){
    $imagem= $resultado->fetch_object();

    //define o tipo correto da imagem(fallback para jpg caso estejha vazio)
    $tipoImagem= !empty($imagem->tipo_imagem)? $imagem->tipo_imagem: "imagem/jpeg";
    header("Content-type: ".$tipoImagem);

    //exeibe a imagem armazenada no banco de dados
    echo $imagem->imagem;
}else{
    echo "Imagem não encontrada";
}

//fecha a consulta
$stmt->close();







?>