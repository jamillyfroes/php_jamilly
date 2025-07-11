<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $estados= array("PR", "SC", "RS"," SP", "RJ", "MG", "BA", "RN", "AM");
        echo "ORIGINAL:";
        print_r($estados);
        echo "<hr>STRTOLOWER: Converte uma string para minúsculas<br>"
        for($i = 0; $i < count($estados); $i++){
            $estados[$i] = strtolower($estados[$i]);
        }
        echo "STRTOLOWER:"; print_r($estados);
        echo "<hr> SHIFT:"; print_r($estados);
        echo "<hr>POP: Extrai o primeiro  elemento de um array<br>";
        array_pop($estados);
        echo "<hr>PUSH: "; print_r($estados);
        echo "REVERSE: "; print_r($inverso);
        echo "<hr> SORT: Ordena os elementos de um array em ordem crescente<br>";
        sort($estados);
        echo "SORT: "; print_r($estados);
        echo "<hr>SLICE: Extrai uma parte de um array<br>";
        $dividir = array_slice($estados, 1, 2);
        echo "SLICE: "; print_r($dividir); echo "<br>";


</body>
</html>