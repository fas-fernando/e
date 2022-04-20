<?php

    $servidor = 'localhost';
    $usuario  = 'root';
    $senha    = '';
    $banco    = 'evoapp';

    if($conexao = mysqli_connect($servidor, $usuario, $senha, $banco)) {
        // echo 'Banco de Dados conecatado com sucesso';
    } else {
        echo 'Erro na Conexão com o banco de dados';
    }