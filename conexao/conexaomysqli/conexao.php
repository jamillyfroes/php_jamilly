<?php
    // Habilita relatório detalhado de erros no my sql
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    /*
       Função para conectar no banco de dados
       Retorna um objeto de conexão MySQLi ou interrompe a execução do script em caso de erro.
    */
    
    function conectadb(){
        //configuração
        $endereco = "localhost"; //endereço do servidor MySQL
        $usuario = "root"; //nome de usuário do MySQL
        $senha = ""; //senha do MySQL
        $banco = "empresa"; //nome do banco de dados

        try{
            // criação da conexão
            $con = new mysqli($endereco, $usuario, $senha, $banco);
    
            //definição do conjunto de caracteres para evitar problemas de acentuação
            $con->set_charset("utf8mb4"); //retorna o objeto  de conexão
            return $con; //retorna a conexão estabelecida
            }catch(Exception $e){
            // em caso de erro, exibe uma mensagem e encerra o script
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
    }

?>

    