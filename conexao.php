<?php

    $conexao = mysqli_connect('localhost', 'root', '', 'evoapp');

    if($conexao) {
        echo 'Banco de Dados conecatdo com sucesso';
    } else {
        echo 'Erro na Conexão com o banco de dados';
    }