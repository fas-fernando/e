<?php include 'layout/header.php' ?>

<?php

include 'conexao.php';

$pesquisa = $_POST['busca'] ?? '';

$sql = "SELECT *
    FROM anfitriao
    WHERE nome LIKE '%$pesquisa%' or cpf LIKE '%$pesquisa%' or cnpj LIKE '%$pesquisa%'";
$res = mysqli_query($conexao, $sql);

?>

<div class="row">
    <div class="col-md-3 col-sm-10">
        <h5>Listagem de Anfritriões</h5>
    </div>
    <div class="col-md-8"></div>
    <div class="col-md-1 col-sm-2">
        <button type="button" class=" btn btn-success btn-sm" id="cadastrarAnfitriao" name="cadastrarAnfitriao">Cadastrar</button>
    </div>
</div>

<hr>

<div class="row">
    <div class="container-fluid col-md-6 col-sm-12">
        <form class="d-flex" action="list_anfitriao.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Pesquisar Anfitrião" aria-label="Search" name="busca" autofocus>
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>
    <div class="col-md-12 col-sm-12 mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ / CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados = mysqli_fetch_assoc($res)) {
                    $id = $dados['id_anfitriao'];
                    $nome = $dados['nome'];
                ?>

                    <tr>
                        <td>
                            <?= ($dados['status'] == 'A') ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>' ?>
                            <?= ($dados['deletado_em'] != null) ? '<span class="badge bg-dark">Excluido</span>' : '' ?>
                        </td>
                        <td><?= $dados['nome'] ?></td>

                        <?php if ($dados['cnpj'] != '') { ?>

                            <td class="cnpj"><?= $dados['cnpj'] ?></td>

                        <?php } else { ?>

                            <td class="cpf"><?= $dados['cpf'] ?></td>

                        <?php } ?>

                        <td class="fixo"><?= $dados['tel_fixo'] ?></td>
                        <td class="celular"><?= $dados['tel_celular'] ?></td>
                        <td>
                            <input type="submit" value="Detalhe" data-dtl="<?= $id ?>" class="btn btn-primary btn-sm" id="detalharAnfitriao" name="detalharAnfitriao">
                            <input type="submit" value="Alterar" data-alt="<?= $id ?>" class="btn btn-warning btn-sm" id="alterarAnfitriao" name="alterarAnfitriao">
                            <input type="submit" value="Deletar" data-del="<?= $id ?>" class=" btn btn-danger btn-sm" id="detelarAnfitriao" name="detelarAnfitriao">
                            <?php if ($dados['deletado_em'] != '' || $dados['deletado_em'] != null) { ?>
                                <input type="submit" value="Desfazer" data-des="<?= $id ?>" class=" btn btn-dark btn-sm" id="desfazerAnfitriao" name="desfazerAnfitriao">
                            <?php } ?>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div id="modalAnfitriao"></div>

<?php include 'layout/footer.php' ?>

<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00');
        $('.cnpj').mask('00.000.000/0000-00');
        $('.fixo').mask('(00) 0000-0000');
        $('.celular').mask('(00) 00000-0000');
    });
</script>