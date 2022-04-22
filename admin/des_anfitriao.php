<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idAnfitriao']);

$sql = "UPDATE `anfitriao` SET `deletado_em`=null, `status`='A'  WHERE id_anfitriao = '$id'";
$res = mysqli_query($conexao, $sql);

if ($res) {
    header("location: list_anfitriao.php?desfeito=" . $res);
} 

?>