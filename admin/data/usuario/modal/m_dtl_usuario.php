<?php

include '../../../conexao.php';

$id = $_POST['id'];

$sql = "SELECT t1.status, t1.nome, t1.user, t2.nome as anfitriao, t3.nivel_usuario, t4.tipo_usuario
FROM usuario t1
left join anfitriao t2     on t1.vinculo = t2.id_anfitriao
left join nivel_usuario t3 on t1.nivel = t3.id
left join tipo_usuario t4  on t1.tipo = t4.id
WHERE t1.id = '$id'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);

?>

<div class="modal fade" id="detalhar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                                <input class="form-check-input" type="radio" name="status" id="status_a" checked value="A" disabled>
                                <label class="form-check-label badge rounded-pill bg-success" for="status_a" disabled>Ativo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_i" value="I" disabled>
                                <label class="form-check-label badge rounded-pill bg-danger" for="status_i" disabled>Inativo</label>
                            </div>
                        <?php } else { ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_a" value="A" disabled>
                                <label class="form-check-label badge rounded-pill bg-success" for="status_a" disabled>Ativo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_i" checked value="I" disabled>
                                <label class="form-check-label badge rounded-pill bg-danger" for="status_i" disabled>Inativo</label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome_anfi" class="form-label" disabled>Nome completo</label>
                            <input type="text" class="form-control" id="nome_anfi" name="nome_anfi" value="<?= $dados['nome'] ?>" disabled>
                            <input type="hidden" class="form-control" id="idAnfitriao" name="idAnfitriao" value="<?= $id ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="anfitriao" class="form-label" disabled>Quadra anfitrião</label>
                            <input type="text" class="form-control" id="anfitriao" name="anfitriao" value="<?= $dados['anfitriao'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="user" class="form-label" disabled>Usuário</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?= $dados['user'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="nivel" class="form-label" disabled>Nível</label>
                            <input type="text" class="form-control" id="nivel" name="nivel" value="<?= $dados['nivel_usuario'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tipo" class="form-label" disabled>Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $dados['tipo_usuario'] ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Abrir Modal
        $('#detalhar_usuario').modal('show');

    });
</script>