<?php include 'sql_home.php' ?>

<div class="mt-3"></div>
<div class="col-3">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $dados_user_anfi['quantidade'] ?></h3>
            <p><?= ($dados_user_anfi['quantidade'] > 1) ? 'Usuários registrados' : 'Usuário registrado' ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="list_usuario.php" class="small-box-footer">Vermais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>