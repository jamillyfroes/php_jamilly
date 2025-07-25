<?php
     function conectarBanco(){
        $dsn = 'mysql:host=localhost;dbname=empresa;charset=utf8mb4';
        $usuario = 'root';
        $senha = '';

        try{
            $conexao= new PDO($dsn, $usuario, $senha [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return $conexao; // Retorna a conexão estabelecida
        } catch (PDOException $e) {
            error_log("Erro ao conectar ao banco de dados: " . $e->getMessage());
            //log em expor erro ao usuário
            die("Erro ao conectar ao banco de dados.");
        }
     }
?>