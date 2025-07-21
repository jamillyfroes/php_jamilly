<?php
    $bdServidor= 'localhost';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco= 'jamilly_froes';
    $conexao= mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
    if(mysqli_connect_errno()) {
        echo "Problemas para conectar no banco. Verifique os dados informados.";
        die();
    }
?>