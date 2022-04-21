<?php include 'header.php' ?>

<?php

include 'conexao.php';

$pesquisa = $_POST['busca'] ?? '';

$sql = "SELECT t1.id, t1.nome, t1.status, t1.deletado_em, t1.user, t2.nivel_usuario, t1.foto
    FROM usuario t1
    left join nivel_usuario t2 on t1.nivel = t2.id_user
    WHERE t1.nome LIKE '%$pesquisa%'";
$res = mysqli_query($conexao, $sql);

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
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Nível</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
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
                            <td><?= $nome ?></td>

                            <td><?= $dados['user'] ?></td>
                            <td><?= $dados['nivel_usuario'] ?></td>
                            <td>
                                <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharUsuario" name="detalharUsuario">
                                <input type="submit" value="Alterar" data-alt="<?= $id ?>" class="btn btn-warning btn-sm" id="alterarUsuario" name="alterarUsuario">
                                <input type="submit" value="Deletar" data-del="<?= $id ?>" class=" btn btn-danger btn-sm" id="detelarUsuario" name="detelarUsuario">
                                <?php if ($dados['deletado_em'] != '' || $dados['deletado_em'] != null) { ?>
                                    <input type="submit" value="Desfazer" data-des="<?= $id ?>" class=" btn btn-dark btn-sm" id="desfazerUsuario" name="desfazerUsuario">
                                <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalUsuario"></div>

<?php include 'footer.php' ?>