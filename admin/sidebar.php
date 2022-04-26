<?php

$sql = "SELECT foto FROM usuario WHERE id = '$iden'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EVO APP</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if ($dados['foto'] != '') { ?>
                    <a href="perfil.php"><img src="img/<?= $dados['foto'] ?>" class="img-circle elevation-2" alt="imagem do usuário" style="width:40px;height:40px"></a>
                <?php } else { ?>
                    <a href="perfil.php"><img src="img/usuario_padrao.png" class="img-circle elevation-2" alt="imagem do padrão usuário" style="width:40px;height:40px"></a>
                <?php } ?>
            </div>
            <div class="info">
                <a href="perfil.php" class="d-block"><?= $login ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if ($nivel == '5') { ?>
                    <?php include 'sidebar_admin.php' ?>
                <?php } else if(($nivel == '2') || ($nivel == '3') || ($nivel == '4')) { ?>
                    <?php include 'sidebar_anfitriao.php' ?>
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>