<?php

include '../../../conexao.php';

$id = $_POST['id'];

$sql = "SELECT * FROM boleiro WHERE id = '$id'";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);

?>

<div class="modal fade" id="deletar_boleiro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="del_boleiro.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar boleiro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja realmente excluir o usuário <strong><?= $dados['nome'] ?></strong>?</p>
                    <input type="hidden" name="idBoleiro" value="<?= $id ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="excluirBoleiro" name="excluirBoleiro">Excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#deletar_boleiro').modal('show')
    })
</script>