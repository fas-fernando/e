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
                    <img src="img/<?= $dados['foto'] ?>" class="img-circle elevation-2" alt="imagem do usuário" style="width:40px;height:40px">
                <?php } else { ?>
                    <img src="img/usuario_padrao.png" class="img-circle elevation-2" alt="imagem do padrão usuário" style="width:40px;height:40px">
                <?php } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $login ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Cadastros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="list_anfitriao.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Anfitrião</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_usuario.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuário</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="list_boleiro.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boleiro</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>