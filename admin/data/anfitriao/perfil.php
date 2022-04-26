<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#perfil" data-toggle="tab">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="#quadra" data-toggle="tab">Quadra</a></li>
                <li class="nav-item"><a class="nav-link" href="#suporte" data-toggle="tab">Suporte</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="perfil">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nome" class="form-label" disabled>Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $dados_user['nome'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="user" class="form-label" disabled>Usuário</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?= $dados_user['user'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nivel" class="form-label" disabled>Nível</label>
                                <input type="text" class="form-control" id="nivel" name="nivel" value="<?= $dados_user['nivel_usuario'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="tipo" class="form-label" disabled>Tipo</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $dados_user['tipo_usuario'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="quadra">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nome" class="form-label" disabled>Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $dados_anfitriao['nome'] ?>" disabled>
                            </div>
                        </div>
                        <?php if ($dados_anfitriao['tipo'] == 'J') { ?>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="cnpj" class="form-label" disabled>CNPJ</label>
                                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?= $dados_anfitriao['cnpj'] ?>" placeholder="00.000.000/0000-00" disabled>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="cpf" class="form-label" disabled>CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $dados_anfitriao['cpf'] ?>" placeholder="000.000.000-00" disabled>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="telefone" class="form-label" disabled>Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $dados_anfitriao['tel_fixo'] ?>" placeholder="(00) 0000-0000" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="celular" class="form-label" disabled>Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="<?= $dados_anfitriao['tel_celular'] ?>" placeholder="(00) 90000-0000" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="end" class="form-label" disabled>Endereço</label>
                                <input type="text" class="form-control" id="end" name="end" value="<?= $dados_anfitriao['endereco'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="numero" class="form-label" disabled>Nº</label>
                                <input type="text" class="form-control" id="numero" name="numero" value="<?= $dados_anfitriao['numero'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="bairro" class="form-label" disabled>Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $dados_anfitriao['bairro'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cidade" class="form-label" disabled>Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $dados_anfitriao['cidade'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="uf" class="form-label" disabled>UF</label>
                                <input type="text" class="form-control" id="uf" name="uf" value="<?= $dados_anfitriao['uf'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="cep" class="form-label" disabled>CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="<?= $dados_anfitriao['cep'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="suporte">
                    
                </div>
            </div>
        </div>
    </div>
</div>