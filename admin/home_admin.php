<?php include 'sql_home.php' ?>

<div class="mt-3"></div>
<div class="col-3">
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
<div class="col-3">
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
<div class="col-3">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $dados_boleiro['quantidade'] ?></h3>
            <p><?= ($dados_boleiro['quantidade'] > 1) ? 'Boleiros registrados' : 'Boleiro registrado' ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="list_boleiro.php" class="small-box-footer">Vermais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>