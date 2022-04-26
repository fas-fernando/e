<?php include 'header.php' ?>

<?php

include 'conexao.php';
include 'funcoes.php';

$sql = "SELECT t1.id, t1.nome, t1.status, t1.deletado_em, t1.user, t2.nivel_usuario, t1.foto, t1.tipo, t3.nome as nm_anfitriao
FROM usuario t1
left join nivel_usuario t2 on t1.nivel = t2.id_user
left join anfitriao t3     on t1.vinculo = t3.id_anfitriao";
$res = mysqli_query($conexao, $sql);

$sql_user = "SELECT * FROM usuario WHERE id = '$iden'";
$res_user = mysqli_query($conexao, $sql_user);
$dados_user = mysqli_fetch_assoc($res_user);

$sql_user_cont = "SELECT t1.id AS id_usuario, t1.nome AS nm_usuario, t1.foto, t1.status, t1.deletado_em, t3.nivel_usuario, t2.nome AS nm_anfitriao, t1.tipo, t1.user
FROM usuario t1
LEFT JOIN anfitriao t2     ON t1.vinculo = t2.id_anfitriao
left join nivel_usuario t3 ON t1.nivel = t3.id_user
WHERE t1.vinculo = '$vinculo'";
$res_user_cont = mysqli_query($conexao, $sql_user_cont);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de usuário</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Lista de usuário</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="col-12">
    <?php
    if (isset($_GET['cadastro'])) {
        if ($_GET['cadastro'] == '1') {
            mensagens('Usuário cadastrado com sucesso', 'success');
        } else {
            mensagens('Problema ao cadastrar o usuário, verifique com o suporte', 'danger');
        }
    }
    ?>

    <?php
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == '1') {
            mensagens('Usuário alterado com sucesso', 'success');
        } else {
            mensagens('Problema ao alterar o usuário, verifique com o suporte', 'danger');
        }
    }
    ?>

    <?php
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == '1') {
            mensagens('Usuário deletado com sucesso', 'success');
        } else {
            mensagens('Problema ao deletar o usuário, verifique com o suporte', 'danger');
        }
    }
    ?>

    <?php
    if (isset($_GET['desfeito'])) {
        if ($_GET['desfeito'] == '1') {
            mensagens('Desfeito a exclusão do usuário com sucesso', 'success');
        } else {
            mensagens('Problema ao desfazer a exclusão do usuário', 'danger');
        }
    }
    ?>
</div>

<div class="col-12">
    <div class="card">
        <?php if($dados_user['nivel'] == 5) { ?>
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <h3 class="card-title">
                            <button type="button" class=" btn btn-success btn-sm" id="cadastrarUsuario" name="cadastrarUsuario">Cadastrar</button>
                        </h3>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Quadra</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Nível</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($nivel == '5') { ?>
                        <?php while ($dados = mysqli_fetch_assoc($res)) {
                            $id = $dados['id'];
                            $nome = $dados['nome'];
                            $foto = $dados['foto'];

                            if (!$foto == null) {
                                $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem da quadra'>";
                            } else {
                                $mostrar_foto = "<img src='img/usuario_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem da quadra padrão'>";;
                            }
                        ?>

                            <tr>
                                <td><?= $mostrar_foto ?></td>
                                <td>
                                    <?= ($dados['status'] == 'A') ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>' ?>
                                    <?= ($dados['deletado_em'] != null) ? '<span class="badge bg-dark">Excluído</span>' : '' ?>
                                </td>
                                <td><?= $dados['nm_anfitriao'] ?></td>
                                <td><?= $nome ?></td>

                                <td><?= $dados['user'] ?></td>
                                <td><?= $dados['nivel_usuario'] ?></td>
                                <td>
                                    <?php if ($dados_user['tipo'] == 2) { ?>
                                        <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharUsuario" name="detalharUsuario">
                                        <input type="submit" value="Alterar" data-alt="<?= $id ?>" class="btn btn-warning btn-sm" id="alterarUsuario" name="alterarUsuario">
                                        <input type="submit" value="Deletar" data-del="<?= $id ?>" class=" btn btn-danger btn-sm" id="detelarUsuario" name="detelarUsuario">
                                        <?php if ($dados['deletado_em'] != '' || $dados['deletado_em'] != null) { ?>
                                            <input type="submit" value="Desfazer" data-des="<?= $id ?>" class=" btn btn-dark btn-sm" id="desfazerUsuario" name="desfazerUsuario">
                                        <?php } ?>
                                    <?php } else { ?>
                                        <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharUsuario" name="detalharUsuario">
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <?php while ($dados_user_cont = mysqli_fetch_assoc($res_user_cont)) {
                            $id = $dados_user_cont['id_usuario'];
                            $nome = $dados_user_cont['nm_usuario'];
                            $foto = $dados_user_cont['foto'];

                            if (!$foto == null) {
                                $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem da quadra'>";
                            } else {
                                $mostrar_foto = "<img src='img/usuario_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem da quadra padrão'>";;
                            }
                        ?>

                            <tr>
                                <td><?= $mostrar_foto ?></td>
                                <td>
                                    <?= ($dados_user_cont['status'] == 'A') ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>' ?>
                                    <?= ($dados_user_cont['deletado_em'] != null) ? '<span class="badge bg-dark">Excluído</span>' : '' ?>
                                </td>
                                <td><?= $dados_user_cont['nm_anfitriao'] ?></td>
                                <td><?= $nome ?></td>

                                <td><?= $dados_user_cont['user'] ?></td>
                                <td><?= $dados_user_cont['nivel_usuario'] ?></td>
                                <td>
                                    <?php if (($dados_user['tipo'] == 2) && ($dados_user['nivel'] == 5)) { ?>
                                        <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharUsuario" name="detalharUsuario">
                                        <input type="submit" value="Alterar" data-alt="<?= $id ?>" class="btn btn-warning btn-sm" id="alterarUsuario" name="alterarUsuario">
                                        <input type="submit" value="Deletar" data-del="<?= $id ?>" class=" btn btn-danger btn-sm" id="detelarUsuario" name="detelarUsuario">
                                        <?php if ($dados_user_cont['deletado_em'] != '' || $dados_user_cont['deletado_em'] != null) { ?>
                                            <input type="submit" value="Desfazer" data-des="<?= $id ?>" class=" btn btn-dark btn-sm" id="desfazerUsuario" name="desfazerUsuario">
                                        <?php } ?>
                                    <?php } else { ?>
                                        <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharUsuario" name="detalharUsuario">
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalUsuario"></div>

<?php include 'footer.php' ?>