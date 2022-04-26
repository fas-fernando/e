<?php

// Bloco de anfitrião - Admin
$sql_anfi = "SELECT COUNT(id_anfitriao) as quantidade
FROM anfitriao
WHERE status = 'A'";
$res_anfi = mysqli_query($conexao, $sql_anfi);
$dados_anfi = mysqli_fetch_assoc($res_anfi);

// Bloco de usuário - Admin
$sql_user = "SELECT COUNT(id) as quantidade
FROM usuario
WHERE status = 'A'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);

// Bloco de usuário - Admin
$sql_boleiro = "SELECT COUNT(t1.id) as quantidade
FROM boleiro t1
left join usuario t2 on t1.id = t2.vinculo
WHERE t2.status = 'A'";
$res_boleiro = mysqli_query($conexao, $sql_boleiro);
$dados_boleiro = mysqli_fetch_assoc($res_boleiro);

// Bloco de usuário - Anfitrião
$sql_user_anfi = "SELECT COUNT(t1.id) AS quantidade
FROM usuario t1
LEFT JOIN anfitriao t2 ON t1.vinculo = t2.id_anfitriao
WHERE t1.status = 'A' AND t1.vinculo = '$vinculo'";
$res_user_anfi = mysqli_query($conexao, $sql_user_anfi);
$dados_user_anfi = mysqli_fetch_assoc($res_user_anfi);

?>