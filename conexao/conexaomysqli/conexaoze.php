<?php
//Definição das credidenciais de acesso ao banco de dados 
$nomeservidor= "localhost";
$usuario="root";
$senha="";
$bancodedados="empresa";

//Criação da conexão com mysql
$conn= mysqli_connect($nomeservidor, $usuario,$senha, $bancodedados);

//Definição da conexão
if(!$conn){//caso a conexão falhe
    die("Conexão falhou:". mysqli_connect_error());
}

echo "Conexão bem-sucedida!";

mysqli_set_charset($conn, "utf8mb4");

//Consulta  SQL para obter clientes
$sql= "SELECT id_cliente, nome, email FROM cliente";
$result= mysqli_query($conn, $sql);

if(mysqli_num_rows($result)> 0){
    while($linha= mysqli_fetch_assoc($result)){
        echo "ID: ".$linha["id_cliente"]." Nome:".$linha["nome"]." Email:".$linha["email"]."<br>";
    }
}else{
    echo "Nenhum resultado encontrado";
}

mysqli_close($conn);
?>