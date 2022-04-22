<?php include '../../../viaCep.php' ?>

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
                        <div class="col-10">
                            <div class="form-group">
                                <label for="end_anfi" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="end_anfi" name="end_anfi">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="num_anfi" class="form-label">Número</label>
                                <input type="text" class="form-control" id="num_anfi" name="num_anfi">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="bairro_anfi" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro_anfi" name="bairro_anfi">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cidade_anfi" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade_anfi" name="cidade_anfi">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="uf_anfi" class="form-label">UF</label>
                                <input type="text" class="form-control" id="uf_anfi" name="uf_anfi">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cep_anfi" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep_anfi" name="cep_anfi">
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
                                <input type="text" class="form-control" id="celular_anfi" name="celular_anfi" placeholder="(00) 00000-0000">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="foto" class="form-label">Imagem da Quadra</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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
        $('#cpf').mask('000.000.000-00');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#cep_anfi').mask('00000-000');
        $('#tel_anfi').mask('(00) 0000-0000');
        $('#celular_anfi').mask('(00) 00000-0000');
    });
</script>

<script>
    $(document).ready(function() {
        // Abrir Modal
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