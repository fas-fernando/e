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
        <a href="form_cad_anfitriao.php" class="btn btn-success">Novo</a>
    </div>
</div>

<hr>

<div class="row">
    <div class="container-fluid col-md-6 col-sm-12">
        <form class="d-flex" action="list_anfitriao.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Pesquisar Anfitrião" aria-label="Search" name="busca">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>
    <div class="col-md-12 col-sm-12 mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ / CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php while($dados = mysqli_fetch_assoc($res)) { ?>

                    <tr>
                        <td><?= $dados['nome'] ?></td>
                        <td><?= $dados['cnpj'] ?> - <?= $dados['cpf'] ?></td>
                        <td><?= $dados['tel_fixo'] ?></td>
                        <td><?= $dados['tel_celular'] ?></td>
                    </tr>

                <?php } ?>  
            </tbody>
        </table>
    </div>
</div>







<?php include 'layout/footer.php' ?>