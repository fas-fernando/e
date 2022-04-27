<?php

// Tela principal do Perfil
$sql_user = "SELECT t1.foto, t1.nome, t2.nivel_usuario, t3.nome as nm_anfitriao, t1.user, t4.tipo_usuario
FROM usuario t1
left join nivel_usuario t2 on t1.nivel = t2.id_user
left join anfitriao t3     on t1.vinculo = t3.id_anfitriao
left join tipo_usuario t4  on t1.tipo = t4.id_user
WHERE t1.id = '$iden'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);

// Dados da Quadra do anfitrião
$sql_anfitriao = "SELECT t1.* 
FROM anfitriao t1
LEFT JOIN usuario t2 ON t1.id_anfitriao = t2.vinculo
WHERE t2.vinculo = '$vinculo'";
$res_anfitriao = mysqli_query($conexao, $sql_anfitriao);
$dados_anfitriao = mysqli_fetch_assoc($res_anfitriao);

// Dados dos horários do anfitrião
$sql_horario_anfi = "SELECT * 
FROM hora_anfitriao
WHERE id_anfitriao = '$vinculo'";
$res_horario_anfi = mysqli_query($conexao, $sql_horario_anfi);
$dados_hora_anfi = mysqli_fetch_assoc($res_horario_anfi);

?>