<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#perfil" data-toggle="tab">Perfil</a></li>
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
            </div>
        </div>
    </div>
</div>