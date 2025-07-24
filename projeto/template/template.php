<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1> 

    <form action="#" method="GET">
        <fieldset>
        <fieldset>
            <legend>Nova Tarefa: </legend>
        <label>Tarefa:
            <input type="text" name="nome" />
        </label>
        <label>Descrição (Opcional):
            <textarea name="descricao"></textarea>
        </label>
        <label>Prazo (Opcional):
            <input type="text" name="prazo" />
        </label>
            
        </fieldset>
        <fieldset>
        <legend>Prioridade</legend>
        <label>
            <input type="radio" name="prioridade" value="1" checked />
            Baixa 
            <input type="radio" name="prioridade" value="2"  />
            Média 
            <input type="radio" name="prioridade" value="3" />
            Alta
        </label>
    </fieldset>
    <label>
        Tarefa concluída:
        <input type="checkbox" name="concluida" value="sim" />
    </label>
    <input type="submit" value="Cadastrar"/>
</fieldset>
  </form>
    <table align="center" border="1" cellpadding="20" cellspacing="0">
    <tr>
        <th align="center" bgcolor>Tarefas</th>
        <th align="center">Descrição</th>
        <th align="center">Prazo</th>
        <th align="center">Prioridade</th>
        <th align="center">Concluída</th>
    </tr>
<?php 
if (!isset($lista_tarefas) || !is_array($lista_tarefas)) {
    $lista_tarefas = [];
}
?>
<?php foreach ($lista_tarefas as $tarefa): ?>
<tr>
   <td align="center"><?php echo $tarefa['nome'];  ?> </td>
   <td align="center"><?php echo $tarefa['descricao'];  ?> </td>
   <td align="center"><?php echo $tarefa['prazo'];  ?> </td>
   <td align="center"><?php echo $tarefa['prioridade'];  ?> </td>
   <td align="center"><?php echo $tarefa['concluida'];  ?> </td>
</tr>
<?php endforeach; ?>
        
    </table>
 </body>
 </html>
