<?php

// Listar todos os esportes
$sql_esportes = "SELECT * FROM esportes";
$res_esportes = mysqli_query($conexao, $sql_esportes);

while($dados_esp = mysqli_fetch_assoc($res_esportes)){
    $id_esp[] = $dados_esp['id_esportes'];
}

// Listar todas as modalidades
$sql_modalidades = "SELECT * FROM modalidades";
$res_modalidades = mysqli_query($conexao, $sql_modalidades);

while($dados_mod = mysqli_fetch_assoc($res_modalidades)){
    $id_mod[] = $dados_mod['id_modalidade'];
}

// Listar todas as caracteristicas
$sql_carac = "SELECT * FROM caracteristicas";
$res_carac = mysqli_query($conexao, $sql_carac);

while($dados_carac = mysqli_fetch_assoc($res_carac)){
    $id_carac[] = $dados_carac['id_carac'];
}

$sql_dtl = "SELECT * FROM anfitriao WHERE id_anfitriao = '$id'";
$res_dtl = mysqli_query($conexao, $sql_dtl);
$dados_dtl = mysqli_fetch_assoc($res_dtl);

$foto = $dados_dtl['foto'];
$carac = $dados_dtl['id_caracteristicas'];
$components = explode(",", $carac);

// echo "<pre>";
// print_r($components);
// echo "</pre>";
// die();

?>