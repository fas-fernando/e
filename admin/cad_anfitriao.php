<?php include 'header.php' ?>


<?php
    include 'conexao.php';
    include 'funcoes.php';

    $nome     = limpaTexto($conexao, $_POST['nome_anfi']);
    $cnpj     = limpaTexto($conexao, limpaSiglas($_POST['cnpj']));
    $cpf      = limpaTexto($conexao, limpaSiglas($_POST['cpf']));
    $endereco = limpaTexto($conexao, $_POST['end_anfi']);
    $numero   = limpaTexto($conexao, $_POST['num_anfi']);
    $bairro   = limpaTexto($conexao, $_POST['bairro_anfi']);
    $cidade   = limpaTexto($conexao, $_POST['cidade_anfi']);
    $uf       = limpaTexto($conexao, $_POST['uf_anfi']);
    $cep      = limpaTexto($conexao, limpaSiglas($_POST['cep_anfi']));
    $fixo     = limpaTexto($conexao, limpaSiglas($_POST['tel_anfi']));
    $cel      = limpaTexto($conexao, limpaSiglas($_POST['celular_anfi']));

    if ($cnpj) {

        $sql = "INSERT INTO `anfitriao`(`nome`, `cnpj`, `tipo`, `status`, `endereco`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `tel_fixo`, `tel_celular`, `criado_em`)
            VALUES ('$nome','$cnpj','J','A','$endereco','$numero','$cep','$bairro','$cidade','$uf','$fixo','$cel',now())";
        $res = mysqli_query($conexao, $sql);
    } else {

        $sql = "INSERT INTO `anfitriao`(`nome`, `cpf`, `tipo`, `status`, `endereco`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `tel_fixo`, `tel_celular`, `criado_em`)
            VALUES ('$nome','$cpf','F','A','$endereco','$numero','$cep','$bairro','$cidade','$uf','$fixo','$cel',now())";
        $res = mysqli_query($conexao, $sql);
    }

    if($res) {
        mensagens('Anfitrião cadastrado com sucesso', 'success');
    } else {
        mensagens('Problema no cadastro do anfitrião, verifique com o suporte', 'danger');
    }

?>

<div class="row">
    <div class="col-12">
        <a href="list_anfitriao.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include 'footer.php' ?>