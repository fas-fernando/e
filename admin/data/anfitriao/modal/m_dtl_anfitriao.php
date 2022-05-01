<?php

include '../../../conexao.php';
$id = $_POST['id'];
include '../sql.php';

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
                        <?php if ($dados_dtl['status'] == 'A') { ?>
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
                            <input type="text" class="form-control" id="nome_anfi" name="nome_anfi" value="<?= $dados_dtl['nome'] ?>" disabled>
                            <input type="hidden" class="form-control" id="idAnfitriao" name="idAnfitriao" value="<?= $id ?>" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <?php if ($dados_dtl['cnpj']) { ?>

                                <label for="cnpj" class="form-label" disabled>CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="cnpj apenas com números" value="<?= $dados_dtl['cnpj'] ?>" disabled>

                            <?php } else { ?>

                                <label for="cpf" class="form-label" disabled>CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf apenas com número" value="<?= $dados_dtl['cpf'] ?>" disabled>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-10">
                        <div class="form-group">
                            <label for="end_anfi" class="form-label" disabled>Endereço</label>
                            <input type="text" class="form-control" id="end_anfi" name="end_anfi" value="<?= $dados_dtl['endereco'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="num_anfi" class="form-label" disabled>Número</label>
                            <input type="text" class="form-control" id="num_anfi" name="num_anfi" value="<?= $dados_dtl['numero'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="bairro_anfi" class="form-label" disabled>Bairro</label>
                            <input type="text" class="form-control" id="bairro_anfi" name="bairro_anfi" value="<?= $dados_dtl['bairro'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cidade_anfi" class="form-label" disabled>Cidade</label>
                            <input type="text" class="form-control" id="cidade_anfi" name="cidade_anfi" value="<?= $dados_dtl['cidade'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="uf_anfi" class="form-label" disabled>UF</label>
                            <input type="text" class="form-control" id="uf_anfi" name="uf_anfi" value="<?= $dados_dtl['uf'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cep_anfi" class="form-label" disabled>CEP</label>
                            <input type="text" class="form-control" id="cep_anfi" name="cep_anfi" value="<?= $dados_dtl['cep'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tel_anfi" class="form-label" disabled>Fixo</label>
                            <input type="text" class="form-control" id="tel_anfi" name="tel_anfi" placeholder="(11) 4444-4444" value="<?= $dados_dtl['tel_fixo'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="celular_anfi" class="form-label" disabled>Celular</label>
                            <input type="text" class="form-control" id="celular_anfi" name="celular_anfi" placeholder="(11) 94444-4444" value="<?= $dados_dtl['tel_celular'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tel_anfi" class="form-label">Observação</label>
                            <textarea type="text" class="form-control" id="obs" name="obs" rows="4" disabled><?= $dados_dtl['obs'] ?></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">CARACTERIS TICAS</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input <?= in_array(1, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="churrasqueira" name="carac" value="1" disabled>
                                        <label class="custom-control-label" for="churrasqueira" disabled>Churrasqueira</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input <?= in_array(2, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="bilhar" name="carac" value="2" disabled>
                                        <label class="custom-control-label" for="bilhar" disabled>Mesa de bilhar</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input <?= in_array(3, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="vestiario" name="carac" value="3" disabled>
                                        <label class="custom-control-label" for="vestiario" disabled>Vestiário</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="chuveiro" name="carac[]" value="4" disabled>
                                        <label class="custom-control-label" for="chuveiro" disabled>Chuveiro</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="estac_gratis" name="carac[]" value="5" disabled>
                                        <label class="custom-control-label" for="estac_gratis" disabled>Estacionamento grátis</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="estac_pago" name="carac[]" value="6" disabled>
                                        <label class="custom-control-label" for="estac_pago" disabled>Estacionamento pago</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="lanchonete" name="carac[]" value="7" disabled>
                                        <label class="custom-control-label" for="lanchonete" disabled>Lanchonete</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="pl_eletronico" name="carac[]" value="8" disabled>
                                        <label class="custom-control-label" for="pl_eletronico" disabled>Placar eletrônico</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="filmagem" name="carac[]" value="9" disabled>
                                        <label class="custom-control-label" for="filmagem" disabled>Filmagem</label>
                                    </div>
                                </div>
                            </div>
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
        // var pos0 = ;
        // var pos1 = ;
        // var pos2 = ;
        // var churrasqueira = $("#churrasqueira").val();
        // var bilhar = $("#bilhar").val();
        // var vestiario = $("#vestiario").val();

        // console.log(pos0 == vestiario);

        // if (pos0 == churrasqueira) {
        //     $("#churrasqueira").prop("checked", true);
        // }

        // if ((pos0 == bilhar) || (pos1 == bilhar)) {
        //     $("#bilhar").prop("checked", true);
        // }

        // if ((pos0 == vestiario) || (pos1 == vestiario) || (pos2 == vestiario)) {
        //     $("#vestiario").prop("checked", true);
        // }

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