<?php
// Busca a sessão do usuário
session_start();

if (isset($_SESSION['login']) && isset($_SESSION['id'])) {
    $login = $_SESSION['login'];
    $iden = $_SESSION['id'];
} else {
    session_destroy();
    header('location: ../index.php');
}

include '../../../conexao.php';

// Listagem dos níveis pelo nome
$sql_nivel = "SELECT id_user as id_nivel, nivel_usuario FROM nivel_usuario WHERE id_user = '1'";
$res_nivel = mysqli_query($conexao, $sql_nivel);

// Listagem dos tipos pelo nome
$sql_tipo = "SELECT id_user, tipo_usuario FROM tipo_usuario WHERE id_user = '1'";
$res_tipo = mysqli_query($conexao, $sql_tipo);

// Listar todos usuários
$sql_quadra = "SELECT * FROM usuario";
$res_quadra = mysqli_query($conexao, $sql_quadra);

?>

<div class="modal fade" id="cadastrar_boleiro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="cad_boleiro.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar boleiro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nome" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento" class="form-label">Nascimento</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="foto" class="form-label">Foto do usuário</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="user" name="user">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="text" class="form-control" id="senha" name="senha">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nível</label>
                                <select class="form-select" name="nivel">
                                    <?php while ($dados = mysqli_fetch_assoc($res_nivel)) { ?>

                                        <option value="<?= $dados['id_nivel'] ?>"><?= $dados['nivel_usuario'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo do usuário</label>
                                <select class="form-select" name="tipo">
                                    <?php while ($dados = mysqli_fetch_assoc($res_tipo)) { ?>

                                        <option value="<?= $dados['id_user'] ?>"><?= $dados['tipo_usuario'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="incluirBoleiro" name="incluirBoleiro">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#celular').mask('(00) 00000-0000');
    });
</script>

<script>
    $(document).ready(function() {
        // Abrir Modal
        $("#cadastrar_boleiro").modal("show");
    });
</script>