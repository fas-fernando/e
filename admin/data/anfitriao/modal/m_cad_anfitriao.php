<?php
include '../../../viaCep.php';
include '../../../conexao.php';
include '../sql.php';

?>

<div class="modal fade" id="cadastrar_anfitriao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="cad_anfitriao.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Anfitrião</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nome_anfi" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_anfi" name="nome_anfi">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="doc" id="cnpj_anfi" value="cnpj_anfi">
                                <label class="form-check-label" for="cnpj_anfi">
                                    CNPJ
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="doc" id="cpf_anfi" value="cpf_anfi">
                                <label class="form-check-label" for="cpf_anfi">
                                    CPF
                                </label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00">
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="cep_anfi" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep_anfi" name="cep_anfi">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="end_anfi" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="end_anfi" name="end_anfi" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="num_anfi" class="form-label">Número</label>
                                <input type="text" class="form-control" id="num_anfi" name="num_anfi" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="bairro_anfi" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro_anfi" name="bairro_anfi" disabled>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="cidade_anfi" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade_anfi" name="cidade_anfi" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="uf_anfi" class="form-label">UF</label>
                                <input type="text" class="form-control" id="uf_anfi" name="uf_anfi" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tel_anfi" class="form-label">Fixo</label>
                                <input type="text" class="form-control" id="tel_anfi" name="tel_anfi" placeholder="(00) 0000-0000">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="celular_anfi" class="form-label">Celular</label>
                                <input type="text" class="form-control celular_anfi" id="celular_anfi" name="celular_anfi" placeholder="(00) 00000-0000">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="foto" class="form-label">Imagem da Quadra</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tel_anfi" class="form-label">Observação</label>
                                <textarea type="text" class="form-control" id="obs" name="obs" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">CARACTERISTICAS</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="churrasqueira" name="carac[]" value="<?= $id_carac[0] ?>">
                                            <label class="custom-control-label" for="churrasqueira">Churrasqueira</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="bilhar" name="carac[]" value="<?= $id_carac[1] ?>">
                                            <label class="custom-control-label" for="bilhar">Mesa de bilhar</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="vestiario" name="carac[]" value="<?= $id_carac[2] ?>">
                                            <label class="custom-control-label" for="vestiario">Vestiário</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="chuveiro" name="carac[]" value="<?= $id_carac[3] ?>">
                                            <label class="custom-control-label" for="chuveiro">Chuveiro</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="estac_gratis" name="carac[]" value="<?= $id_carac[4] ?>">
                                            <label class="custom-control-label" for="estac_gratis">Estacionamento grátis</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="estac_pago" name="carac[]" value="<?= $id_carac[5] ?>">
                                            <label class="custom-control-label" for="estac_pago">Estacionamento pago</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="lanchonete" name="carac[]" value="<?= $id_carac[6] ?>">
                                            <label class="custom-control-label" for="lanchonete">Lanchonete</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="pl_eletronico" name="carac[]" value="<?= $id_carac[7] ?>">
                                            <label class="custom-control-label" for="pl_eletronico">Placar eletrônico</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="filmagem" name="carac[]" value="<?= $id_carac[8] ?>">
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
                                                    <input type="checkbox" class="custom-control-input" id="futebol" name="esportes[]" value="<?= $id_esp[0] ?>">
                                                    <label class="custom-control-label" for="futebol">Futebol</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" id="volei" name="esportes[]" value="<?= $id_esp[4] ?>">
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
                                                    <input class="custom-control-input" type="checkbox" id="campo" name="modalidades[]" value="<?= $id_mod[0] ?>">
                                                    <label for="campo" class="custom-control-label">Campo</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_futsal" style="display:none">
                                                    <input class="custom-control-input" type="checkbox" id="futsal" name="modalidades[]" value="<?= $id_mod[1] ?>">
                                                    <label for="futsal" class="custom-control-label">Futsal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_areia_vol" style="display:none">
                                                    <input class="custom-control-input" type="checkbox" id="vol_areia" name="modalidades[]" value="<?= $id_mod[7] ?>">
                                                    <label for="vol_areia" class="custom-control-label">Areia</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" id="mod_quadra_vol" style="display:none">
                                                    <input class="custom-control-input" type="checkbox" id="vol_quadra" name="modalidades[]" value="<?= $id_mod[8] ?>">
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
                    <button type="submit" class="btn btn-primary" id="incluirAnfitriao" name="incluirAnfitriao">Cadastrar</button>
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
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#cep_anfi').mask('00000-000');
        $('#tel_anfi').mask('(00) 0000-0000');
        $('#celular_anfi').mask('(00) 00000-0000');
    });
</script>

<script>
    $(document).ready(function() {
        $("#cadastrar_anfitriao").modal("show");
    });
</script>

<script>
    $(document).ready(function() {
        // Esconder Capos de Documento
        $('#cnpj').hide();
        $('#cpf').hide();

        // Escolher Documento
        $('input:radio[name="doc"]').change(function() {
            if ($(this).val() == 'cnpj_anfi') {
                $('#cnpj').show();
            } else {
                $('#cnpj').hide();
            }

            if ($(this).val() == 'cpf_anfi') {
                $('#cpf').show();
            } else {
                $('#cpf').hide();
            }
        });
    });
</script>