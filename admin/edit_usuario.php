<?php include 'header.php' ?>


<?php
    include 'conexao.php';
    include 'funcoes.php';

    $id          = limpaTexto($conexao, $_POST['idUsuario']);
    $status      = limpaTexto($conexao, $_POST['status']);
    $nome        = limpaTexto($conexao, $_POST['nome_user']);
    $anfitriao   = limpaTexto($conexao, $_POST['id_anfitriao']);
    $nivel       = limpaTexto($conexao, $_POST['id_nivel']);
    $tipo        = limpaTexto($conexao, $_POST['id_tipo']);
    $user        = limpaTexto($conexao, $_POST['user']);
    $senha       = limpaTexto($conexao, $_POST['senha']);

    if($status == 'A') {
        
        $sql = "UPDATE usuario SET `nome` = '$nome', `status` = 'A', `user` = '$user', `senha` = md5('$senha'), `nivel` = '$nivel', `tipo` = '$tipo', `vinculo` = '$anfitriao', `atualizado_em` = now()
        WHERE id = '$id'";
        $res = mysqli_query($conexao, $sql);

    } else {

        $sql = "UPDATE usuario SET `nome` = '$nome', `status` = 'I', `user` = '$user', `senha` = md5('$senha'), `nivel` = '$nivel', `tipo` = '$tipo', `vinculo` = '$anfitriao', `atualizado_em` = now()
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
        <a href="list_usuario.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include 'footer.php' ?>