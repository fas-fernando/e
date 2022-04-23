<?php include 'header.php' ?>

<?php

include 'conexao.php';

$sql = "SELECT * FROM boleiro";
$res = mysqli_query($conexao, $sql);

$sql_user = "SELECT * FROM usuario WHERE id = '$iden'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de boleiro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Lista de boleiro</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-2">
                    <h3 class="card-title">
                        <button type="button" class=" btn btn-success btn-sm" id="cadastrarUsuario" name="cadastrarUsuario">Cadastrar</button>
                    </h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dados_boleiro = mysqli_fetch_assoc($res)) {
                        $id = $dados_boleiro['id'];
                    ?>
                        <tr>
                            <td><?= $dados_boleiro['nome'] ?></td>
                            <td><?= $dados_boleiro['email'] ?></td>
                            <td class="celular"><?= $dados_boleiro['celular'] ?></td>
                            <td>
                                <?php if ($dados_user['tipo'] == 2) { ?>
                                    <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharBoleiro" name="detalharBoleiro">
                                    <input type="submit" value="Alterar" data-alt="<?= $id ?>" class="btn btn-warning btn-sm" id="alterarBoleiro" name="alterarBoleiro">
                                    <input type="submit" value="Deletar" data-del="<?= $id ?>" class=" btn btn-danger btn-sm" id="detelarBoleiro" name="detelarBoleiro">
                                    <?php if ($dados_boleiro['deletado_em'] != '' || $dados_boleiro['deletado_em'] != null) { ?>
                                        <input type="submit" value="Desfazer" data-des="<?= $id ?>" class=" btn btn-dark btn-sm" id="desfazerBoleiro" name="desfazerBoleiro">
                                    <?php } ?>
                                <?php } else { ?>
                                    <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharBoleiro" name="detalharBoleiro">
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalBoleiro"></div>

<?php include 'footer.php' ?>

<script src="js/jquery.mask.js"></script>

<script>
    $(document).ready(function() {
        $('.celular').mask('(00) 00000-0000');
    });
</script>