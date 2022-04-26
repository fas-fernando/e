<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idUsuario']);

$sql = "UPDATE `usuario` SET `deletado_em` = null, `status` = 'A'  WHERE id = '$id'";
$res = mysqli_query($conexao, $sql);

if ($res) {
    header("location: list_usuario.php?desfeito=" . $res);
}

?>