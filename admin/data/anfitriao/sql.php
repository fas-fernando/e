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

?>