<?php

include '../../../conexao.php';

$id = $_POST['id'];

include '../sql_edit_usuario.php';

?>

<div class="modal fade" id="alterar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="edit_usuario.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhe do usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($dados['status'] == 'A') { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status_a" checked value="A">
                                    <label class="form-check-label badge rounded-pill bg-success" for="status_a">Ativo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status_i" value="I">
                                    <label class="form-check-label badge rounded-pill bg-danger" for="status_i">Inativo</label>
                                </div>
                            <?php } else { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status_a" value="A">
                                    <label class="form-check-label badge rounded-pill bg-success" for="status_a">Ativo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status_i" checked value="I">
                                    <label class="form-check-label badge rounded-pill bg-danger" for="status_i">Inativo</label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nome_user" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="nome_user" name="nome_user" value="<?= $dados['nome'] ?>">
                                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?= $id ?>">
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quadra anfitrião</label>
                                <select class="form-select" name="id_anfitriao">
                                    <option value="<?= $dados_anfi_user['id_anfitriao'] ?>" name="anfitriao"><?= $dados_anfi_user['nome'] ?></option>
                                    <?php while ($dados_anfi_all = mysqli_fetch_assoc($res_anfi_all)) { ?>

                                        <option value="<?= $dados_anfi_all['id_anfitriao'] ?>" name="anfitriao"><?= $dados_anfi_all['nome'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nível do usuário</label>
                                <select class="form-select" name="id_nivel">
                                    <option value="<?= $dados_nivel_user['id_user'] ?>" name="nivel"><?= $dados_nivel_user['nivel_usuario'] ?></option>
                                    <?php while ($dados_nivel_all = mysqli_fetch_assoc($res_nivel_all)) { ?>

                                        <option value="<?= $dados_nivel_all['id_user'] ?>"><?= $dados_nivel_all['nivel_usuario'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo do usuário</label>
                                <select class="form-select" name="id_tipo">
                                    <option value="<?= $dados_tipo_user['id_user'] ?>" name="tipo"><?= $dados_tipo_user['tipo_usuario'] ?></option>
                                    <?php while ($dados_tipo_all = mysqli_fetch_assoc($res_tipo_all)) { ?>

                                        <option value="<?= $dados_tipo_all['id_user'] ?>"><?= $dados_tipo_all['tipo_usuario'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="user" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?= $dados['user'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" value="<?= $dados['senha'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="editarAnfitriao" name="editarAnfitriao">Alterar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Abrir Modal
        $('#alterar_usuario').modal('show');
    });
</script>