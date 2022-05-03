<?php  ?>
<?php
include '../../../viaCep.php';
include '../../../conexao.php';
$id = $_POST['id'];
include '../sql.php';

if (!$foto == null) {
    $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem da quadra'>";
} else {
    $mostrar_foto = "<img src='img/quadra_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem padrão da quadra'>";
}

?>

<div class="modal fade" id="alterar_anfitriao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="edit_anfitriao.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Anfitrião</h5>
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
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nome_anfi" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_anfi" name="nome_anfi" value="<?= $dados_dtl['nome'] ?>">
                                <input type="hidden" class="form-control" id="idAnfitriao" name="idAnfitriao" value="<?= $id ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php if ($dados_dtl['cnpj']) { ?>

                                    <label for="cnpj" class="form-label">CNPJ</label>
                                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="cnpj apenas com números" value="<?= $dados_dtl['cnpj'] ?>" readonly>

                                <?php } else { ?>

                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf apenas com número" value="<?= $dados_dtl['cpf'] ?>" readonly>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="end_anfi" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="end_anfi" name="end_anfi" value="<?= $dados_dtl['endereco'] ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="num_anfi" class="form-label">Número</label>
                                <input type="text" class="form-control" id="num_anfi" name="num_anfi" value="<?= $dados_dtl['numero'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="bairro_anfi" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro_anfi" name="bairro_anfi" value="<?= $dados_dtl['bairro'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cidade_anfi" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade_anfi" name="cidade_anfi" value="<?= $dados_dtl['cidade'] ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="uf_anfi" class="form-label">UF</label>
                                <input type="text" class="form-control" id="uf_anfi" name="uf_anfi" value="<?= $dados_dtl['uf'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cep_anfi" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep_anfi" name="cep_anfi" value="<?= $dados_dtl['cep'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tel_anfi" class="form-label">Fixo</label>
                                <input type="text" class="form-control" id="tel_anfi" name="tel_anfi" placeholder="(11) 4444-4444" value="<?= $dados_dtl['tel_fixo'] ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="celular_anfi" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celular_anfi" name="celular_anfi" placeholder="(11) 94444-4444" value="<?= $dados_dtl['tel_celular'] ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="foto_edit" class="form-label" disabled>Imagem da Quadra</label>
                                <input type="file" class="form-control" id="foto_edit" name="foto_edit" accept="image/*" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tel_anfi" class="form-label">Observação</label>
                                <textarea type="text" class="form-control" id="obs" name="obs" rows="4"><?= $dados_dtl['obs'] ?></textarea>
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
                                            <input <?= in_array(1, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="churrasqueira" name="carac[]" value="1">
                                            <label class="custom-control-label" for="churrasqueira">Churrasqueira</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(2, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="bilhar" name="carac[]" value="2">
                                            <label class="custom-control-label" for="bilhar">Mesa de bilhar</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(3, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="vestiario" name="carac[]" value="3">
                                            <label class="custom-control-label" for="vestiario">Vestiário</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(4, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="chuveiro" name="carac[]" value="4">
                                            <label class="custom-control-label" for="chuveiro">Chuveiro</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(5, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="estac_gratis" name="carac[]" value="5">
                                            <label class="custom-control-label" for="estac_gratis">Estacionamento grátis</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(6, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="estac_pago" name="carac[]" value="6">
                                            <label class="custom-control-label" for="estac_pago">Estacionamento pago</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(7, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="lanchonete" name="carac[]" value="7">
                                            <label class="custom-control-label" for="lanchonete">Lanchonete</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(8, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="pl_eletronico" name="carac[]" value="8">
                                            <label class="custom-control-label" for="pl_eletronico">Placar eletrônico</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input <?= in_array(9, $components) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="filmagem" name="carac[]" value="9">
                                            <label class="custom-control-label" for="filmagem">Filmagem</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">ESPORTES</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input <?= in_array(1, $esportes) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="futebol" name="esportes[]" value="1">
                                                    <label class="custom-control-label" for="futebol">Futebol</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input <?= in_array(5, $esportes) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="volei" name="esportes[]" value="5">
                                                    <label class="custom-control-label" for="volei">Vôlei</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">MODALIDADES</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_campo" style="display:none">
                                                    <input <?= in_array(1, $modalidades) ? 'checked' : '' ?> class="custom-control-input" type="checkbox" id="campo" name="modalidades[]" value="1">
                                                    <label for="campo" class="custom-control-label">Campo</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_futsal" style="display:none">
                                                    <input <?= in_array(2, $modalidades) ? 'checked' : '' ?> class="custom-control-input" type="checkbox" id="futsal" name="modalidades[]" value="2">
                                                    <label for="futsal" class="custom-control-label">Futsal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_areia_vol" style="display:none">
                                                    <input <?= in_array(8, $modalidades) ? 'checked' : '' ?> class="custom-control-input" type="checkbox" id="vol_areia" name="modalidades[]" value="8">
                                                    <label for="vol_areia" class="custom-control-label">Areia</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_quadra_vol" style="display:none">
                                                    <input <?= in_array(9, $modalidades) ? 'checked' : '' ?> class="custom-control-input" type="checkbox" id="vol_quadra" name="modalidades[]" value="9">
                                                    <label for="vol_quadra" class="custom-control-label">Quadra</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        // Exibe modalidades do futebol
        $('#futebol').on('change', function() {
            if ($('#futebol').prop('checked')) {

                $("#mod_campo").show();
                $("#mod_futsal").show();
            } else {

                $("#mod_campo").hide();
                $("#mod_futsal").hide();
            }
        });

        // Exibe modalidades do Vôlei
        $('#volei').on('change', function() {
            if ($('#volei').prop('checked')) {

                $("#mod_areia_vol").show();
                $("#mod_quadra_vol").show();
            } else {

                $("#mod_areia_vol").hide();
                $("#mod_quadra_vol").hide();
            }
        });
    });
</script>

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