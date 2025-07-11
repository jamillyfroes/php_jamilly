<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center"><font color="blue">Tabuada</font></h1>
    <?php
        for($i= 0; $i < 11; $i++){ 
            for($j= 0; $j < 11; $j++){
                print $i." x ".$j." = ".$i * $j."<br>";
            }
            print "<br>";
        }
        
    ?>

        <address>
            <center>Jamilly Fróes- Estudante- Técnico de Desenvolvimento de Sistemas</center>
        </address>
</body>
</html>