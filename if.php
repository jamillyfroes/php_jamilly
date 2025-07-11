<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    #$nome = "Xenia";
    #$nome = null;
    // Isset verifica se a variável não é nula - usar na tela de login
    if (isset($nome)) {
        print "Esta linha não vai ser alcançada.";
    }
?>
</body>
</html>