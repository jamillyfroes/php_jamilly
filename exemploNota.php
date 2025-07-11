<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
</head>
<body>
<?php
    $nota=8.5;

    if ($nota>=7.0){
        echo "Você está aprovado(a)! Com nota: ".$nota;
    }

    elseif ($nota >= 5.0 && $nota <= 6.9){
        echo "Você está de recuperacão! Com nota: ".$nota;
    }

    else{
        echo "Você está reprovado(a)! Com nota: ".$nota;
    }

    echo "<br><br>Jamilly Fróes";
?>
</body>
</html>