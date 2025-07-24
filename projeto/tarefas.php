<?php
session_start();  

    include 'banco.php'; 

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();

    $tarefa['nome'] = $_GET['nome'];

    if (isset($_GET['descricao'])) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (isset($_GET['prazo'])) {
        $tarefa['prazo'] = $_GET['prazo'];
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_GET['prioridade'];

    if (isset($_GET['concluida'])) {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }

    // Inicializa a sessão 'lista_tarefas' como array, se ainda não existir
    if (!isset($_SESSION['lista_tarefas'])) {
        $_SESSION['lista_tarefas'] = [];
    }

    gravar_tarefa($conexao, $tarefa);

   
}

$lista_tarefas= buscar_tarefas($conexao);

include "template/template.php";

?>