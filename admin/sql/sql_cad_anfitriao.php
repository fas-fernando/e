<?php

$sql = "SELECT * FROM anfitriao";
$res = mysqli_query($conexao, $sql);

$sql_user = "SELECT * FROM usuario WHERE id = '$iden'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);


?>