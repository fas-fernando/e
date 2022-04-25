<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idAnfitriao']);

$sql_anfitriao = "UPDATE `anfitriao` SET `deletado_em`=now(), `status`='I'  WHERE id_anfitriao = '$id'";
$res = mysqli_query($conexao, $sql_anfitriao);

$sql_user = "UPDATE usuario SET `deletado_em` = now(), `status` = 'I' WHERE vinculo = $id";
$res = mysqli_query($conexao, $sql_user);

if ($res) {
    header("location: list_anfitriao.php?delete=" . $res);
}

?>