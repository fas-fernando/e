<?php include 'header.php' ?>

<?php
include 'conexao.php';
include 'funcoes.php';

$sql = "SELECT * FROM anfitriao";
$res = mysqli_query($conexao, $sql);

$sql_user = "SELECT * FROM usuario WHERE id = '$iden'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de anfitrião</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Lista de anfitrião</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="col-12">
    <?php
        if(isset($_GET['cadastro'])){
            if($_GET['cadastro'] == '1') {
                mensagens('Anfitrião cadastrado com sucesso', 'success');
            } else {
                mensagens('Problema no cadastro do anfitrião, verifique com o suporte', 'danger');
            }
        }
    ?>

    <?php
        if (isset($_GET['edit'])) {
            if ($_GET['edit'] == '1') {
                mensagens('Anfitrião alterado com sucesso', 'success');
            } else {
                mensagens('Problema na alteração do anfitrião, verifique com o suporte', 'danger');
            }
        }
    ?>

    <?php
        if (isset($_GET['delete'])) {
            if ($_GET['delete'] == '1') {
                mensagens('Anfitrião deletado com sucesso', 'success');
            } else {
                mensagens('Problema ao deletar do anfitrião, verifique com o suporte', 'danger');
            }
        }
    ?>

    <?php
        if (isset($_GET['desfeito'])) {
            if ($_GET['desfeito'] == '1') {
                mensagens('Desfeito a exclusão do anfitrião com sucesso', 'success');
            } else {
                mensagens('Problema ao desfazer a exclusão do Anfitrião', 'danger');
            }
        }
    ?>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-2">
                    <h3 class="card-title">
                        <button type="button" class="btn btn-success btn-sm" id="cadastrarAnfitriao" name="cadastrarAnfitriao">Cadastrar</button>
                    </h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Nome</th>
                        <th>CNPJ / CPF</th>
                        <th>Celular</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dados = mysqli_fetch_assoc($res)) {
                        $id   = $dados['id_anfitriao'];
                        $nome = $dados['nome'];
                        $foto = $dados['foto'];

                        if (!$foto == null) {
                            $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem da Quadra'>";
                        } else {
                            $mostrar_foto = "<img src='img/quadra_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem da Quadra Padrão'>";
                        }
                    ?>

                        <tr>
                            <td><?= $mostrar_foto ?></td>
                            <td>
                                <?= ($dados['status'] == 'A') ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>' ?>
                                <?= ($dados['deletado_em'] != null) ? '<span class="badge bg-dark">Excluído</span>' : '' ?>
                            </td>
                            <td><?= $dados['nome'] ?></td>

                            <?php if ($dados['cnpj'] != '') { ?>

                                <td class="cnpj"><?= $dados['cnpj'] ?></td>

                            <?php } else { ?>

                                <td class="cpf"><?= $dados['cpf'] ?></td>

                            <?php } ?>

                            <td class="celular"><?= $dados['tel_celular'] ?></td>
                            <td>
                                <?php if ($dados_user['tipo'] == 2) { ?>
                                    <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharAnfitriao" name="detalharAnfitriao">
                                    <input type="submit" value="Alterar" data-alt="<?= $id ?>" class="btn btn-warning btn-sm" id="alterarAnfitriao" name="alterarAnfitriao">
                                    <input type="submit" value="Deletar" data-del="<?= $id ?>" class=" btn btn-danger btn-sm" id="detelarAnfitriao" name="detelarAnfitriao">
                                    <?php if ($dados['deletado_em'] != '' || $dados['deletado_em'] != null) { ?>
                                        <input type="submit" value="Desfazer" data-des="<?= $id ?>" class=" btn btn-dark btn-sm" id="desfazerAnfitriao" name="desfazerAnfitriao">
                                    <?php } ?>
                                <?php } else { ?>
                                    <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharAnfitriao" name="detalharAnfitriao">
                                <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalAnfitriao"></div>

<?php include 'footer.php' ?>

<script src="js/jquery.mask.js"></script>

<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00');
        $('.cnpj').mask('00.000.000/0000-00');
        $('.celular').mask('(00) 00000-0000');
    });
</script>