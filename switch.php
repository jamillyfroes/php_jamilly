<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $s = "lampada";
        switch($s){
            case "casa":
                print "A casa é amarela";
                break;
            case "arvore":
                print "A árvore é bonita";
                break;
            case "lampada":
                print "João apagou a lâmpada";
                break;
            default:
                print "Você não selecionou";
                break;
        }
    ?>
</body>
</html>