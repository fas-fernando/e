<?php include 'header.php' ?>

<?php

// Bloco de anfitrião
$sql_anfi = "SELECT COUNT(id_anfitriao) as quantidade
FROM anfitriao
WHERE status = 'A'";
$res_anfi = mysqli_query($conexao, $sql_anfi);
$dados_anfi = mysqli_fetch_assoc($res_anfi);

// Bloco de usuário
$sql_user = "SELECT COUNT(id) as quantidade
FROM usuario
WHERE status = 'A'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $dados_anfi['quantidade'] ?></h3>
            <p><?= ($dados_anfi['quantidade'] > 1) ? 'Anfitriões registrados' : 'Anfitrião registrado' ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-briefcase"></i>
        </div>
        <a href="list_anfitriao.php" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $dados_user['quantidade'] ?></h3>
            <p><?= ($dados_user['quantidade'] > 1) ? 'Usuários registrados' : 'Usuário registrado' ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="list_usuario.php" class="small-box-footer">Vermais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<?php include 'footer.php' ?>