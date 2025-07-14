<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Tabuada com For</h1>
<?php

     $linha= array(1,2,3,4,5,6,7,8,9,10);
    for ($linha = 1; $linha < 11; $linha++) {
        for ($coluna = 1; $coluna < 11; $coluna++) {
           echo "$linha x $coluna = " . ($linha * $coluna) . "<br>";
          
        }
        echo "<br>";
    }
?>
    <address>
        <center>Jamilly Fróes- Estudante- Técnico de Desenvolvimento de Sistemas</center>
    </address>
</body>
</html>