<?php
include 'conexao.php';
include 'funcoes.php';

$nome      = limpaTexto($conexao, $_POST['nome_anfi']);
$cnpj      = limpaTexto($conexao, limpaSiglas($_POST['cnpj']));
$cpf       = limpaTexto($conexao, limpaSiglas($_POST['cpf']));
$endereco  = limpaTexto($conexao, $_POST['end_anfi']);
$numero    = limpaTexto($conexao, $_POST['num_anfi']);
$bairro    = limpaTexto($conexao, $_POST['bairro_anfi']);
$cidade    = limpaTexto($conexao, $_POST['cidade_anfi']);
$uf        = limpaTexto($conexao, $_POST['uf_anfi']);
$cep       = limpaTexto($conexao, limpaSiglas($_POST['cep_anfi']));
$fixo      = limpaTexto($conexao, limpaSiglas($_POST['tel_anfi']));
$cel       = limpaTexto($conexao, limpaSiglas($_POST['celular_anfi']));
$obs       = limpaTexto($conexao, $_POST['obs']);
$foto      = $_FILES['foto'];

$carac_array        = $_POST['carac'];
$carac_string       = implode(",", $carac_array);
$esportes_array     = $_POST['esportes'];
$esportes_string    = implode(",", $esportes_array);
$modalidades_array  = $_POST['modalidades'];
$modalidades_string = implode(",", $modalidades_array);

$nome_foto = move_foto($foto);

if($nome_foto == 0) {
    $nome_foto = null;
}

if ($cnpj) {

    $sql = "INSERT INTO `anfitriao`(`nome`, `cnpj`, `tipo`, `status`, `id_esportes`, `id_caracteristicas`, `id_modalidade`, `endereco`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `tel_fixo`, `obs`, `tel_celular`, `criado_em`, `foto`)
        VALUES ('$nome','$cnpj','J','A','$esportes_string','$carac_string','$modalidades_string','$endereco','$numero','$cep','$bairro','$cidade','$uf','$fixo','$obs','$cel',now(),'$nome_foto')";
    $res = mysqli_query($conexao, $sql);

    if ($res) {
        header("location: list_anfitriao.php?cadastro=" . $res);
    }
    
} else {

    $sql = "INSERT INTO `anfitriao`(`nome`, `cpf`, `tipo`, `status`, `id_esportes`, `id_caracteristicas`, `id_modalidade`, `endereco`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `tel_fixo`, `obs`, `tel_celular`, `criado_em`, `foto`)
        VALUES ('$nome','$cpf','F','A','$esportes_string','$carac_string','$modalidades_string','$endereco','$numero','$cep','$bairro','$cidade','$uf','$fixo','$obs','$cel',now(),'$nome_foto')";
    $res = mysqli_query($conexao, $sql);

    if ($res) {
        header("location: list_anfitriao.php?cadastro=" . $res);
    }

}

?>