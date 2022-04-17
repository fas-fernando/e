<?php include 'layout/header.php' ?>

<?php

include 'conexao.php';
include 'funcoes.php';

$id = $_POST['idAnfitriao'];

$sql = "UPDATE `anfitriao` SET `deletado_em`=null, `status`='A'  WHERE id_anfitriao = '$id'";
$res = mysqli_query($conexao, $sql);

if ($res) {
    mensagens('Desfeito a exclusão do anfitrião com sucesso', 'success');
} else {
    mensagens('Problema ao excluir o Anfitrião', 'danger');
}


?>

<div class="row">
    <div class="col-12">
        <a href="list_anfitriao.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include 'layout/footer.php' ?>