<?php
include 'header.php';
include 'sql/sql_perfil.php';
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $dados_user['nm_anfitriao'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
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
                            <?php if ($dados_user['foto'] != '') { ?>
                                <img class="profile-user-img img-fluid img-circle" src="img/<?= $dados_user['foto'] ?>" alt="Foto do usuário">
                            <?php } else { ?>
                                <img class="profile-user-img img-fluid img-circle" src="img/usuario_padrao.png" alt="Foto padrão do usuário">
                            <?php } ?>
                        </div>
                        <h3 class="profile-username text-center"><?= $dados_user['nome'] ?></h3>
                        <p class="text-muted text-center"><?= $dados_user['nivel_usuario'] ?></p>
                    </div>
                </div>
            </div>
            <?php if ($nivel == 5) { ?>
                <?php include 'data/administrador/perfil.php' ?>
            <?php } else if (($nivel == 2) || ($nivel == 3) || ($nivel == 4)) { ?>
                <?php include 'data/anfitriao/perfil.php' ?>
            <?php } ?>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>

<script src="js/jquery.mask.js"></script>
<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#cep').mask('00000-000');
        $('#telefone').mask('(00) 0000-0000');
        $('#celular').mask('(00) 00000-0000');
    });
</script>