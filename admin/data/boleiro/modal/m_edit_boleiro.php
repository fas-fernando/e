<?php
include '../../../conexao.php';
$id = $_POST['id'];

$sql = "SELECT t1.nome, t1.cpf, date_format(t1.nascimento, '%d/%m/%Y') as nascimento, t1.email, t1.celular, t2.user, t2.status, t2.vinculo, t2.foto
FROM boleiro t1
left join usuario t2 on t1.id = t2.vinculo
WHERE t1.id = '$id'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);
$foto = $dados['foto'];

if ($foto != null) {
    $mostrar_foto = "<img src='img/$foto' style='width:50px;height:50px;border-radius:40px' alt='Imagem do usuário'>";
} else {
    $mostrar_foto = "<img src='img/usuario_padrao.png' style='width:50px;height:50px;border-radius:40px' alt='Imagem padrão do usuário'>";
}
?>

<div class="modal fade" id="alterar_boleiro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="edit_boleiro.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhe do boleiro</h5>
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
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nome" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $dados['nome'] ?>">
                                <input type="hidden" class="form-control" id="idBoleiro" name="idBoleiro" value="<?= $id ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $dados['cpf'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nascimento" class="form-label">Nascimento</label>
                                <input type="text" class="form-control" id="nascimento" name="nascimento" value="<?= $dados['nascimento'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $dados['email'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="<?= $dados['celular'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="editarBoleiro" name="editarAnfitriao">Alterar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#celular').mask('(00) 00000-0000');
        $('#nascimento').mask('00/00/0000');
    });
</script>

<script>
    $(document).ready(function() {
        // Abrir Modal
        $('#alterar_boleiro').modal('show');
    });
</script>