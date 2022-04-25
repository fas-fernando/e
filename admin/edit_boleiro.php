<?php
    include 'conexao.php';
    include 'funcoes.php';

    $id          = limpaTexto($conexao, $_POST['idBoleiro']);
    $nome        = limpaTexto($conexao, $_POST['nome']);
    $cpf         = limpaTexto($conexao, $_POST['cpf']);
    $nascimento  = alterarData($_POST['nascimento']);
    $email       = limpaTexto($conexao, $_POST['email']);
    $celular     = limpaTexto($conexao, $_POST['celular']);

        
        $sql = "UPDATE boleiro SET `nome` = '$nome', `cpf` = '$cpf', `nascimento` = '$nascimento', `email` = '$email', `celular` = '$celular',  `atualizado_em` = now()
        WHERE id = '$id'";
        $res = mysqli_query($conexao, $sql);

        if ($res) {
            header("location: list_boleiro.php?editar=" . $res);
        }

?>