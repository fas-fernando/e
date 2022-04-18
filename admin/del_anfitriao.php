<?php include 'header.php' ?>

<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idAnfitriao']);

$sql = "UPDATE `anfitriao` SET `deletado_em`=now(), `status`='I'  WHERE id_anfitriao = '$id'";
$res = mysqli_query($conexao, $sql);

if ($res) {
    mensagens('Anfitrião deletado com sucesso', 'success');
} else {
    mensagens('Problema ao excluir o Anfitrião', 'danger');
}


?>

<div class="row">
    <div class="col-12">
        <a href="list_anfitriao.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include 'footer.php' ?>