<?php include 'header.php' ?>


<?php
    include 'conexao.php';
    include 'funcoes.php';

    $id           = limpaTexto($conexao, $_POST['idAnfitriao']);
    $nome_anfi    = limpaTexto($conexao, $_POST['nome_anfi']);
    $end_anfi     = limpaTexto($conexao, $_POST['end_anfi']);
    $num_anfi     = limpaTexto($conexao, $_POST['num_anfi']);
    $bairro_anfi  = limpaTexto($conexao, $_POST['bairro_anfi']);
    $cidade_anfi  = limpaTexto($conexao, $_POST['cidade_anfi']);
    $uf_anfi      = limpaTexto($conexao, $_POST['uf_anfi']);
    $cep_anfi     = limpaTexto($conexao, limpaSiglas($_POST['cep_anfi']));
    $tel_anfi     = limpaTexto($conexao, limpaSiglas($_POST['tel_anfi']));
    $celular_anfi = limpaTexto($conexao, limpaSiglas($_POST['celular_anfi']));
    $status       = limpaTexto($conexao, $_POST['status']);
    $senha        = limpaTexto($conexao, $_POST['senha']);

    if($status == 'A') {
        
        $sql = "UPDATE anfitriao SET `nome`='$nome_anfi',`status`='A',`endereco`='$end_anfi',`numero`='$num_anfi',`cep`='$cep_anfi',`bairro`='$bairro_anfi',`cidade`='$cidade_anfi',`uf`='$uf_anfi',`tel_fixo`='$tel_anfi',`tel_celular`='$celular_anfi',`atualizado_em`=now(),`senha` = md5('$senha')
        WHERE id_anfitriao = '$id'";
        $res = mysqli_query($conexao, $sql);

    } else {

        $sql = "UPDATE anfitriao SET `nome`='$nome_anfi',`status`='I',`endereco`='$end_anfi',`numero`='$num_anfi',`cep`='$cep_anfi',`bairro`='$bairro_anfi',`cidade`='$cidade_anfi',`uf`='$uf_anfi',`tel_fixo`='$tel_anfi',`tel_celular`='$celular_anfi',`atualizado_em`=now(),`senha` = md5('$senha')
        WHERE id_anfitriao = '$id'";
        $res = mysqli_query($conexao, $sql);

    }




    if($res) {
        mensagens('Anfitrião alterado com sucesso', 'success');
    } else {
        mensagens('Problema ao cadastrar o Anfitrião', 'danger');
    }

?>

<div class="row">
    <div class="col-12">
        <a href="list_anfitriao.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include 'footer.php' ?>