<?php
    $bdServidor= 'localhost';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco= 'jamilly_froes';
    $conexao= mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
    if(mysqli_connect_errno()) {
        echo "Problemas para conectar no banco. Verifique os dados informados.";
        die();
    }

    function buscar_tarefas($conexao){
        $sqlBusca= 'SELECT * FROM tarefas';
        $resultado= mysqli_query($conexao, $sqlBusca);
        $tarefas = array();
        while($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }
    return $tarefas;
    }

    function gravar_tarefa($conexao, $tarefa){
        $sqlGravar="
        INSERT INTO tarefas (nome, descricao, prazo, prioridade, concluida)
        VALUES (
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            '{$tarefa['prazo']}',
            '{$tarefa['prioridade']}',
            '{$tarefa['concluida']}'
        )
            ";
            mysqli_query($conexao, $sqlGravar);
    }
?>