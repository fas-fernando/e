<?php
    include 'conexao.php';
    include 'funcoes.php';
    
    $nome      = limpaTexto($conexao, $_POST['nome_anfi']);
    $cnpj      = limpaTexto($conexao, limpaSiglas($_POST['cnpj']));
    $cpf       = limpaTexto($conexao, limpaSiglas($_POST['cpf']));
    $endereco  = limpaTexto($conexao, $_POST['end_anfi']);
    $numero    = limpaTexto($conexao, $_POST['num_anfi']);
    $bairro    = limpaTexto($conexao, $_POST['bairro_anfi']);
    $cidade    = limpaTexto($conexao, $_POST['cidade_anfi']);
    $uf        = limpaTexto($conexao, $_POST['uf_anfi']);
    $cep       = limpaTexto($conexao, limpaSiglas($_POST['cep_anfi']));
    $fixo      = limpaTexto($conexao, limpaSiglas($_POST['tel_anfi']));
    $cel       = limpaTexto($conexao, limpaSiglas($_POST['celular_anfi']));
    $foto      = $_FILES['foto'];
    $nome_foto = move_foto($foto);

    if($nome_foto == 0) {
        $nome_foto = null;
    }

    if ($cnpj) {

        $sql = "INSERT INTO `anfitriao`(`nome`, `cnpj`, `tipo`, `status`, `endereco`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `tel_fixo`, `tel_celular`, `criado_em`, `foto`)
            VALUES ('$nome','$cnpj','J','A','$endereco','$numero','$cep','$bairro','$cidade','$uf','$fixo','$cel',now(),'$nome_foto')";
        $res = mysqli_query($conexao, $sql);

        if ($res) {
            header("location: list_anfitriao.php?cadastro=" . $res);
        }
        
    } else {

        $sql = "INSERT INTO `anfitriao`(`nome`, `cpf`, `tipo`, `status`, `endereco`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `tel_fixo`, `tel_celular`, `criado_em`, `foto`)
            VALUES ('$nome','$cpf','F','A','$endereco','$numero','$cep','$bairro','$cidade','$uf','$fixo','$cel',now(),'$nome_foto')";
        $res = mysqli_query($conexao, $sql);

        if ($res) {
            header("location: list_anfitriao.php?cadastro=" . $res);
        }

    }

?>