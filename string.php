<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $idade = 16;
        print "Você tem ".$idade." anos.<br>";
        print "Você tem $idade anos.<br>"; // Você tem 16 anos
        print 'Você tem '.$idade.' anos<br>'; // Você tem 16 anos

        $cidade = "Curitiba";
        $estado = "PR";
        $idade = 325;
        $frase_capital = "A cidade de $cidade é a capital do estado de $estado.";
        $frase_idade = "A cidade de $cidade tem mais de $idade anos.";

        echo "<h3>$frase_capital</h3>";
        echo "<h4>$frase_idade</h4>";

        $idade = 16;
        print "Hoje é seu $idade!<br>";
        print "Hoje é seu ($idade)° aniversário!<br>";
    ?>
</body>
</html>