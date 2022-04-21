<?php

include '../../../conexao.php';

$id = $_POST['id'];

$sql = "SELECT * FROM anfitriao WHERE id_anfitriao = '$id'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);
$foto = $dados['foto'];

if (!$foto == null) {
    $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem da Quadra'>";
} else {
    $mostrar_foto = "<img src='img/quadra_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem da Quadra Padrão'>";
}

?>

<div class="modal fade" id="alterar_anfitriao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhe do Anfitrião</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-1">
                        <?= $mostrar_foto ?>
                    </div>
                    <div class="col-md-2">
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
                    <div class="col-8">
                        <div class="form-group">
                            <label for="nome_anfi" class="form-label" disabled>Nome Completo</label>
                            <input type="text" class="form-control" id="nome_anfi" name="nome_anfi" value="<?= $dados['nome'] ?>" disabled>
                            <input type="hidden" class="form-control" id="idAnfitriao" name="idAnfitriao" value="<?= $id ?>" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <?php if ($dados['cnpj']) { ?>

                                <label for="cnpj" class="form-label" disabled>CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="cnpj apenas com números" value="<?= $dados['cnpj'] ?>" disabled>

                            <?php } else { ?>

                                <label for="cpf" class="form-label" disabled>CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf apenas com número" value="<?= $dados['cpf'] ?>" disabled>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-10">
                        <div class="form-group">
                            <label for="end_anfi" class="form-label" disabled>Endereço</label>
                            <input type="text" class="form-control" id="end_anfi" name="end_anfi" value="<?= $dados['endereco'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="num_anfi" class="form-label" disabled>Número</label>
                            <input type="text" class="form-control" id="num_anfi" name="num_anfi" value="<?= $dados['numero'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="bairro_anfi" class="form-label" disabled>Bairro</label>
                            <input type="text" class="form-control" id="bairro_anfi" name="bairro_anfi" value="<?= $dados['bairro'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cidade_anfi" class="form-label" disabled>Cidade</label>
                            <input type="text" class="form-control" id="cidade_anfi" name="cidade_anfi" value="<?= $dados['cidade'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="uf_anfi" class="form-label" disabled>UF</label>
                            <input type="text" class="form-control" id="uf_anfi" name="uf_anfi" value="<?= $dados['uf'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cep_anfi" class="form-label" disabled>CEP</label>
                            <input type="text" class="form-control" id="cep_anfi" name="cep_anfi" value="<?= $dados['cep'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tel_anfi" class="form-label" disabled>Fixo</label>
                            <input type="text" class="form-control" id="tel_anfi" name="tel_anfi" placeholder="(11) 4444-4444" value="<?= $dados['tel_fixo'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="celular_anfi" class="form-label" disabled>Celular</label>
                            <input type="text" class="form-control" id="celular_anfi" name="celular_anfi" placeholder="(11) 94444-4444" value="<?= $dados['tel_celular'] ?>" disabled>
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
        $('#alterar_anfitriao').modal('show');

        // Mascaras
        $('#cep_anfi').mask('00000-000');
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#tel_anfi').mask('(00) 0000-0000');
        $('#celular_anfi').mask('(00) 00000-0000');
    });
</script>