<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //Declara variável numérica
        $unidade= 91;
        //Testa se $unidade maior que 90. Retorna um booleano
        $vaiChover= ($unidade > 90);
        //testa se $vaiChover é verdadeiro
        if ($vaiChover) {
            //Se for verdadeiro, imprime a mensagem
            echo "Vai chover com toda certeza absoluta da terra!";
        }
    ?>
</body>
</html>