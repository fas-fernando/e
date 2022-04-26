<?php include 'header.php' ?>

<?php

$sql = "SELECT t1.foto, t1.nome, t2.nivel_usuario
FROM usuario t1
left join nivel_usuario t2 on t1.nivel = t2.id_user
WHERE t1.id = '$iden'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php if ($dados['foto'] != '') { ?>
                                <img class="profile-user-img img-fluid img-circle" src="img/<?= $dados['foto'] ?>" alt="Foto do usuário">
                            <?php } else { ?>
                                <img class="profile-user-img img-fluid img-circle" src="img/usuario_padrao.png" alt="Foto padrão do usuário">
                            <?php } ?>
                        </div>
                        <h3 class="profile-username text-center"><?= $dados['nome'] ?></h3>
                        <p class="text-muted text-center"><?= $dados['nivel_usuario'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#perfil" data-toggle="tab">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#suporte" data-toggle="tab">Suporte</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="perfil">
                                <h1>Perfil</h1>
                            </div>
                            <div class="tab-pane" id="suporte">
                                <h1>Suporte</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>