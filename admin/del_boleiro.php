<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idBoleiro']);

$sql_boleiro = "UPDATE `boleiro` SET `deletado_em` = now() WHERE id = '$id'";
$res = mysqli_query($conexao, $sql_boleiro);

$sql_user = "UPDATE usuario SET `deletado_em` = now(), `status` = 'I' WHERE vinculo = '$id'";
$res = mysqli_query($conexao, $sql_user);

if ($res) {
    mensagens('Anfitrião deletado com sucesso', 'success');
} else {
    mensagens('Problema ao excluir o Anfitrião', 'danger');
}

if($res) {
    header('location: list_boleiro.php?deletar=' . $res);
}


?>