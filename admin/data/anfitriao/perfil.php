<div class="col-md-9">
    <div class="col-12">
        <?php
        if (isset($_GET['salvar'])) {
            if ($_GET['salvar'] == '1') {
                mensagens('Horários salvos com sucesso', 'success');
            } else {
                mensagens('Problema ao salvar os horários, verifique com o suporte', 'danger');
            }
        }
        ?>

        <?php
        if (isset($_GET['atualizar'])) {
            if ($_GET['atualizar'] == '1') {
                mensagens('Horários atualizados com sucesso', 'success');
            } else {
                mensagens('Problema ao atualizar os horários, verifique com o suporte', 'danger');
            }
        }
        ?>
    </div>
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#perfil" data-toggle="tab">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="#quadra" data-toggle="tab">Quadra</a></li>
                <li class="nav-item"><a class="nav-link" href="#horario" data-toggle="tab">Horários</a></li>
                <li class="nav-item"><a class="nav-link" href="#suporte" data-toggle="tab">Suporte</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <!-- Perfil  -->
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
                <!-- Quadra -->
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
                <!-- Horários -->
                <div class="tab-pane" id="horario">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Horários de funcionamento</h3>
                        </div>
                        <form action="horarios.php" method="POST">
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Dias da semana</th>
                                            <th style="width: 150px">Hora Inicial</th>
                                            <th style="width: 150px">Hora Final</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Segunda-Feira</td>
                                            <td>
                                                <input type="time" id="segHI" name="segHI" class="form-control" value="<?= $dados_hora_anfi['seg_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="segHF" name="segHF" class="form-control" value="<?= $dados_hora_anfi['seg_fim'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Terça-Feira</td>
                                            <td>
                                                <input type="time" id="terHI" name="terHI" class="form-control" value="<?= $dados_hora_anfi['ter_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="terHF" name="terHF" class="form-control" value="<?= $dados_hora_anfi['ter_fim'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quarta-Feira</td>
                                            <td>
                                                <input type="time" id="quaHI" name="quaHI" class="form-control" value="<?= $dados_hora_anfi['qua_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="quaHF" name="quaHF" class="form-control" value="<?= $dados_hora_anfi['qua_fim'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quinta-Feira</td>
                                            <td>
                                                <input type="time" id="quiHI" name="quiHI" class="form-control" value="<?= $dados_hora_anfi['qui_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="quiHF" name="quiHF" class="form-control" value="<?= $dados_hora_anfi['qui_fim'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sexta-Feira</td>
                                            <td>
                                                <input type="time" id="sexHI" name="sexHI" class="form-control" value="<?= $dados_hora_anfi['sex_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="sexHF" name="sexHF" class="form-control" value="<?= $dados_hora_anfi['sex_fim'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sábado</td>
                                            <td>
                                                <input type="time" id="sabHI" name="sabHI" class="form-control" value="<?= $dados_hora_anfi['sab_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="sabHF" name="sabHF" class="form-control" value="<?= $dados_hora_anfi['sab_fim'] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Domingo</td>
                                            <td>
                                                <input type="time" id="domHI" name="domHI" class="form-control" value="<?= $dados_hora_anfi['dom_ini'] ?>" />
                                            </td>
                                            <td>
                                                <input type="time" id="domHF" name="domHF" class="form-control" value="<?= $dados_hora_anfi['dom_fim'] ?>" />
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><button type="submit" id="salvarHorarios" class="btn btn-primary">Salvar</button></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Suporte -->
                <div class="tab-pane" id="suporte">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <h2>EVO APP</h2>
                                    <p class="lead mb-5">
                                        WhatsApp: +55 (11) 99646-6498<br>
                                        E-mail: fas.alves.souza@gmail.com
                                    </p>
                                    <img src="<?= geraQrCode() ?>" alt="QR code">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" id="nome" name="nome" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" id="email" name="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="assunto">Assunto</label>
                                    <input type="text" id="assunto" name="assunto" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea id="mensagem" name="mensagem" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Enviar mensagem">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>