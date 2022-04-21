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


include 'conexao.php';

// Listagem dos níveis pelo nome
$sql_nivel = "SELECT id_user as id_nivel, nivel_usuario FROM nivel_usuario";
$res_nivel = mysqli_query($conexao, $sql_nivel);

// Listagem dos tipos pelo nome
$sql_tipo = "SELECT id_user, tipo_usuario FROM tipo_usuario";
$res_tipo = mysqli_query($conexao, $sql_tipo);

// Listar todas as quadras
$sql_quadra = "SELECT id_anfitriao, nome FROM anfitriao";
$res_quadra = mysqli_query($conexao, $sql_quadra);

?>

<div class="modal fade" id="cadastrar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="cad_usuario.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nome_user" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="nome_user" name="nome_user" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="user" name="user">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="text" class="form-control" id="senha" name="senha">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="foto" class="form-label">Foto do usuário</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quadra do anfitrião</label>
                                <select class="form-select" name="id_anfitriao">
                                    <option>Escolha a quadra do usuário</option>
                                    <?php while ($dados = mysqli_fetch_assoc($res_quadra)) { ?>

                                        <option value="<?= $dados['id_anfitriao'] ?>" name="tipo"><?= $dados['nome'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nível do usuário</label>
                                <select class="form-select" name="nivel">
                                    <option>Escolha o nível do usuário</option>
                                    <?php while ($dados = mysqli_fetch_assoc($res_nivel)) { ?>

                                        <option value="<?= $dados['id_nivel'] ?>"><?= $dados['nivel_usuario'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo do usuário</label>
                                <select class="form-select" name="tipo">
                                    <option>Escolha o tipo do usuário</option>
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
                    <button type="submit" class="btn btn-primary" id="incluirUsuario" name="incluirUsuario">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Abrir Modal
        $("#cadastrar_usuario").modal("show");
    });
</script>