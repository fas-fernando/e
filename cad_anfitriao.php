<?php include 'layout/header.php' ?>


<?php
    include 'conexao.php';
    include 'funcoes.php';

    $nome     = $_POST['nome_anfi'];
    $cnpj     = $_POST['cnpj'];
    $cpf      = $_POST['cpf'];
    $endereco = $_POST['end_anfi'];
    $numero   = $_POST['num_anfi'];
    $bairro   = $_POST['bairro_anfi'];
    $cidade   = $_POST['cidade_anfi'];
    $uf       = $_POST['uf_anfi'];
    $cep      = $_POST['cep_anfi'];
    $fixo     = $_POST['tel_anfi'];
    $cel      = $_POST['celular_anfi'];

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

<?php include 'layout/footer.php' ?>