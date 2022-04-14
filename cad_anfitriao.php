<?php include 'layout/header.php' ?>

<div class="card">

    <div class="card-header">
        <h5>Cadastrar de Anfitrião</h5>
    </div>

    <div class="card-body">
        <form action="anfitriao/criar.php" method="post">
            <div class="row">
                <div class="col-12">
                    <label for="nome_anfi" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome_anfi" name="nome_anfi">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doc" id="cnpj_anfi" value="cnpj_anfi">
                        <label class="form-check-label" for="cnpj_anfi">
                            CNPJ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doc" id="cpf_anfi" value="cpf_anfi">
                        <label class="form-check-label" for="cpf_anfi">
                            CPF
                        </label>
                    </div>
                </div>

                <div class="col-5">
                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="cnpj apenas com números">
                </div>

                <div class="col-5">
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf apenas com número">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-10">
                    <label for="end_anfi" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="end_anfi" name="end_anfi">
                </div>
                <div class="col-2">
                    <label for="num_anfi" class="form-label">Número</label>
                    <input type="text" class="form-control" id="num_anfi" name="num_anfi">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label for="bairro_anfi" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="bairro_anfi" name="bairro_anfi">
                </div>
                <div class="col-3">
                    <label for="cidade_anfi" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade_anfi" name="cidade_anfi">
                </div>
                <div class="col-2">
                    <label for="uf_anfi" class="form-label">UF</label>
                    <input type="text" class="form-control" id="uf_anfi" name="uf_anfi">
                </div>
                <div class="col-3">
                    <label for="cep_anfi" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep_anfi" name="cep_anfi">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label for="tel_anfi" class="form-label">Fixo</label>
                    <input type="text" class="form-control" id="tel_anfi" name="tel_anfi" placeholder="(11) 4444-4444">
                </div>
                <div class="col-4">
                    <label for="celular_anfi" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular_anfi" name="celular_anfi" placeholder="(11) 94444-4444">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'layout/footer.php' ?>

<script>
    $(document).ready(function() {
        $('#cnpj').hide();
        $('#cpf').hide();

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