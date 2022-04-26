<?php

include 'conexao.php';
include 'funcoes.php';

$id = limpaTexto($conexao, $_POST['idUsuario']);

$sql = "UPDATE `usuario` SET `deletado_em` = now(), `status` = 'I'  WHERE id = '$id'";
$res = mysqli_query($conexao, $sql);

if ($res) {
    header("location: list_usuario.php?delete=" . $res);
}

?>