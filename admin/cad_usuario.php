<?php include 'header.php' ?>


<?php
    include 'conexao.php';
    include 'funcoes.php';

    
    $nome      = limpaTexto($conexao, $_POST['nome_user']);
    $user      = limpaTexto($conexao, limpaSiglas($_POST['user']));
    $senha     = limpaTexto($conexao, limpaSiglas($_POST['senha']));
    $nivel     = $_POST['nivel'];
    $tipo      = $_POST['tipo'];
    $id_anfi   = $_POST['id_anfitriao'];
    $foto      = $_FILES['foto'];
    $nome_foto = move_foto($foto);

    if($nome_foto == 0) {
        $nome_foto = null;
    }

    if($nivel == '2' || $nivel == '3' || $nivel == '4') {

        $sql = "INSERT INTO `usuario`(`nome`, `user`, `senha`, `nivel`, `tipo`, `status`, `criado_em`, `vinculo`, `foto`)
            VALUES ('$nome','$user',md5('$senha'),'$nivel','$tipo','A', now(), '$id_anfi', '$nome_foto')";
        $res = mysqli_query($conexao, $sql);

    } else {

        $sql = "INSERT INTO `usuario`(`nome`, `user`, `senha`, `nivel`, `tipo`, `status`, `criado_em`, `foto`)
            VALUES ('$nome','$user',md5('$senha'),'$nivel','$tipo','A', now(), '$nome_foto')";
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
        <a href="list_usuario.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include 'footer.php' ?>