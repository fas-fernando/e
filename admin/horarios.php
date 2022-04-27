<?php

session_start();
if (isset($_SESSION['login']) && isset($_SESSION['id']) && isset($_SESSION['nivel']) && isset($_SESSION['vinculo'])) {
    $login = $_SESSION['login'];
    $iden = $_SESSION['id'];
    $nivel = $_SESSION['nivel'];
    $vinculo = $_SESSION['vinculo'];
} else {
    session_destroy();
    header('location: ../index.php');
}

?>

<?php

include 'conexao.php';
include 'funcoes.php';
include 'sql/sql_perfil.php';

$segHI       = limpaTexto($conexao, $_POST['segHI']);
$segHF       = limpaTexto($conexao, $_POST['segHF']);
$terHI       = limpaTexto($conexao, $_POST['terHI']);
$terHF       = limpaTexto($conexao, $_POST['terHF']);
$quaHI       = limpaTexto($conexao, $_POST['quaHI']);
$quaHF       = limpaTexto($conexao, $_POST['quaHF']);
$quiHI       = limpaTexto($conexao, $_POST['quiHI']);
$quiHF       = limpaTexto($conexao, $_POST['quiHF']);
$sexHI       = limpaTexto($conexao, $_POST['sexHI']);
$sexHF       = limpaTexto($conexao, $_POST['sexHF']);
$sabHI       = limpaTexto($conexao, $_POST['sabHI']);
$sabHF       = limpaTexto($conexao, $_POST['sabHF']);
$domHI       = limpaTexto($conexao, $_POST['domHI']);
$domHF       = limpaTexto($conexao, $_POST['domHF']);


if(isset($dados_hora_anfi['id_anfitriao'])) {

    $sql_horario_upd = "UPDATE `hora_anfitriao` SET `seg_ini`='$segHI',`seg_fim`='$segHF',`ter_ini`='$terHI',`ter_fim`='$terHF',`qua_ini`='$quaHI',`qua_fim`='$quaHF',`qui_ini`='$quiHI',`qui_fim`='$quiHF',`sex_ini`='$sexHI',`sex_fim`='$sexHF',`sab_ini`='$sabHI',`sab_fim`='$sabHF',`dom_ini`='$domHI',`dom_fim`='$domHF',`atualizado_em`=now() WHERE id_anfitriao = '$vinculo'";
    $res_horario = mysqli_query($conexao, $sql_horario_upd);

    if ($res_horario) {
        header('location: perfil.php?atualizar=' . $res_horario);
    }

} else {

    $sql_horario_ins = "INSERT INTO hora_anfitriao (id_anfitriao, seg_ini, seg_fim, ter_ini, ter_fim, qua_ini, qua_fim, qui_ini, qui_fim, sex_ini, sex_fim, sab_ini, sab_fim, dom_ini, dom_fim, criado_em)
    VALUES ('$vinculo','$segHI','$segHF','$terHI','$terHF','$quaHI','$quaHF','$quiHI','$quiHF','$sexHI','$sexHF','$sabHI','$sabHF','$domHI','$domHF',now())";
    $res_horario = mysqli_query($conexao, $sql_horario_ins);

    if ($res_horario) {
        header('location: perfil.php?salvar=' . $res_horario);
    }

}



?>