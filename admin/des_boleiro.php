<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idBoleiro']);

$sql_boleiro = "UPDATE `boleiro` SET `deletado_em` = null WHERE id = '$id'";
$res = mysqli_query($conexao, $sql_boleiro);

$sql_user = "UPDATE usuario SET `deletado_em` = null, `status` = 'A' WHERE vinculo = '$id'";
$res = mysqli_query($conexao, $sql_user);


if ($res) {
    mensagens('Desfeito a exclusão do anfitrião com sucesso', 'success');
} else {
    mensagens('Problema ao excluir o Anfitrião', 'danger');
}

if($res) {
    header('location: list_boleiro.php?desfazer=' . $res);
}


?>