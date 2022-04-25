<?php

// Campos sem Listagem
$sql = "SELECT * FROM usuario WHERE id = '$id'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);

// Listagem de Anfitrião
$sql_anfi_user = "SELECT t2.nome, t2.id_anfitriao
FROM usuario t1
left join anfitriao t2 on t1.vinculo = t2.id_anfitriao
WHERE t1.id = '$id'";
$res_anfi_user = mysqli_query($conexao, $sql_anfi_user);
$dados_anfi_user = mysqli_fetch_assoc($res_anfi_user);

$sql_anfi_all = "SELECT * FROM anfitriao";
$res_anfi_all = mysqli_query($conexao, $sql_anfi_all);

// Listagem de Nível
$sql_nivel_user = "SELECT t2.id_user, t2.nivel_usuario
FROM usuario t1
left join nivel_usuario t2 on t1.nivel = t2.id_user
WHERE t1.id = '$id'";
$res_nivel_user = mysqli_query($conexao, $sql_nivel_user);
$dados_nivel_user = mysqli_fetch_assoc($res_nivel_user);

$sql_nivel_all = "SELECT * FROM nivel_usuario";
$res_nivel_all = mysqli_query($conexao, $sql_nivel_all);

// Listagem de Tipo
$sql_tipo_user = "SELECT t2.id_user, t2.tipo_usuario
FROM usuario t1
left join tipo_usuario t2 on t1.tipo = t2.id_user
WHERE t1.id = '$id'";
$res_tipo_user = mysqli_query($conexao, $sql_tipo_user);
$dados_tipo_user = mysqli_fetch_assoc($res_tipo_user);

$sql_tipo_all = "SELECT * FROM tipo_usuario";
$res_tipo_all = mysqli_query($conexao, $sql_tipo_all);

$foto = $dados['foto'];

if (!$foto == null) {
    $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem do usuário'>";
} else {
    $mostrar_foto = "<img src='img/usuario_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem padrão do usuário'>";
}

?>