<?php include 'layout/header.php' ?>


<?php
    include 'conexao.php';
    include 'funcoes.php';

    $id           = $_POST['idAnfitriao'];
    $nome_anfi    = $_POST['nome_anfi'];
    $end_anfi     = $_POST['end_anfi'];
    $num_anfi     = $_POST['num_anfi'];
    $bairro_anfi  = $_POST['bairro_anfi'];
    $cidade_anfi  = $_POST['cidade_anfi'];
    $uf_anfi      = $_POST['uf_anfi'];
    $cep_anfi     = $_POST['cep_anfi'];
    $tel_anfi     = $_POST['tel_anfi'];
    $celular_anfi = $_POST['celular_anfi'];
    $status       = $_POST['status'];

    if($status == 'A') {
        
        $sql = "UPDATE anfitriao SET `nome`='$nome_anfi',`status`='A',`endereco`='$end_anfi',`numero`='$num_anfi',`cep`='$cep_anfi',`bairro`='$bairro_anfi',`cidade`='$cidade_anfi',`uf`='$uf_anfi',`tel_fixo`='$tel_anfi',`tel_celular`='$celular_anfi',`atualizado_em`=now()
        WHERE id_anfitriao = '$id'";
        $res = mysqli_query($conexao, $sql);

    } else {

        $sql = "UPDATE anfitriao SET `nome`='$nome_anfi',`status`='I',`endereco`='$end_anfi',`numero`='$num_anfi',`cep`='$cep_anfi',`bairro`='$bairro_anfi',`cidade`='$cidade_anfi',`uf`='$uf_anfi',`tel_fixo`='$tel_anfi',`tel_celular`='$celular_anfi',`atualizado_em`=now()
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

<?php include 'layout/footer.php' ?>