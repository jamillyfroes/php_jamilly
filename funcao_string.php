<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $vogais = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U"); // Esta é a forma de declarar um array
    echo "Hello World of PHP <br>";
    $cons = str_replace($vogais, "", "Hello World of PHP");
    echo "Consoantes: $cons <br>";
    
    //              012345678901
    $teste = "Hello World!";
    print "Posição da letra 'o': ";
    print strpos($teste, "o") . "<br>";
    print "Posição da letra 'o' após o 5°: ";
    print strpos($teste, "o", 5) . "<hr>";
    
    $message = "troca letra uma a uma";
    echo $message . "<br>";
    $new_message = strtr($message, 'abcdef', '123456');
    echo 'Criptografando: ' . $new_message . "<br>";
    $new_message = strtr($new_message, '123456', 'abcdef');
    echo 'Descriptografando: ' . $new_message . "<br>";
?>
    
<address>
            <center>Jamilly Fróes- Estudante- Técnico de Desenvolvimento de Sistemas</center>
</address>
</body>
</html>