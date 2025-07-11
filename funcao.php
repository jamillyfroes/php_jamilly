<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        #index 0123456789012345
        $name= "Stefanie Hatcher";// 16 caracteres
        $lenght= strlen($name);// conta o tamanho da string
        $cmp= strcmp($name, "Brien Le");// compara duas strings, retorna 0 se forem iguais, -1 se a primeira for menor que a segunda e 1 se a primeira for maior que a segunda
        $index= strpos($name,"e");// encontra a posição da primeira ocorrência de uma substring dentro de uma string, retorna o índice da posição ou false se não encontrar
        $first= substr($name, 9, 5);// extrai uma parte da string, começando na posição 9 e com tamanho 5, retornando a substring "Hatch"
        $name = strtoupper($name);// converte a string para maiúsculas

        echo "O nome é: $name <br>";
        echo "O tamanho do nome é: $lenght <br>";
        echo "A comparação do nome com Brien Le é: $cmp <br>";
        echo "A posição do primeiro 'e' é: $index <br>";
        echo "A substring do nome é: $first <br>";
        echo "O nome em maiúsculas é: $name <br>";
        echo "Jamilly Fróes";
    ?>
</body>
</html>